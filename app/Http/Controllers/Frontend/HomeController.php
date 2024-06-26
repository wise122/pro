<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\AbsenBts;
use App\Models\Article;
use App\Models\Banner;
use App\Models\BtsPropaktani;
use App\Models\BtsLive;
use App\Models\Buku;
use App\Models\Category;
use App\Models\Instansi;
use App\Models\JadwalBts;
use App\Models\News;
use App\Models\PesertaBts;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use App\Models\WeeklySchedule;
use App\Models\KomoditasProdusen;
use App\Models\KomoditasKonsumen;
use App\Models\KomoditasInvestor;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Session;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $countVisitor = 0;

    public function index()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();

        $weeklySchedule = WeeklySchedule::whereBetween('start_date', [$currentWeekStart, $currentWeekEnd])
            ->whereBetween('end_date', [$currentWeekStart, $currentWeekEnd])
            ->first();

        $komoditasProdusen = KomoditasProdusen::where('status', 1)->latest()->take(6)->get();

        $btsScheduleQuery = JadwalBts::orderBy('pelaksanaan_awal', 'DESC');
        if ($weeklySchedule) {
            $bts_schedule = $btsScheduleQuery->whereBetween('pelaksanaan_awal', [$currentWeekStart, $currentWeekEnd])->get();
        } else {
            $bts_schedule = $btsScheduleQuery->limit(5)->get();
            $weeklySchedule = WeeklySchedule::latest()->first();
        }

        $item_bts = $bts_schedule->map(function ($item) use ($weeklySchedule, $currentWeekStart, $currentWeekEnd) {
            $scheduleInWeek = JadwalBts::orderBy('pelaksanaan_awal', 'DESC')
                ->whereBetween('pelaksanaan_awal', [$currentWeekStart, $currentWeekEnd])
                ->get(['judul', 'slug'])
                ->toArray();

            return [
                'schedule_in_week' => $scheduleInWeek,
                'daily_schedule' => [
                    'cover_week' => $weeklySchedule->cover ?? null,
                    'title' => $item->judul,
                    'cover' => $item->cover,
                    'slug' => $item->slug,
                ],
            ];
        });

        $liveBts = JadwalBts::whereDate('pelaksanaan_awal', '<=', today())
            ->whereDate('pelaksanaan_akhir', '>=', today())
            ->whereTime('pelaksanaan_awal', '<=', now())
            ->whereTime('pelaksanaan_akhir', '>=', now())
            ->first();

        $commonData = $this->getCommonData();
        $viewData = array_merge($commonData, [
            'komoditasProdusen' => $komoditasProdusen,
            'bts_schedule' => $bts_schedule,
            'item_bts' => $item_bts,
            'liveBts' => $liveBts,
        ]);

        return view('frontend.home', $viewData);
    }

    protected function getCommonData()
    {
        $user = Auth::user();
        $data_bts = BtsPropaktani::where('cover', '!=', 'no-cover.png')->latest()->first();
        $live = BtsLive::where('cover', '!=', 'no-cover.png')->latest()->first();
        $data_banner = Banner::where('status', 1)->orderBy('urutan')->get();

        $logo = Storage::url('logo/');
        $profile = Storage::url('avatar/');

        $contentData = $this->getContentData();

        $roleCounts = $this->getRoleCounts();

        $video = Video::latest()->first();

        return array_merge($contentData, $roleCounts, [
            'data_bts' => $data_bts,
            'live' => $live,
            'data_banner' => $data_banner,
            'logo' => $logo,
            'profile' => $profile,
            'users' => $user,
            'video' => $video,
        ]);
    }

    protected function getContentData()
    {
        $newsQuery = DB::table('news')
            ->select('news.id', 'news.image', 'users.name as username', 'news.title', 'news.content', 'news.slug', 'news.created_at as date', DB::raw("'berita' as type"))
            ->leftJoin('users', 'users.id', '=', 'news.user_id')
            ->where('news.active', 'yes')
            ->where('news.status', 'publish');

        $articlesQuery = DB::table('articles')
            ->select('articles.id', 'articles.image', 'users.name as username', 'articles.title', 'articles.content', 'articles.slug', 'articles.created_at as date', DB::raw("'artikel' as type"))
            ->leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->where('articles.active', 'yes')
            ->where('articles.status', 'publish');

        $data_news = $newsQuery->union($articlesQuery)
            ->orderBy('date', 'desc')
            ->paginate(3);

        $data_berita_bts = $newsQuery->paginate(6);

        return [
            'data_news' => $data_news,
            'data_berita_bts' => $data_berita_bts,
        ];
    }

    protected function getRoleCounts()
    {
        $roleCounts = DB::table('role_user')
            ->select('roles.name', DB::raw('count(*) as total'))
            ->leftJoin('roles', 'roles.id', '=', 'role_user.role_id')
            ->groupBy('roles.name')
            ->pluck('total', 'roles.name');

        return [
            'produsen' => $roleCounts['produsen'] ?? 0,
            'konsumen' => $roleCounts['konsumen'] ?? 0,
            'narsum' => $roleCounts['narsum'] ?? 0,
            'investor' => $roleCounts['investor'] ?? 0,
            'lainnya' => $roleCounts['lainnya'] ?? 0,
        ];
    }

    public function video_gallery(Request $request)
    {
        $data = BtsPropaktani::where('status', 'publish')->where('active', 'yes')->whereNotNull('youtube_id')
            ->orderBy('tanggal', 'DESC');
        if ($request->input('judul')) {
            $data->where('judul', 'LIKE', '%' . $request->input('judul') . '%');
        }
        if ($request->input('episode')) {
            $data->where('episode', 'LIKE', '%' . $request->input('episode') . '%');
        }
        if ($request->input('tanggal')) {
            $data->where('tanggal', 'LIKE', '%' . date('Y-m-d', strtotime($request->get('tanggal'))) . '%');
        }
        $data_bts = $data->paginate(12);

        return view('frontend.video-gallery', compact('data_bts'));
    }

    public function update_bts($video_id)
    {
        dd($video_id);
    }

    public function profile()
    {
        $data['user'] = User::where('id', auth()->user()->id)->first();
        $data['propinsi'] = json_decode(app('App\Http\Controllers\ApiController')->get_provinces());

        $data['kota'] = [];
        if ($data['user']->propinsi !== null) {
            $data['kota'] = json_decode(app('App\Http\Controllers\ApiController')->get_cities($data['user']->propinsi));
        }

        return view('frontend.profile', $data);
    }

    public function profile_update()
    {
        $item = User::where('id', auth()->user()->id)->first();
        $item->name = request()->input('name');
        $item->email = request()->input('email');
        $item->no_hp = request()->input('no_hp');
        $item->propinsi = request()->input('propinsi');
        $item->kota = request()->input('kota');
        $item->alamat = request()->input('alamat');
        $item->institusi = request()->input('institusi');
        $item->jenis_usaha = request()->input('institusi');
        $item->nama_usaha = request()->input('nama_usaha');
        $item->alamat_usaha = request()->input('alamat_usaha');
        $item->save();

        return Redirect::route('frontend.profile');
    }

    public function profile_update_information()
    {
        $item = User::where('id', auth()->user()->id)->first();
        $item->institusi = request()->input('institusi');
        $item->propinsi = request()->input('propinsi');
        $item->kota = request()->input('kota');
        $item->alamat = request()->input('alamat');
        $item->save();

        return Redirect::route('frontend.profile');
    }

    public function profile_komoditas()
    {
        $data['komoditasProdusen'] = KomoditasProdusen::where('user_id', Auth::user()->id)->get();

        $data['jenisKomoditas'] = json_decode(app('App\Http\Controllers\ApiController')->get_jenis_komoditas());
        $data['propinsi'] = json_decode(app('App\Http\Controllers\ApiController')->get_provinces());
        return view('frontend.profile-komoditas', $data);
    }




    public function submit_komoditas_produsen()
    {
        $item = new KomoditasProdusen();
        $item->user_id = Auth::user()->id;
        $item->jenis_komoditas = request()->input('jenis_komoditas');
        $item->kategori_komoditas = request()->input('kategori_komoditas');
        $item->nama_komoditas = request()->input('nama_komoditas');
        $item->alamat = request()->input('alamat');
        $item->produksi_kuantitas = request()->input('produksi_kuantitas') . ' ' . request()->input('produksi_kuantitas_unit');
        $item->produksi_waktu = request()->input('produksi_waktu') . ' ' . request()->input('produksi_waktu_unit');
        $item->deskripsi = request()->input('deskripsi');
        $item->propinsi = request()->input('propinsi');
        $item->kota = request()->input('kota');



        if (request()->file('photo')) {
            $uploadfile = request()->file('photo');
            $filename = $uploadfile->hashName();
            $uploadfile->store('komoditas', 'public');
            $item->photo = $filename;
        }

        $item->save();

        return Redirect::route('frontend.profile');
    }

    public function delete_komoditas_produsen($id)
    {
        $item = KomoditasProdusen::where('id', $id)->delete();
        return Redirect::route('frontend.profile');
    }

    public function profile_konsumen()
    {
        $data['komoditasKonsumen'] = KomoditasKonsumen::where('user_id', Auth::user()->id)->get();

        $data['jenisKomoditas'] = json_decode(app('App\Http\Controllers\ApiController')->get_jenis_komoditas());
        $data['propinsi'] = json_decode(app('App\Http\Controllers\ApiController')->get_provinces());
        return view('frontend.profile-konsumen', $data);
    }

    public function submit_komoditas_konsumen()
    {
        $item = new KomoditasKonsumen();
        $item->user_id = Auth::user()->id;
        $item->jenis_komoditas = request()->input('jenis_komoditas');
        $item->kategori_komoditas = request()->input('kategori_komoditas');
        $item->nama_komoditas = request()->input('nama_komoditas');
        $item->alamat = request()->input('alamat');
        $item->produksi_kuantitas = request()->input('produksi_kuantitas') . ' ' . request()->input('produksi_kuantitas_unit');
        $item->produksi_waktu = request()->input('produksi_waktu') . ' ' . request()->input('produksi_waktu_unit');
        $item->deskripsi = request()->input('deskripsi');
        $item->propinsi = request()->input('propinsi');
        $item->kota = request()->input('kota');

        if (request()->file('photo')) {
            $uploadfile = request()->file('photo');
            $filename = $uploadfile->hashName();
            $uploadfile->store('komoditas', 'public');
            $item->photo = $filename;
        }

        $item->save();

        return Redirect::route('frontend.profile');
    }

    public function delete_komoditas_konsumen($id)
    {
        $item = KomoditasKonsumen::where('id', $id)->delete();
        return Redirect::route('frontend.profile');
    }

    public function profile_investor()
    {
        $data['komoditasInvestor'] = KomoditasInvestor::where('user_id', Auth::user()->id)->get();

        $data['jenisKomoditas'] = json_decode(app('App\Http\Controllers\ApiController')->get_jenis_komoditas());
        $data['propinsi'] = json_decode(app('App\Http\Controllers\ApiController')->get_provinces());
        return view('frontend.profile-investor', $data);
    }


    public function submit_komoditas_investor()
    {
        $item = new KomoditasInvestor();
        $item->user_id = Auth::user()->id;
        $item->jenis_komoditas = request()->input('jenis_komoditas');
        $item->kategori_komoditas = request()->input('kategori_komoditas');
        $item->nama_komoditas = request()->input('nama_komoditas');
        $item->alamat = request()->input('alamat');
        $item->produksi_kuantitas = request()->input('produksi_kuantitas') . ' ' . request()->input('produksi_kuantitas_unit');
        $item->produksi_waktu = request()->input('produksi_waktu') . ' ' . request()->input('produksi_waktu_unit');
        $item->deskripsi = request()->input('deskripsi');
        $item->propinsi = request()->input('propinsi');
        $item->kota = request()->input('kota');

        if (request()->file('photo')) {
            $uploadfile = request()->file('photo');
            $filename = $uploadfile->hashName();
            $uploadfile->store('komoditas', 'public');
            $item->photo = $filename;
        }

        $item->save();

        return Redirect::route('frontend.profile');
    }

    public function delete_komoditas_investor($id)
    {
        $item = KomoditasInvestor::where('id', $id)->delete();
        return Redirect::route('frontend.profile');
    }


    public function news(Request $request)
    {
        $data_news = DB::table('news')
            ->select('news.id as id', 'news.image', 'users.name as username', 'news.title', 'news.content', 'news.slug', 'news.created_at as date', DB::raw("'berita' as type"),)
            ->leftJoin('users', 'users.id', '=', 'news.user_id')
            ->where('news.active', 'yes')
            ->where('news.status', 'publish')
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('frontend.news', compact('data_news'));
    }

    public function news_detail(Request $request, $slug)
    {
        $data_news = DB::table('news')
            ->select('news.id as id', 'news.image', 'users.name as username', 'news.title', 'news.content', 'news.slug', 'news.created_at as date', DB::raw("'berita' as type"),)
            ->leftJoin('users', 'users.id', '=', 'news.user_id')
            ->where('news.active', 'yes')
            ->where('news.status', 'publish')
            ->where('slug', $slug)
            ->first();

        $recent_news = News::with('user')->where('active', 'yes')->where('status', 'publish')->orderBy('id', 'desc')->paginate(3);

        return view('frontend.news-detail', compact('data_news', 'recent_news'));
    }

    public function articleIot()
    {
        $data_articles = DB::table('articles')
            ->select('articles.id as id', 'articles.image', 'users.name as username', 'articles.title', 'articles.content', 'articles.slug', 'articles.created_at as date', DB::raw("'artikel' as type"),)
            ->leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->where('articles.active', 'yes')
            ->where('articles.status', 'publish')
            ->where('type', 'iot')
            ->orderBy('id', 'desc')
            ->paginate(2);

        return view('frontend.articles', compact('data_articles'));
    }

    public function articleBiosaka()
    {
        $data_articles = DB::table('articles')
            ->select('articles.id as id', 'articles.image', 'users.name as username', 'articles.title', 'articles.content', 'articles.slug', 'articles.created_at as date', DB::raw("'artikel' as type"),)
            ->leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->where('articles.active', 'yes')
            ->where('articles.status', 'publish')
            ->where('type', 'biosaka')
            ->orderBy('id', 'desc')
            ->paginate(2);

        return view('frontend.articles', compact('data_articles'));
    }

    public function article_detail(Request $request, $slug)
    {
        $data_articles = DB::table('articles')
            ->select('articles.id as id', 'articles.image', 'users.name as username', 'articles.title', 'articles.content', 'articles.slug', 'articles.created_at as date', 'articles.tag_id')
            ->leftJoin('users', 'users.id', '=', 'articles.user_id')
            ->where('articles.active', 'yes')
            ->where('articles.status', 'publish')
            ->where('slug', $slug)
            ->first();
        $category = Category::where('status', 1)->orderBy('title', 'asc')->limit(6)->get();
        $mapsCategory = $category->map(function ($item) {
            $data['title'] = $item->title;
            $total = DB::table('articles')
                ->where('articles.category_id', $item->id)
                ->count();
            $data['total'] = $total;

            return (object) $data;
        });
        $tag = Tag::where('status', 1)->orderBy('id', 'asc')->whereIn('id', json_decode($data_articles->tag_id))->get();
        $tags = Tag::where('status', 1)->orderBy('id', 'asc')->limit(5)->get();
        $mapsTag = $tags->map(function ($item) {
            $data['title'] = $item->title;
            $total = DB::table('articles')
                ->where('articles.tag_id', $item->id)
                ->count();
            $data['total'] = $total;

            return (object) $data;
        });
        $recent_article = Article::with('user')->where('active', 'yes')->where('status', 'publish')->orderBy('id', 'desc')->paginate(3);

        return view('frontend.articles-detail', compact('data_articles', 'recent_article', 'mapsCategory', 'tag', 'mapsTag'));
    }

    public function bts_schedule()
    {
        $bts_schedule = JadwalBts::orderByDesc('id')->paginate(5);
        return view('frontend.bts-schedule', compact('bts_schedule'));
    }

    public function bts_schedule_detail($slug)
    {
        if (Auth::guest()) {
            return redirect()->route('frontend.login');
        }

        $bts_schedule = JadwalBts::where('slug', $slug)->firstOrFail();
        $instansi = Instansi::pluck('name', 'id');

        $user = auth()->user();

        $checkLogin = true;
        $jadwal_absen = now()->between($bts_schedule->pelaksanaan_awal, $bts_schedule->pelaksanaan_akhir);
        $old_peserta = $user->peserta_bts()->where('jadwal_bts_id', '!=', $bts_schedule->id)->first();
        $cekKepesertaan = $user->peserta_bts()->where('jadwal_bts_id', $bts_schedule->id)->first();
        $isiDaftarHadir = is_null($cekKepesertaan);
        $isEligibleCertificate = !$isiDaftarHadir && !$jadwal_absen;

        $bts_schedule->pelaksanaan_awal = $bts_schedule->pelaksanaan_awal->format('j F Y H:i');
        $bts_schedule->pelaksanaan_akhir = $bts_schedule->pelaksanaan_akhir->format('j F Y H:i');

        return view('frontend.bts-schedule-detail', compact('bts_schedule', 'instansi', 'checkLogin', 'jadwal_absen', 'isiDaftarHadir', 'old_peserta', 'isEligibleCertificate', 'cekKepesertaan'));
    }

    public function daftar_peserta(Request $request, $slug)
    {
        $status = false;
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    "instansi" => "required",
                    "nama_instansi" => "required",
                    "nama_peserta" => "required",
                ],
                [
                    'instansi.required' => __('frontend.login.instansi_required'),
                    'nama_instansi.required' => __('frontend.login.nama_instansi_required'),
                    'nama_peserta.required' => __('frontend.login.peserta_required')
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                throw new \Exception($messages->first());
            }

            $bts_schedule = JadwalBts::where('slug', $slug)->first();
            $pesertaBts = PesertaBts::create(
                [
                    'instansi_id' => $request->instansi,
                    'uuid' => Uuid::uuid4(),
                    'nama' => $request->nama_peserta,
                    'nama_instansi' => $request->nama_instansi,
                    'user_id' => auth()->user()->id,
                    'jadwal_bts_id' => $bts_schedule->id
                ]
            );

            AbsenBts::create(
                [
                    'peserta_bts_id' => $pesertaBts->id,
                    'tanggal_absen' => date('Y-m-d H:i:s')
                ]
            );

            $status = true;
            $data['title'] = __('frontend.login.successfully');
            $data['message'] = __('frontend.login.saved');
            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        } catch (\Exception $err) {
            $data['message'] = $err->getMessage();
            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        }

        // return Redirect::route('frontend.bts-schedule-detail', $bts_schedule->slug);
    }

    public function history_bts()
    {
        // $jadwal_bts = JadwalBts::paginate(12);
        $peserta_bts = DB::table('peserta_bts')
            ->select('jadwal_bts.cover', 'jadwal_bts.judul', 'jadwal_bts.pelaksanaan_awal', 'jadwal_bts.pelaksanaan_akhir', 'peserta_bts.uuid')
            ->leftJoin('jadwal_bts', 'peserta_bts.jadwal_bts_id', '=', 'jadwal_bts.id')
            ->where('peserta_bts.user_id', auth()->user()->id)
            ->orderBy('peserta_bts.id', 'desc')
            ->paginate(12);
        // $peserta_bts = PesertaBts::with('jadwal_bts')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(12);

        return view('frontend.history-bts', compact('peserta_bts'));
    }

    public function bts_certificate($uuid)
    {
        try {
            setlocale(LC_TIME, 'id_ID');

            $peserta_bts = PesertaBts::with('jadwal_bts')->where('uuid', $uuid)->firstOrFail();

            if ($peserta_bts->jadwal_bts->pelaksanaan_akhir->isFuture()) {
                return Redirect::back()->with('error', 'Pelaksanaan BTS Belum Selesai!');
            }

            $tanggal = $peserta_bts->jadwal_bts->pelaksanaan_awal->format('d-m-Y');

            $roleMapping = [
                'peserta' => 'PESERTA',
                'narsum' => 'NARASUMBER',
                'moderator' => 'MODERATOR',
            ];

            $role = $roleMapping[$peserta_bts->peran] ?? 'PESERTA';
            $qrcode = base64_encode(QrCode::format('svg')->size(120)->errorCorrection('H')->generate($peserta_bts->uuid));

            $images = [
                'imgLambang' => public_path("assets/images/logo-1.png"),
                'imgLogoBts' => public_path("assets/images/logo2.png"),
                'imgBg' => public_path("assets/images/bg-image-propaktani.png"),
                'imgSignature' => public_path("assets/images/signature.png"),
                'imgQrCode' => public_path("assets/images/qrcode.png"),
            ];

            $pdf = PDF::loadview('frontend.bts-certificate', compact('peserta_bts', 'tanggal', 'qrcode', 'role') + $images);
            $pdf->setPaper('letter', 'landscape');

            return $pdf->stream('Sertifikat ' . $peserta_bts->jadwal_bts->judul . '.pdf');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function videoPropaktani(Request $request)
    {
        $status = false;
        try {
            $data = Video::where('status', 'publish')->where('active', 'yes')->whereNotNull('youtube_id')
                ->orderBy('tanggal', 'DESC');
            if ($request->input('judul')) {
                $data->where('judul', 'LIKE', '%' . $request->input('judul') . '%');
            }
            if ($request->input('episode')) {
                $data->where('episode', 'LIKE', '%' . $request->input('episode') . '%');
            }
            if ($request->input('tanggal')) {
                $data->where('tanggal', 'LIKE', '%' . date('Y-m-d', strtotime($request->get('tanggal'))) . '%');
            }
            $data_bts = $data->paginate(12);

            return view('frontend.video-gallery', compact('data_bts'));
        } catch (\Exception $e) {
            return Redirect::route('frontend.home');
        }
    }

    public function videos(Request $request)
    {
        $dataVideos = Video::select();
        if ($request->input('judul')) {
            $dataVideos->where('judul', 'LIKE', '%' . $request->input('judul') . '%');
        }
        $videos = $dataVideos->paginate(12);

        return view('frontend.videos', compact('videos'));
    }

    public function books(Request $request)
    {
        $dataBooks = Buku::select();
        if ($request->input('judul')) {
            $dataBooks->where('judul', 'LIKE', '%' . $request->input('judul') . '%');
        }
        $books = $dataBooks->paginate(12);

        return view('frontend.books', compact('books'));
    }

    public function book_detail($slug)
    {
        $filePath = public_path() . "/storage/books/" . $slug;

        return response()->file($filePath);
    }

    public function faq(Request $request)
    {
        $dataFaq = Faq::select()->where('status', true)->get();
        $accordion = 0;

        // dd($dataFaq);
        return view('frontend.faq', compact('dataFaq', 'accordion'));
    }

    public function jejaring_produsen()
    {
        $selectedJenisKomoditas = request()->input('jenisKomoditas');
        $selectedPropinsi = request()->input('propinsi');
        $selectedKota = request()->input('kota');
        $keyword = request()->input('keyword');

        $data = [
            'selectedJenisKomoditas' => $selectedJenisKomoditas,
            'selectedPropinsi' => $selectedPropinsi,
            'selectedKota' => $selectedKota,
            'keyword' => $keyword,
            'jenisKomoditas' => json_decode(app('App\Http\Controllers\ApiController')->get_jenis_komoditas()),
            'propinsi' => json_decode(app('App\Http\Controllers\ApiController')->get_provinces()),
            'kota' => $selectedPropinsi ? json_decode(app('App\Http\Controllers\ApiController')->get_cities($selectedPropinsi)) : [],
        ];

        $query = KomoditasProdusen::where('status', 1);

        if ($selectedPropinsi) {
            $query->where('propinsi', $selectedPropinsi);
        }
        if ($selectedKota) {
            $query->where('kota', $selectedKota);
        }
        if ($selectedJenisKomoditas) {
            $query->where('jenis_komoditas', $selectedJenisKomoditas);
        }
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_komoditas', 'like', '%' . $keyword . '%')
                    ->orWhere('alamat', 'like', '%' . $keyword . '%');
            });
        }

        $data['komoditas_produsen'] = $query->latest()->limit(24)->get();

        return view('frontend.jejaring-produsen', $data);
    }

    public function jejaring_konsumen()
    {
        // dd(Auth::user()->id);
        $data['selectedJenisKomoditas'] = request()->input('jenisKomoditas');
        $data['selectedPropinsi'] = request()->input('propinsi');
        $data['selectedKota'] = request()->input('kota');
        $data['keyword'] = request()->input('keyword');
        $params = $data;

        $data['jenisKomoditas'] = json_decode(app('App\Http\Controllers\ApiController')->get_jenis_komoditas());
        $data['propinsi'] = json_decode(app('App\Http\Controllers\ApiController')->get_provinces());
        $data['kota'] = [];
        if ($data['selectedPropinsi']) {
            $data['kota'] = json_decode(app('App\Http\Controllers\ApiController')->get_cities($data['selectedPropinsi']));
        }

        if ($data['selectedJenisKomoditas'] == '' && $data['keyword'] == '' && $data['propinsi'] == '' && $data['kota'] == '') {
            $data['komoditas_konsumen'] = KomoditasKonsumen::get();
        } else {
            $arrWhere[] = ['status', '=', 1];
            if ($data['selectedPropinsi'] !== null) {
                array_push($arrWhere, ['propinsi', '=', $data['selectedPropinsi']]);
            }
            if ($data['selectedKota'] !== null) {
                array_push($arrWhere, ['kota', '=', $data['selectedKota']]);
            }
            if ($data['selectedJenisKomoditas'] !== null) {
                array_push($arrWhere, ['jenis_komoditas', '=', $data['selectedJenisKomoditas']]);
            }
            $data['komoditas_konsumen'] = KomoditasKonsumen::where($arrWhere)
                ->where(function ($query) use ($params) {
                    $query
                        ->orWhere('nama_komoditas', 'LIKE', '%' . $params['keyword'] . '%')
                        ->orWhere('alamat', 'LIKE', '%' . $params['keyword'] . '%');
                })
                ->get();
        }

        return view('frontend.jejaring-konsumen', $data);
    }

    public function jejaring_investor()
    {
        // dd(Auth::user()->id);
        $data['selectedJenisKomoditas'] = request()->input('jenisKomoditas');
        $data['selectedPropinsi'] = request()->input('propinsi');
        $data['selectedKota'] = request()->input('kota');
        $data['keyword'] = request()->input('keyword');
        $params = $data;

        $data['jenisKomoditas'] = json_decode(app('App\Http\Controllers\ApiController')->get_jenis_komoditas());
        $data['propinsi'] = json_decode(app('App\Http\Controllers\ApiController')->get_provinces());
        $data['kota'] = [];
        if ($data['selectedPropinsi']) {
            $data['kota'] = json_decode(app('App\Http\Controllers\ApiController')->get_cities($data['selectedPropinsi']));
        }

        if ($data['selectedJenisKomoditas'] == '' && $data['keyword'] == '' && $data['propinsi'] == '' && $data['kota'] == '') {
            $data['komoditas_investor'] = KomoditasInvestor::get();
        } else {
            $arrWhere[] = ['status', '=', 1];
            if ($data['selectedPropinsi'] !== null) {
                array_push($arrWhere, ['propinsi', '=', $data['selectedPropinsi']]);
            }
            if ($data['selectedKota'] !== null) {
                array_push($arrWhere, ['kota', '=', $data['selectedKota']]);
            }
            if ($data['selectedJenisKomoditas'] !== null) {
                array_push($arrWhere, ['jenis_komoditas', '=', $data['selectedJenisKomoditas']]);
            }
            $data['komoditas_investor'] = KomoditasInvestor::where($arrWhere)
                ->where(function ($query) use ($params) {
                    $query
                        ->orWhere('nama_komoditas', 'LIKE', '%' . $params['keyword'] . '%')
                        ->orWhere('alamat', 'LIKE', '%' . $params['keyword'] . '%');
                })
                ->get();
        }

        return view('frontend.jejaring-investor', $data);
    }

    public function jejaring_produsen_komoditas($id)
    {
        $data['komoditas'] = KomoditasProdusen::where('id', $id)->latest()->first();
        return view('frontend.jejaring-produsen-komoditas', $data);
    }

    public function jejaring_konsumen_komoditas($id)
    {
        $data['komoditas'] = KomoditasKonsumen::where('id', $id)->first();
        return view('frontend.jejaring-konsumen-komoditas', $data);
    }

    public function jejaring_investor_komoditas($id)
    {
        $data['komoditas'] = KomoditasInvestor::where('id', $id)->first();
        return view('frontend.jejaring-investor-komoditas', $data);
    }
}



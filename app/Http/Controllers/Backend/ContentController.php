<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BtsPropaktani;
use App\Models\Content;
use App\Models\News;
use Illuminate\Http\Request;
use View;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    protected $model;
    protected $title      = 'Manage Konten';
    protected $view       = 'backend.manage-content.';
    protected $route      = 'manage-content.';
    protected $permission = '-content';

    public function __construct(Content $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        // $this->middleware('permission:'.'manage'.$this->permission)->only('index');
        // $this->middleware('permission:'.'create'.$this->permission)->only('create', 'store');
        // $this->middleware('permission:'.'edit'.$this->permission)->only('edit', 'update');
    }

    public function user()
    {
        return auth()->user();
    }

    public function index(Request $request)
    {
        // if (\Auth::user()->isAbleTo('manage'.$this->permission)) {
            if ($request->ajax()) {
                $data = $this->model::select();
                return DataTables::of($data)
                    ->editColumn('judul', function($data){
                        if ($data->content_type == 'App\Models\BtsPropaktani') {
                            $data_bts = BtsPropaktani::where('id', $data->content_id)->first();
                            return $data_bts->judul;
                        } elseif ($data->content_type == 'App\Models\News') {
                            $data_news = News::where('id', $data->content_id)->first();
                            return $data_news->title;
                        } elseif ($data->content_type == 'App\Models\Article') {
                            $data_article = Article::where('id', $data->content_id)->first();
                            return $data_article->title;
                        }
                    })
                    ->editColumn('type', function($data){
                        if ($data->content_type == 'App\Models\BtsPropaktani') {
                            return '<span class="badge badge-warning">Video</span>';
                        } elseif ($data->content_type == 'App\Models\News') {
                            return '<span class="badge badge-danger">Berita</span>';
                        } elseif ($data->content_type == 'App\Models\Article') {
                            return '<span class="badge badge-primary">Artikel</span>';
                        }
                    })
                    ->editColumn('status', function($data){
                        if ($data->status == 'publish') {
                            return '<span class="badge badge-success">Publish</span>';
                        } else {
                            return '<span class="badge badge-danger">Draft</span>';
                        }
                    })
                    ->addIndexColumn()
                    ->rawColumns(['type', 'status'])
                    ->make(true);
            }
            return view($this->view.'index');
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
    }
}

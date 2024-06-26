<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use View;

class SettingController extends Controller
{
    protected $model;
    protected $title      = 'Settings';
    protected $view       = 'backend.settings.';
    protected $route      = 'setting.';
    protected $permission = '-setting';

    public function __construct(Setting $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        $this->middleware('permission:'.'manage'.$this->permission)->only('index');
        $this->middleware('permission:'.'create'.$this->permission)->only('update_logo');
        // $this->middleware('permission:'.'edit'.$this->permission)->only('edit', 'update');
        // $this->middleware('permission:'.'reset-password')->only('reset_password', 'update_password');
        // $this->middleware('permission:'.'manage-account')->only('profile');
        // $this->middleware('permission:'.'edit-account')->only('update_profile');
        // $this->middleware('permission:'.'change-password-account')->only('password_profile');
    }

    public function user()
    {
        return auth()->user();
    }

    public function index()
    {
        if (\Auth::user()->isAbleTo('manage'.$this->permission)) {
            $data = $this->model::settings();
            $logo = \Storage::url('public/logo/');

            return view($this->view.'index', compact('data', 'logo'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update_logo(Request $request)
    {
        if (\Auth::user()->isAbleTo('create'.$this->permission)) {
            // Logo
            if ($request->logo) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'logo' => 'mimes:png|max:2048|dimensions:min_width=200,min_height=200,max_width=200,max_height=200'
                    ],
                    [
                        'logo.mimes' => 'Silahkan Pilih Gambar dengan Format PNG !',
                        'logo.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                        'logo.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 200x200 !'
                    ]
                );

                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();
                    return redirect()->route($this->route.'index')->with('error', $messages->first())->withInput();
                }

                $logoName = 'logo.png';
                $request->file('logo')->storeAs('public/logo/', $logoName);
            }
            // Small Logo
            if ($request->small_logo) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'small_logo' => 'mimes:png|max:2048|dimensions:min_width=86,min_height=25,max_width=86,max_height=25'
                    ],
                    [
                        'small_logo.mimes' => 'Silahkan Pilih Gambar dengan Format PNG !',
                        'small_logo.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                        'small_logo.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 86x25 !'
                    ]
                );
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();
                    return redirect()->route($this->route.'index')->with('error', $messages->first());
                }

                $smallLogoName = 'small_logo.png';
                $request->file('small_logo')->storeAs('public/logo/', $smallLogoName);
            }
            // Favicon
            if ($request->favicon) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'favicon' => 'mimes:png|max:2048|dimensions:min_width=80,min_height=80,max_width=80,max_height=80'
                    ],
                    [
                        'favicon.mimes' => 'Silahkan Pilih Gambar dengan Format PNG !',
                        'favicon.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                        'favicon.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 80x80 !'
                    ]
                );
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();
                    return redirect()->route($this->route.'index')->with('error', $messages->first());
                }

                $favicon = 'favicon.png';
                $request->file('favicon')->storeAs('public/logo/', $favicon);
            }

            // Logo Atas pd Frontend
            if ($request->logo_atas) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'logo_atas' => 'mimes:png|max:2048|dimensions:min_width=235,min_height=50,max_width=235,max_height=50'
                    ],
                    [
                        'logo_atas.mimes' => 'Silahkan Pilih Gambar dengan Format PNG !',
                        'logo_atas.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                        'logo_atas.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 235x50 !'
                    ]
                );
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();
                    return redirect()->route($this->route.'index')->with('error', $messages->first());
                }

                $logo_atas  = 'logo_atas.png';
                $path       = $request->file('logo_atas')->storeAs('public/logo/', $logo_atas);
            }

            // Logo Bwh pd Frontend
            if ($request->logo_bwh) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'logo_bwh' => 'mimes:png|max:2048|dimensions:min_width=235,min_height=50,max_width=235,max_height=50'
                    ],
                    [
                        'logo_bwh.mimes' => 'Silahkan Pilih Gambar dengan Format PNG !',
                        'logo_bwh.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                        'logo_bwh.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 235x50 !'
                    ]
                );
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();
                    return redirect()->route($this->route.'index')->with('error', $messages->first());
                }

                $logo_bwh  = 'logo_bwh.png';
                $path       = $request->file('logo_bwh')->storeAs('public/logo/', $logo_bwh);
            }

            // Title && Footer
            if (!empty($request->title_text) || !empty($request->footer_text)) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'title_text' => 'required',
                        'footer_text' => 'required',
                    ],
                    [
                        'title_text.required' => 'Silahkan Masukkan Title Text !',
                        'footer_text.required' => 'Silahkan Masukkan Footer Text !'
                    ]
                );

                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();
                    return redirect()->route($this->route.'index')->with('error', $messages->first());
                }

                $post = $request->all();
                unset($post['_token']);
                foreach ($post as $key => $data) {
                    \DB::insert(
                        'insert into settings (`value`, `name`) values (?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                        [
                            $data,
                            $key,
                        ]
                    );
                }
            }

            return redirect()->route($this->route.'index')->with('success', 'Logo Berhasil Diupdate !');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update_profile(Request $request)
    {
        if (\Auth::user()->isAbleTo('create'.$this->permission)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'company_name' => 'required',
                    'company_email' => 'required',
                ],
                [
                    'company_name.required' => 'Silahkan Masukkan Nama Perusahaan !',
                    'company_email.required' => 'Silahkan Masukkan Email Perusahaan !'
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'index')->with('error', $messages->first())->withInput();
            }

            $post = $request->all();
            unset($post['_token']);

            foreach ($post as $key => $data) {
                \DB::insert(
                    'insert into settings (`value`, `name`) values (?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $data,
                        $key,
                    ]
                );
            }

            return redirect()->route($this->route.'index')->with('success', 'Profile Perusahaan Berhasil diupdate !');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update_email(Request $request)
    {
        if (\Auth::user()->isAbleTo('create'.$this->permission)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'mail_driver' => 'required',
                    'mail_host' => 'required',
                    'mail_port' => 'required',
                    'mail_username' => 'required',
                    'mail_password' => 'required',
                    'mail_encryption' => 'required',
                    'mail_from_address' => 'required',
                    'mail_from_name' => 'required',
                ],
                [
                    'mail_driver.required' => 'Silahkan Masukkan Mail Driver !',
                    'mail_host.required' => 'Silahkan Masukkan Mail Host !',
                    'mail_port.required' => 'Silahkan Masukkan Mail Port !',
                    'mail_username.required' => 'Silahkan Masukkan Mail Username !',
                    'mail_password.required' => 'Silahkan Masukkan Mail Password !',
                    'mail_encryption.required' => 'Silahkan Masukkan Mail Encryption !',
                    'mail_from_address.required' => 'Silahkan Masukkan Mail From Address !',
                    'mail_from_name.required' => 'Silahkan Masukkan Mail From Name !',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'index')->with('error', $messages->first())->withInput();
            }

            $arrEnv = [
                'MAIL_DRIVER' => $request->mail_driver,
                'MAIL_HOST' => $request->mail_host,
                'MAIL_PORT' => $request->mail_port,
                'MAIL_USERNAME' => $request->mail_username,
                'MAIL_PASSWORD' => $request->mail_password,
                'MAIL_ENCRYPTION' => $request->mail_encryption,
                'MAIL_FROM_NAME' => $request->mail_from_name,
                'MAIL_FROM_ADDRESS' => $request->mail_from_address,
            ];

            $this->model::setEnvironmentValue($arrEnv);

            return redirect()->route($this->route.'index')->with('success', 'Email Perusahaan Berhasil diupdate !');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update_sosmed(Request $request)
    {
        if (\Auth::user()->isAbleTo('create'.$this->permission)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'company_fb' => 'required',
                    'company_ig' => 'required',
                ],
                [
                    'company_fb.required' => 'Silahkan Masukkan Nama Facebook !',
                    'company_ig.required' => 'Silahkan Masukkan Nama Instagram !'
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'index')->with('error', $messages->first())->withInput();
            }

            $post = $request->all();
            unset($post['_token']);

            foreach ($post as $key => $data) {
                \DB::insert(
                    'insert into settings (`value`, `name`) values (?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $data,
                        $key,
                    ]
                );
            }
            return redirect()->route($this->route.'index')->with('success', 'Sosial Media Perusahaan Berhasil diupdate !');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }
}

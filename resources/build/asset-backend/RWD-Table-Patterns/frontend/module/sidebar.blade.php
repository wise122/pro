@inject('FuncGlobal', 'App\Traits\FuncGlobal')
<div class="left side-menu overflow-scroll">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('backend.home') }}" class="waves-effect">
                        <i class="mdi mdi-home-account mdi-24px text-info"></i><span
                            class="badge badge-success badge-pill float-right"></span> <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.index') }}" class="waves-effect ">
                        <i class="mdi mdi-iframe mdi-24px text-info"></i><span
                            class="badge badge-success badge-pill float-right "></span> <span> Kategori </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tag.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-card-details mdi-24px text-info"></i><span
                            class="badge badge-success badge-pill float-right"></span> <span> Tag </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('instansi.index') }}" class="waves-effect">
                        <i class="mdi mdi-finance mdi-24px text-info"></i><span
                            class="badge badge-success badge-pill float-right"></span> <span> Instansi </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('keahlian.index') }}" class="waves-effect">
                        <i class="mdi mdi-settings-box mdi-24px text-info"></i><span
                            class="badge badge-success badge-pill float-right"></span> <span> Keahlian </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('faq.index') }}" class="waves-effect">
                        <i class="mdi mdi-message-draw mdi-24px text-info"></i><span
                            class="badge badge-success badge-pill float-right"></span> <span> FAQ </span>
                    </a>
                </li>
                @permission('manage-banner')
                    <li class="{{ $FuncGlobal->set_active_navbar(['banner.index', 'banner.create', 'banner.edit']) }}">
                        <a href="{{ route('banner.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['banner.index', 'banner.create', 'banner.edit']) }}">
                            <i class="mdi mdi-image-album mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Banner</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-news')
                    <li class="{{ $FuncGlobal->set_active_navbar(['news.index', 'news.create', 'news.edit']) }}">
                        <a href="{{ route('news.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['news.index', 'news.create', 'news.edit']) }}">
                            <i class="mdi mdi-library-books mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Berita Propaktani</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-article')
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="mdi mdi-lightbulb mdi-24px text-info"></i><span> Kemitraan <span
                                    class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span>
                        </a>
                        <ul class="submenu mm-collapse">
                            <li><a href="{{ route('iot.index', ['type' => 1]) }}">IOT</a></li>
                            <li><a href="{{ route('biosaka.index', ['type' => 2]) }}">Biosaka</a></li>
                        </ul>
                    </li>
                @endpermission
                @permission('manage-bts-propaktani')
                    <li
                        class="{{ $FuncGlobal->set_active_navbar(['bts-propaktani.index', 'bts-propaktani.create', 'bts-propaktani.edit']) }}">
                        <a href="{{ route('bts-propaktani.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['bts-propaktani.index', 'bts-propaktani.create', 'bts-propaktani.edit']) }}">
                            <i class="mdi mdi-format-list-bulleted-square mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> BTS Propaktani</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-bts-live')
                    <li
                        class="{{ $FuncGlobal->set_active_navbar(['bts-live.index', 'bts-live.create', 'bts-live.edit']) }}">
                        <a href="{{ route('bts-live.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['bts-live.index', 'bts-live.create', 'bts-live.edit']) }}">
                            <i class="mdi mdi-format-list-bulleted-square mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> BTS Live</span>
                        </a>
                    </li>
                @endpermission

                @permission('manage-jadwal-bts')
                    <li
                        class="{{ $FuncGlobal->set_active_navbar(['bts-schedule.index', 'bts-schedule.create', 'bts-schedule.edit']) }}">
                        <a href="{{ route('bts-schedule.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['bts-schedule.index', 'bts-schedule.create', 'bts-schedule.edit']) }}">
                            <i class="mdi mdi-calendar-month mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Jadwal BTS</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-jadwal-mingguan')
                    <li
                        class="{{ $FuncGlobal->set_active_navbar(['weekly-schedule.index', 'weekly-schedule.create', 'weekly-schedule.edit']) }}">
                        <a href="{{ route('weekly-schedule.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['weekly-schedule.index', 'weekly-schedule.create', 'weekly-schedule.edit']) }}">
                            <i class="mdi mdi-calendar-month-outline mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Jadwal Mingguan</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-video')
                    <li class="{{ $FuncGlobal->set_active_navbar(['video.index', 'video.create', 'video.edit']) }}">
                        <a href="{{ route('video.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['video.index', 'video.create', 'video.edit']) }}">
                            <i class="mdi mdi-movie-outline mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Video</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-buku')
                    <li class="{{ $FuncGlobal->set_active_navbar(['book.index', 'book.create', 'book.edit']) }}">
                        <a href="{{ route('book.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['book.index', 'book.create', 'book.edit']) }}">
                            <i class="mdi mdi-book-open-page-variant mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Buku</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-arsip-sertifikat')
                    <li
                        class="{{ $FuncGlobal->set_active_navbar(['archive-sertificate.index', 'archive-sertificate.create', 'archive-sertificate.edit']) }}">
                        <a href="{{ route('archive-sertificate.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['archive-sertificate.index', 'archive-sertificate.create', 'archive-sertificate.edit']) }}">
                            <i class="mdi mdi-seal mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Arsip Sertifikat</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-bts-propaktani')
                    <li class="{{ $FuncGlobal->set_active_navbar(['manage-content.index']) }}">
                        <a href="{{ route('manage-content.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['manage-content.index']) }}">
                            <i class="mdi mdi-folder-open-outline mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Manage Konten</span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-bts-live')
                    <li class="{{ $FuncGlobal->set_active_navbar(['manage-content.index']) }}">
                        <a href="{{ route('manage-content.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['manage-content.index']) }}">
                            <i class="mdi mdi-folder-open-outline mdi-24px text-info"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Manage Konten</span>
                        </a>
                    </li>
                @endpermission

            </ul>

            <ul class="metismenu" id="management">
                @permission('manage-setting|manage-module|manage-permissions|manage-role|manage-user')
                    <li class="menu-title">Management</li>
                @endpermission
                @permission('manage-module')
                    <li class="{{ $FuncGlobal->set_active_navbar(['module.index']) }}">
                        <a href="{{ route('module.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['module.index']) }}">
                            <i class="mdi mdi-database-check mdi-24px text-warning"></i><span
                                class="badge badge-success badge-pill float-right"></span><span> Module </span>
                        </a>
                    </li>
                @endpermission()
                @permission('manage-permissions')
                    <li class="{{ $FuncGlobal->set_active_navbar(['permission.index', 'permission.edit']) }}">
                        <a href="{{ route('permission.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['permission.index', 'permission.edit']) }}">
                            <i class="mdi mdi-security mdi-24px text-warning"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Permission </span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-role')
                    <li class="{{ $FuncGlobal->set_active_navbar(['role.index', 'role.edit']) }}">
                        <a href="{{ route('role.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['role.index', 'role.edit']) }}">
                            <i class="mdi mdi-arrow-decision-outline mdi-24px text-warning"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Role </span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-user')
                    <li
                        class="{{ $FuncGlobal->set_active_navbar(['user.index', 'user.edit', 'user.create', 'reset.password']) }}">
                        <a href="{{ route('user.index') }}"
                            class="waves-effect {{ $FuncGlobal->set_active_navbar(['user.index', 'user.edit', 'user.create', 'reset.password']) }}">
                            <i class="mdi mdi-account-key-outline mdi-24px text-warning"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Pengguna </span>
                        </a>
                    </li>
                @endpermission
                @permission('manage-setting')
                    <li class="{{ $FuncGlobal->set_active_navbar(['setting.index']) }}">
                        <a class="waves-effect {{ $FuncGlobal->set_active_navbar(['setting.index']) }}"
                            href="{{ route('setting.index') }}">
                            <i class="mdi mdi-settings-outline mdi-24px text-warning"></i><span
                                class="badge badge-success badge-pill float-right"></span> <span> Pengaturan </span>
                        </a>
                    </li>
                @endpermission
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>

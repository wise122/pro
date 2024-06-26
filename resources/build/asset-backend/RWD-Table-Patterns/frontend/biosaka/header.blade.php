<header class="w-100 clearfix header headerOne fixed-top" id="headerOne">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3402755976833698"
        crossorigin="anonymous"></script>
    <div class="topHeader">
        <div class="container">
            <div class="topHeaderInner">
                <div class="mobile boxGroupHeader">
                    <a href="https://wa.me/6281214911911?text=Saya Ingin Mengetahui Lebih Lanjut. {{ URL::current() }}">
                        <div class="flexGroupHeader">
                            <div class="icon">
                                <i class="fa-regular fa-phone fa-xl" style="color: #ffffff"></i>
                            </div>
                            <div class="iconTxt">
                                <span
                                    class="text-white">{{ Setting::getValByName('company_phone') ? Setting::getValByName('company_phone') : '' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mail boxGroupHeader">
                    <a href="mailto:official@propaktani.com">
                        <div class="flexGroupHeader">
                            <div class="icon">
                                <i class="fa-regular fa-envelope fa-xl" style="color: #ffffff"></i>
                            </div>
                            <div class="iconTxt text-white">
                                <span
                                    class="text-white">{{ Setting::getValByName('company_email') ? Setting::getValByName('company_email') : '' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="language boxGroupHeader ms-auto">
                    <div class="flexGroupHeader text-white">
                        <div class="icon">
                            <i class="fa-solid fa-language fa-xl"></i>
                        </div>
                        <div class="iconTxt">
                            <select class="form-select lang text-white">
                                <option value="">Pilih Bahasa</option>
                                <option value="id">Indonesia</option>
                                <option value="en">English</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainHeader">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand" href="{{ route('frontend.index') }}">
                    <img src="{{ asset(Storage::url('logo')) . '/logo_atas.png' }}" alt="logo" class="img-fluid">
                </a>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.index') }}">@lang('frontend.home')</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-bs-toggle="dropdown"> BTS Propaktani
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('frontend.bts') }}">BTS</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('frontend.bts-schedule') }}">@lang('frontend.schedule')</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.videos') }}">Video Propaktani</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('frontend.news') }}">Berita Propaktani</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('frontend.books') }}">Buku Propaktani</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-bs-toggle="dropdown"> Jejaring Hulu Hilir
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="{{ route('frontend.jejaring-produsen') }}">Produsen</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.jejaring-konsumen') }}">Konsumen
                                        / Offtaker</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('frontend.jejaring-investor') }}">Investor</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-bs-toggle="dropdown"> Kemitraan Propaktani
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('frontend.articles-iot') }}">Kemitraan</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tani Trainer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.faq') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        @if (Auth::user())
                            <li>
                                <a class="dropdown-item" href="{{ route('frontend.history-bts') }}">Unduh sertifikat
                                </a>

                            </li>
                        @else
                            <li class="nav-item loginBtn d-block d-md-none">
                                <div class="btnGroup">
                                    <a class="nav-link btn" href="{{ route('frontend.login') }}">Log In</a>
                                    <a class="nav-link btn" href="{{ route('frontend.register') }}">Register</a>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="rightMenu">
                    <ul class="nav">
                        <li class="nav-item searchBtn">
                            <a class="nav-link" href="javascript:void(0);">
                                <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #20CAC9"></i>
                            </a>
                        </li>
                        <li class="nav-item loginBtn d-none d-md-block">
                            @if (Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link flex items-center text-black" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" width="40"
                                    height="40" class="rounded-circle mr-2"> Hi, {{ auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('frontend.profile') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.history-bts') }}">Unduh
                                        sertifikat</a></li>
                                <div class="dropdown-divider"></div>
                                <li><a class="dropdown-item" href="{{ route('frontend.logout') }}"
                                        content="{{ csrf_token() }}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <div class="btnGroup">
                            <a class="nav-link btn" href="{{ route('frontend.login') }}">@lang('frontend.login.login')</a>
                            <a class="nav-link btn" href="{{ route('frontend.register') }}">@lang('frontend.login.register')</a>
                        </div>
                        @endif
                        <li class="nav-item toggleBtn">
                            <a class="nav-link navbar-toggler" href="javascript:void(0);" data-bs-toggle="collapse"
                                data-bs-target="#collapsibleNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="widgetOverlay"></div>
</header>
<div class="searchBox searchBox1">
    <div class="container">
        <div class="searchBoxInner">
            <div class="searchHeading">
                <h4>Search Our Site</h4>
            </div>
            <div class="searchInput">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <a href="javascript:void(0);" class="input-group-text searchButton"><span>Search</span> <i
                            class="fa-solid fa-arrow-right fa-xl" style="color: #ffffff;"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="main"></main>

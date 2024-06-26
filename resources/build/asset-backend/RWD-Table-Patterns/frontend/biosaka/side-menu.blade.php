<nav class="bg-white border-b border-b-slate-100">
    <ul class="nav-user-left">
        <li{!! Request::segment(1) == 'profile' ? ' class="active"' : '' !!}>
            <a href="{{ route('frontend.profile') }}">
                <span class="text-xl">
                    <i class="las la-user"></i>
                </span>
                Profil
            </a>
            </li>
            <li{!! Request::segment(1) == 'history-bts' ? ' class="active"' : '' !!}>

                <a href="{{ route('frontend.history-bts') }}">
                    <span class="text-xl">
                        <i class="las la-file-signature"></i>
                    </span>
                    Unduh Sertifikat BTS
                </a>

                </li>
                <li{!! Request::segment(1) == 'profile-komoditas' ? ' class="active"' : '' !!}>
                    @role('produsen')
                        <a href="{{ route('frontend.profile-komoditas') }}">
                            <span class="text-xl">
                                <i class="las la-tractor"></i>
                            </span>
                            Menjual Produk
                        </a>
                    @endrole
                    </li>
                    <li{!! Request::segment(1) == 'profile-konsumen' ? ' class="active"' : '' !!}>
                        @role('konsumen')
                            <a href="{{ route('frontend.profile-konsumen') }}">
                                <span class="text-xl">
                                    <i class="las la-tractor"></i>
                                </span>
                                Membeli Produk
                            </a>
                        @endrole
                        </li>

                        <li{!! Request::segment(1) == 'profile-investor' ? ' class="active"' : '' !!}>
                            @role('investor')
                                <a href="{{ route('frontend.profile-investor') }}">
                                    <span class="text-xl">
                                        <i class="las la-tractor"></i>
                                    </span>
                                    Investasi Produk
                                </a>
                            @endrole
                            </li>

    </ul>
</nav>

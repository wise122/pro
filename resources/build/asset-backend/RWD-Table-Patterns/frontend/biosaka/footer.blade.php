<footer class="w-100 clearfix footer footerBg1" id="footer">
    <div class="footerGroup">
        <div class="footerInner">
            <div class="container">
                <div class="footerInnerRow">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="footerCol footerCol1">
                                <div class="footerLogo">
                                    <img src="{{ asset(Storage::url('logo')) . '/logo_bwh.png' }}" alt="footer-logo"
                                        class="img-fluid">
                                </div>
                                <div class="footerPara">
                                    <p>Propaktani terus bertekad majukan petani, bertani itu hebat, petani itu keren,
                                        pertanian maju, mandiri, modern</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="footerCol footerCol2">
                                <div class="footerMenuHeading">
                                    <h4>BTS Propaktani</h4>
                                </div>
                                <div class="footerMenuLink">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('frontend.bts') }}"><i
                                                    class="fa fa-caret-right" aria-hidden="true"></i> BTS</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('frontend.bts-schedule') }}"><i
                                                    class="fa fa-caret-right" aria-hidden="true"></i> @lang('frontend.schedule')
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('frontend.videos') }}"><i
                                                    class="fa fa-caret-right" aria-hidden="true"></i> Video
                                                Propaktani</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('frontend.news') }}"><i
                                                    class="fa fa-caret-right" aria-hidden="true"></i> Berita
                                                Propaktani</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('frontend.books') }}"><i
                                                    class="fa fa-caret-right" aria-hidden="true"></i> Buku
                                                Propaktani</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="footerCol footerCol3">
                                <div class="footerMenuHeading">
                                    <h4>Jejaring Hulu Hilir</h4>
                                </div>
                                <div class="footerMenuLink">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i> Produsen</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i> Konsumen / Offtaker</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);"><i class="fa fa-caret-right"
                                                    aria-hidden="true"></i> Investor</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="footerCol footerCol4">
                                <div class="footerMenuHeading">
                                    <h4>Contact Information</h4>
                                </div>
                                <div class="footerMenuLink footerContactInfo">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);">
                                                <div class="contactInfo">
                                                    <div class="contactInfoIcon">
                                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="contactInfoTxt">
                                                        <h6>Call Us Now:</h6>
                                                        <p class="mb-0">
                                                            {{ Setting::getValByName('company_phone') ? Setting::getValByName('company_phone') : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);">
                                                <div class="contactInfo">
                                                    <div class="contactInfoIcon">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="contactInfoTxt">
                                                        <h6>Email Address:</h6>
                                                        <p class="mb-0">
                                                            {{ Setting::getValByName('company_email') ? Setting::getValByName('company_email') : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);">
                                                <div class="contactInfo">
                                                    <div class="contactInfoIcon">
                                                        <i class="fa fa-clock" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="contactInfoTxt">
                                                        <h6>Office Hour:</h6>
                                                        <p class="mb-0">08:00am - 6:00pm</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row g-3">
                    <div class="col-sm-12 col-md-6">
                        <p class="mb-0 text-white">Copyright © 2023 <a class="text-white"
                                href="javascript:void(0);">Propaktani</a>. All
                            Rights
                            Reserved.</p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="socialMediaIcon d-flex justify-content-lg-end">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank"
                                        href="https://api.whatsapp.com/send?text={!! Setting::getValByName('text_wa') ? Setting::getValByName('text_wa') : 'No Text WA' !!}&source=&phone={!! Setting::getValByName('phone_wa') ? Setting::getValByName('phone_wa') : 'No Phone WA' !!}">
                                        <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank" href="https://t.me/{!! Setting::getValByName('company_telegram') ? Setting::getValByName('company_telegram') : 'No Telegram' !!}">
                                        <i class="fa-brands fa-telegram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank"
                                        href="https://instagram.com/{!! Setting::getValByName('company_ig') ? Setting::getValByName('company_ig') : 'No Instagram' !!}">
                                        <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank"
                                        href="https://facebook.com/{!! Setting::getValByName('company_fb') ? Setting::getValByName('company_fb') : 'No Facebook' !!}">
                                        <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank"
                                        href="https://youtube.com/{!! Setting::getValByName('company_yt') ? Setting::getValByName('company_yt') : 'No Youtube' !!}">
                                        <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" target="_blank"
                                        href="https://www.tiktok.com/{!! Setting::getValByName('company_tiktok') ? Setting::getValByName('company_tiktok') : 'No Tiktok' !!}">
                                        <i class="fa-brands fa-tiktok" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

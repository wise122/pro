@extends('frontend.layouts.app')

@section('css')
    <style>
        .poultryPerformanceBanner {
            display: none;
        }

        .categorySecItem {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <section class="w-100 poultryProductsSlider" id="poultryProductSlider">
        <div class="container">
            <div class="poultryProductsHead">
                <div class="commonHeading">
                    <h4>@lang('frontend.schedule_weekly')</h4>
                    <p>Jadwal BTS adalah jadwal yang akan diselenggarakan untuk BTS</p>
                </div>
                <div class="owlNavBtn">
                    <div class="btn-wrap">
                        <button class="prev-btn">
                            <i class="fa-solid fa-arrow-left fa-xl" style="color: #ffffff;"></i>
                        </button>
                        <button class="next-btn">
                            <i class="fa-solid fa-arrow-right fa-xl" style="color: #ffffff;"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="owl-carousel owl-theme owlCarouselRelatedProducts owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @foreach ($item_bts as $item)
                            <div class="owl-item" style="width: 798px;">
                                <div class="item">
                                    <div class="owlSlideItem ">
                                        <div class="owlSlideItemImg circleEffect">
                                            @if (!empty($item['daily_schedule']['cover']))
                                                <img src="{{ asset('storage/bts-schedule/' . $item['daily_schedule']['cover']) }}"
                                                    alt="" class="img-fluid">
                                            @else
                                                <img src="{{ asset('assets/images/no-image.jpg') }}" alt=""
                                                    class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="owlSlideItemContent">
                                            <div class="dropdownCol">
                                                <ul class="dropdownUl nav flex-column">
                                                    <li class="dropdownItem"><a class="dropdownLink"
                                                            href="{{ route('frontend.bts-schedule-detail', $item['daily_schedule']['slug']) }}">{{ $item['daily_schedule']['title'] }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="relatedProductsBtn">
                                                <a href="{{ route('frontend.bts-schedule-detail', $item['daily_schedule']['slug']) }}"
                                                    class="readMoreBtn">Selengkapnya <i
                                                        class="fa-solid fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 798px;">
                                <div class="item">
                                    <div class="owlSlideItem ">
                                        <div class="owlSlideItemImg circleEffect">
                                            @if (!empty($item['daily_schedule']['cover_week']))
                                                <img src="{{ asset($item['daily_schedule']['cover_week']) }}" alt=""
                                                    class="img-fluid">
                                            @else
                                                <img src="{{ asset('assets/images/no-image.jpg') }}" alt=""
                                                    class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="owlSlideItemContent">
                                            <div class="dropdownCol">
                                                <ul class="dropdownUl nav flex-column">
                                                    @foreach ($item['schedule_in_week'] as $row)
                                                        <li class="dropdownItem"><a class="dropdownLink"
                                                                href="sho_feature_with_images.html">{{ $row['judul'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-nav">
                    <button type="button" role="presentation" class="owl-prev">
                        <span aria-label="Previous">‹</span>
                    </button>
                    <button type="button" role="presentation" class="owl-next">
                        <span aria-label="Next">›</span>
                    </button>
                </div>
                <div class="owl-dots disabled"></div>
            </div>
        </div>
    </section>
    <section class="w-100 categorySec" id="categorySec">
        <div class="container">
            <div class="categorySecInner ">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('frontend.jejaring-produsen') }}">
                            <div class="categorySecItem">
                                <div class="categoryIcon">
                                    <span>
                                        <img src="{{ asset('assets/images/icon2.png') }}" alt="icon" class="img-fluid">
                                    </span>
                                </div>
                                <div class="categoryContent">
                                    <h5>Produsen</h5>
                                    <p>Produk Pertanian {{ $produsen }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('frontend.jejaring-konsumen') }}">
                            <div class="categorySecItem">
                                <div class="categoryIcon">
                                    <span>
                                        <img src="{{ asset('assets/images/icon15.png') }}" alt="icon"
                                            class="img-fluid">
                                    </span>
                                </div>
                                <div class="categoryContent">
                                    <h5>Konsumen/offtaker</h5>
                                    <p>Produk Pertanian {{ $konsumen }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('frontend.jejaring-investor') }}">
                            <div class="categorySecItem">
                                <div class="categoryIcon">
                                    <span>
                                        <img src="{{ asset('assets/images/icon17.png') }}" alt="icon"
                                            class="img-fluid">
                                    </span>
                                </div>
                                <div class="categoryContent">
                                    <h5>Investor</h5>
                                    <p>Pertanian {{ $investor }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="javascript:void(0);">
                            <div class="categorySecItem">
                                <div class="categoryIcon">
                                    <span>
                                        <img src="{{ asset('assets/images/icon14.png') }}" alt="icon"
                                            class="img-fluid">
                                    </span>
                                </div>
                                <div class="categoryContent">
                                    <h5>Lainnya</h5>
                                    <p>{{ $lainnya }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (count($komoditasProdusen) > 0)
        <div class="container">
            <h4>Komoditas Terbaru</h4>
            <p>Komoditas dari produsen untuk konsumen</p>
            <div class="d-flex justify-content-center">
                <div class="col-12 product-section">
                    <div class="row g-2 g-md-3 g-lg-3">
                        @foreach ($komoditasProdusen as $komoditas)
                            <a class="product-container col-12 col-md-6 col-lg-2"
                                href="{{ route('frontend.jejaring-produsen-komoditas', $komoditas->id) }}">
                                <div class="card d-flex flex-column h-100">
                                    <div class="product-image">
                                        <img src="{{ asset('storage/komoditas/' . $komoditas->photo) }}"
                                            alt="{{ $komoditas->photo }}">
                                    </div>
                                    <div class="card-body d-flex flex-column flex-grow-1">
                                        <span class="product-title">{{ $komoditas->nama_komoditas }}</span>
                                        <span class="product-price">Rp. 100.000 / kg</span>
                                        <div class="seller-info mt-auto">
                                            <span>{{ $komoditas->kota }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a class="btnCustom2 btn-1 hover-slide-down" href="{{ route('frontend.jejaring-produsen') }}">
                    <span>Lihat semua komoditas
                        <i class="fa-solid fa-arrow-right fa-xl" style="color: #ffffff;"></i>
                    </span>
                </a>
            </div>
        </div>
    @endif
    @if (!empty($data_bts))
        <section class="w-100 clearfix gotQuestionsSec" id="gotQuestionsSec">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column justify-content-between">
                        <div class="gotQuestions">
                            <div class="gotQuestionsContent">
                                <div class="commonHeading">
                                    <h4>BTS Propaktani</h4>
                                    <p>BTS Propaktani adalah Media untuk Pelatihan Secara Online didalam
                                        Zoom dengan beberapa Narasumber yang terkemuka
                                        sehingga para petani dapat arahan cara bertani yang baik dan peninggkatan
                                        produktifitas pertanian di Indonesia, dengan semangat
                                        bersama para petani Indonesia.</p>
                                </div>
                            </div>
                            <div class="gotQuestionsVideo">
                                <div class="videoBanner w-100 position-relative">
                                    <img src="{{ asset('storage/bts/' . $data_bts->cover) }}" alt="banner"
                                        class="w-100 img-fluid">
                                    <a href="javascript:void(0)" class="flVideo youtube-link"
                                        youtubeid="{{ $data_bts->youtube_id }}">
                                        <div class="circle pulse orange">
                                            <img src="{{ asset('assets/images/icon/play.png') }}" alt="banner"
                                                class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-between mt-4 mt-lg-0">
                        <div class="gotQuestions">
                            <div class="gotQuestionsContent">
                                <div class="commonHeading">
                                    <h4>Live Bts Propaktani</h4>
                                    <p>Cek berkala untuk jadwal Live BTS Propaktani supaya tidak ketinggalan
                                        info info menarik
                                        tentang bagaimana cara memanfaatkan teknologi.</p>
                                </div>
                            </div>
                            <div class="gotQuestionsVideo">
                                <div class="videoBanner">
                                    <div class="videoBanner w-100 position-relative">
                                        <img src="{{ asset('storage/live/' . $live->cover) }}" alt="banner"
                                            class="w-100 img-fluid">
                                        <a href="javascript:void(0)" class="flVideo youtube-link"
                                            youtubeid="{{ $live->youtube_id }}">
                                            <div class="circle pulse orange">
                                                <img src="{{ asset('assets/images/icon/play.png') }}" alt="banner"
                                                    class="img-fluid">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btnCustom2 btn-1 hover-slide-down" href="{{ route('frontend.bts') }}">
                        <span>Lihat semua episode video
                            <i class="fa-solid fa-arrow-right fa-xl" style="color: #ffffff;"></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
    @endif
    <section class="w-100 clearfix latestNewsArticles" id="latestNewsArticles">
        <div class="container">
            <div class="latestNewsArticlesInner">
                <div class="commonHeading">
                    <h4>Berita</h4>
                    <p>Berikut beberapa list tentang berita propaktani </p>
                </div>
                <div class="latestNewsCard">
                    <div class="row">
                        @foreach ($data_news as $da)
                            <div class="col-xs-12 col-sm-6 col-lg-4 g-3">
                                <div class="card latestNewsCardInner">
                                    <div class="card-body">
                                        <div class="latestNewsCardImg">
                                            @if ($da->type == 'berita')
                                                <a href="{{ route('frontend.news-detail', $da->slug) }}">
                                                    <img src="{{ asset('storage/news/' . $da->image) }}" alt="img"
                                                        class="w-100 img-fluid">
                                                </a>
                                            @else
                                                <a href="{{ route('frontend.articles-detail', $da->slug) }}">
                                                    <img src="{{ asset('storage/articles/' . $da->image) }}"
                                                        alt="img" class="w-100 img-fluid">
                                                </a>
                                            @endif
                                            <div class="latestNewsDate">
                                                <a href="javascript:void(0);">
                                                    <h5>{{ date('d', strtotime($da->date)) }}</h5>
                                                    <span>{{ date('M', strtotime($da->date)) }}</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="latestNewsCardInnerContent">
                                            <div class="latestNewsList">
                                                <div class="latestNewsUser">
                                                    <a href="javascript:void(0);">
                                                        <i class="fa-solid fa-user"></i>
                                                        <span>by {{ $da->username }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="latestNewsTxt">
                                                <h4>
                                                    @if ($da->type == 'berita')
                                                        <a
                                                            href="{{ route('frontend.news-detail', $da->slug) }}">{{ $da->title }}</a>
                                                    @else
                                                        <a
                                                            href="{{ route('frontend.articles-detail', $da->slug) }}">{{ $da->title }}</a>
                                                    @endif
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white border-0">
                                        <div class="latestNewBtn text-center">
                                            @if ($da->type == 'berita')
                                                <a class="btnCustom5 btn-1 hover-slide-down"
                                                    href="{{ route('frontend.news-detail', $da->slug) }}">
                                                @else
                                                    <a class="btnCustom5 btn-1 hover-slide-down"
                                                        href="{{ route('frontend.articles-detail', $da->slug) }}">
                                            @endif
                                            <span>selengkapnya <i class="fa-solid fa-arrow-right fa-xl"
                                                    style="color: #ffffff;"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="latestNewsCardBtn ">
                        <a class="btnCustom2 btn-1 hover-slide-down" href="{{ route('frontend.news') }}">
                            <span>Lihat Semua <i class="fa-solid fa-arrow-right fa-xl" style="color: #ffffff;"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (!empty($video))
        <section class="w-100 clearfix gotQuestionsSec" id="gotQuestionsSec">
            <div class="container">
                <div class="gotQuestionsRow">
                    <div class="gotQuestionsCol">
                        <div class="gotQuestions">
                            <div class="gotQuestionsContent">
                                <div class="commonHeading">
                                    <h4>Video Propaktani</h4>
                                    <p>List Video Propaktani</p>
                                </div>
                            </div>
                            <div class="gotQuestionsVideo">
                                <div class="videoBanner ">
                                    <img src="{{ asset('storage/video/' . $video->cover) }}" alt="banner"
                                        class="w-100 img-fluid">
                                    <a href="javascript:void(0)" class="flVideo youtube-link"
                                        youtubeid="{{ $video->id_youtube }}">
                                        <div class="circle pulse orange">
                                            <img src="{{ asset('assets/images/icon/play.png') }}" alt="banner"
                                                class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btnCustom2 btn-1 hover-slide-down " href="{{ route('frontend.videos') }}">
                        <span>Lihat semua video
                            <i class="fa-solid fa-arrow-right fa-xl" style="color: #ffffff;"></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>
    @endif
    <section class="w-100 clearfix testimonialsBox" id="testimonialsBox">
        <div class="testimonialsRow">
            <div class="testimonialsCol testimonialsCol1">
                <h4>KATA PETANI</h4>
                <h2>Berikut yang dikatakan petani</h2>
                <a class="btn btn-1 hover-slide-down mt-3 " href="javascript:void(0);">
                    <span>View All <img src="{{ asset('assets/images/icon/icon-black-right.png') }}" alt="icon"
                            class="img-fluid"></span>
                </a>
            </div>
            <div class="testimonialsCol testimonialsCol2">
                <div class="testimonialSlider">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="slide1">
                            <div class="testimonialSliderItem ">
                                <p>propaktani media informasi bagi petani, membangun jejaring hulu hilir produsen,
                                    konsumen,
                                    investor, membangun kemiteraan budidaya pengolahan pemasaran serta memberikan
                                    pelatihan
                                    bagi petani</p>
                                <h4></h4>
                                <span>Produsen</span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="slide2">
                            <div class="testimonialSliderItem ">
                                <p>Sangat bangga telah dipedulikan keinginan petani petani indonesia diperhatikan</p>
                                <h4>Sandra Galih Ramadhan</h4>
                                <span>Investor</span>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="slide3">
                            <div class="testimonialSliderItem ">
                                <p>Majulah indonesia bersama dengan pemerintahan republik indonesia, mari bersatu dan
                                    rangkul kami !</p>
                                <h4>Khoriul Hasanah</h4>
                                <span>Petani</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonialSliderImg">
                    <!-- Nav pills -->
                    <ul class="nav nav-pills ">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#slide1">
                                <img src="{{ asset('assets/images/img21.png') }}" alt="icon" class="img-fluid">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#slide2">
                                <img src="{{ asset('assets/images/user2.png') }}" alt="icon" class="img-fluid">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#slide3">
                                <img src="{{ asset('assets/images/user3.png') }}" alt="icon" class="img-fluid">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection


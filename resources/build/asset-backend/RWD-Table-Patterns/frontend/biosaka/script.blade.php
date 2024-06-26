<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset(mix('assets/js/bootstrap.bundle.min.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
    integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset(mix('assets/js/owl.carousel.min.js')) }}"></script>
<script src="{{ asset(mix('assets/js/contact_form.js')) }}"></script>
<script src="{{ asset(mix('assets/js/grt-youtube-popup.js')) }}"></script>
<script src="{{ asset(mix('assets/js/custom.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset(mix('assets/vendor/sweet-alert2/sweetalert2.min.js')) }}"></script>
@yield('vendor-script')
@yield('script')
<script>
    $(".select2").select2({
        width: '100%'
    });

    $(".youtube-link").grtyoutube({
        autoPlay: true,
        theme: "dark",
    });

    $(document).ready(function($) {
        $('.owlCarouselProducts').owlCarousel({
            loop: false,
            margin: 0,
            nav: true,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 3,
                },
                1400: {
                    items: 4,
                    loop: false
                }
            }
        })
    });

    $(document).ready(function($) {
        $('.owlCarouselRelatedProducts').owlCarousel({
            loop: false,
            margin: 0,
            nav: true,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                992: {
                    items: 2,
                    loop: false
                }
            }
        })
    });

    $('.carouselGalleryPoultry').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            }
        }
    })
    $(".carouselGalleryPoultry .owl-prev").html(
        '<img src="{{ asset('assets/images/icon/icon-black-left.png') }}" alt="left" class="img-fluid">');
    $(".carouselGalleryPoultry .owl-next").html(
        '<img src="{{ asset('assets/images/icon/icon-black-right.png') }}" alt="right" class="img-fluid">');

    $(document).ready(function($) {
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            loop: true,
            items: 1
        });
        $(".next-btn").click(function() {
            owl.trigger("next.owl.carousel");
        });
        $(".prev-btn").click(function() {
            owl.trigger("prev.owl.carousel");
        });
        $(".prev-btn").addClass("disabled");
        $(owl).on("translated.owl.carousel", function(event) {
            if ($(".owl-prev").hasClass("disabled")) {
                $(".prev-btn").addClass("disabled");
            } else {
                $(".prev-btn").removeClass("disabled");
            }
            if ($(".owl-next").hasClass("disabled")) {
                $(".next-btn").addClass("disabled");
            } else {
                $(".next-btn").removeClass("disabled");
            }
        });
    });

    const header = document.querySelector(".headerOne");
    const toggleClass = "headerActive";
    window.addEventListener("scroll", () => {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 150) {
            header.classList.add(toggleClass);
        } else {
            header.classList.remove(toggleClass);
        }
    });

    $(".passwordEye").click(function() {
        $('.passwordEye i.fa').toggleClass("fa-eye fa-eye-slash");
        input = $(this).parent().find("input");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $(".passwordEyes").click(function() {
        $('.passwordEyes i.fa').toggleClass("fa-eye fa-eye-slash");
        input = $(this).parent().find("input");
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $('.lang').on('change', function(e) {
        let lang = $(this).val();
        let url = '{{ route('lang.index', 'lang') }}';
        url = url.replace('lang', lang);
        $.ajax({
            url: url,
            type: 'GET',
            success: function(res) {
                location.reload();
            }
        })
    });

    //
    // SELECT 2 PLUGINS
    //
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
    $(document).ready(function() {
        // Select 2 default propaktani
        $('.select2-proweb').select2({
            placeholder: $(this).data('placeholder'),
            width: '100%',
            theme: 'bootstrap-5',
        });
        $('.select2-proweb-nosearch').select2({
            placeholder: $(this).data('placeholder'),
            width: '100%',
            theme: 'bootstrap-5',
            minimumResultsForSearch: -1,
        });
    });
</script>

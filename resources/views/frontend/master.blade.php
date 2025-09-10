@php
    $lang = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<!DOCTYPE html>
<html dir="{{ $lang }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ config('app.name') }} - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('front/assets/images/Logo 2.svg') }}" type="image/x-icon">
    <!-- CSS Code -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/home.css') }}">
    <!-- Swiper JS -->

    <link rel="stylesheet" href="{{ asset('front/assets/css/swiper-bundle.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
    @yield('styles')
    @livewireStyles()
    <style>
        .menu-lang ul li {
            display: flex;
            justify-content: space-between;
            flex-direction: row-reverse;
        }

        .menu-lang ul li a::after {
            display: none;
        }

        .lang-02 ul li a::before {
            display: none;
        }

        .lang-02 ul li a::after {
            display: none;
        }

        .lang-02 ul li {
            display: flex;
            gap: 7px;
        }

        .selected-lang::after {
            background-image: url({{ asset('front/assets/images/' . $localeFlag) }});
        }
    </style>
</head>

<body>
    <div class="looder">
        <div class="cssload-loader">Loading</div>
    </div>
    <div class="h-top">
        <div class="left">
            <div class="menu-lang">
                <div class="selected-lang">
                    <i class="fa-solid fa-angle-down"></i>
                    <span>{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                    <!-- <img src="images/ar.svg" alt="ar"> -->
                </div>
                <ul>
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <img width="20" src="{{ asset('front/assets/images/' . $properties['flag']) }}"
                                alt="">
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="weather">
                <img src="{{ asset('front/assets/images/Sunny.svg') }}" alt="Sunny">
                <span>{!! $weather !!}</span>
            </div>
        </div>
        <div class="right">
            <a href="mailto: info@digitaleventspro.com"><img src="{{ asset('front/assets/images/Email-black.svg') }}"
                    alt="Email">info@digitaleventspro.com</a>
            <a href="tel: 0576078079"><img src="{{ asset('front/assets/images/Phone-black.svg') }}" alt="Phone">
                0576078079</a>
        </div>
    </div>
    @yield('header')

    @yield('content')
    <footer>
        <div class="top">
            <div class="container">
                <div class="contact">
                    <img src="{{ asset('front/assets/images/Logo-footer.svg') }}" alt="Mega" class="logo">

                    <div class="numbers">
                        <p>{{ trans('front/index.الرقم الضريبي') }}: <a
                                href="tel: 311350289200003">311350289200003</a></p>
                        <p>{{ trans('front/index.السجل التجاري') }}: <a
                                href="tel: 700590412">700590412</a></p>
                    </div>
                </div>
                <div class="quick-links">
                    <div class="links">
                        <div class="col-1">
                            <ul>
                                <a href="{{ route('index') }}">
                                    <li>{{ trans('front/index.الرئيسية') }}</li>
                                </a>
                                <a href="{{ route('about_us', '1') }}">
                                    <li>{{ trans('front/index.نبذة عنا') }}</li>
                                </a>
                                <a href="{{ route('projects') }}">
                                    <li>{{ trans('front/index.أعمالنا') }}</li>
                                </a>
                                <a href="{{ route('clients') }}">
                                    <li>{{ trans('front/index.عملاؤنا') }}</li>
                                </a>
                            </ul>
                        </div>
                        <div class="col-1">
                            <ul>
                                <a href="{{ route('booking') }}">
                                    <li>{{ trans('front/index.الحجز') }}</li>
                                </a>
                                <a href="{{ route('blogger') }}">
                                    <li>{{ trans('front/index.المدونة') }}</li>
                                </a>
                                <a href="{{ route('policy') }}">
                                    <li>{{ trans('front/index.سياسة الشركه') }}</li>
                                </a>
                                <a href="{{ route('terms_and_conditions') }}">
                                    <li>{{ trans('front/index.البنود والاحكام') }}</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                    <div class="subscribe">
                        <p>{{ trans('front/index.الإشتراك في القائمة البريدية') }}</p>
                        <form action="">
                            <input type="email" placeholder="info@digitaleventspro.com" required>
                            <input type="submit" value="{{ trans('front/index.اشتراك') }}">
                        </form>
                    </div>
                </div>
                <div class="map">
                    <img src="{{ asset('front/assets/images/map-footer.svg') }}" alt="map" class="map-image">
                    <div class="row call">
                        <a href="tel:0576078079">0576078079</a>
                        <img src="{{ asset('front/assets/images/Phone.svg') }}" alt="Phone">
                    </div>
                    <div class="row email">
                        <a href="mailto: info@digitaleventspro.com">info@digitaleventspro.com</a>
                        <img src="{{ asset('front/assets/images/Email.svg') }}" alt="Email">
                    </div>
                    <div class="sci">
                        <a href="https://www.facebook.com/digitaleventspro/photos/?_rdr"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/events_arts_/"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://x.com/eventsarts_sa"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCY6r7owVlapxXxNTHYIzpfw"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    <div class="numbers">
                        <p>{{ trans('front/index.الرقم الضريبي') }}: <a
                                href="tel:0576078079">311350289200003</a></p>
                        <p>{{ trans('front/index.السجل التجاري') }}: <a
                                href="tel:0576078079">700590412</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <p>جميع الحقوق محفوظه @2023-2025</p>
        </div>
    </footer>

    <button class="btn-top">
        <img src="{{ asset('front/assets/images/Up Chevron.svg') }}" alt="btn">
    </button>

    <div class="cust-support">
        <a href="mailto:info@digitaleventspro.com" class="cust-action"><img
                src="{{ asset('front/assets/images/Email-white.svg') }}" alt="Email"></a>
        <a href="tel:0576078079" class="cust-action"><img src="{{ asset('front/assets/images/Phone-black.svg') }}"
                alt="Phone"></a>
        <a href="https://api.whatsapp.com/send?phone=966500698668" class="cust-action"><img
                src="{{ asset('front/assets/images/whatsapp.svg') }}" alt="whatsapp"></a>
    </div>

    @livewireScripts()
    <!---------------- Scripts ---------------->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    <script src="{{ asset('front/assets/js/counter.js') }}"></script>
    <!-- Swiper JS -->
    <script src="{{ asset('front/assets/js/swiper-bundle.min.js') }}"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".success", {
            slidesPerView: 4,
            spaceBetween: 20,
            freeMode: true,
            pagination: {
                clickable: true,
            },
            autoplay: {
                delay: 1,
                disableOnInteraction: false,
            },
            speed: 6000,
            breakpoints: {
                220: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                520: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            }
        });

        var swiper = new Swiper(".swiper-package", {
            slidesPerView: 1,
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            freeMode: true,
            pagination: {
                clickable: true,
            },
        });

        var swiper = new Swiper(".ser-slide", {
            slidesPerView: 3,
            spaceBetween: 20,
            freeMode: true,
            pagination: {
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                220: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                540: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            }
        });

        var swiper = new Swiper(".ser-slide-1", {
            slidesPerView: 3,
            spaceBetween: 20,
            freeMode: true,
            pagination: {
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                220: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                540: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            }
        });

        var swiper = new Swiper(".work", {
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                220: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            }
        });

        var swiper = new Swiper(".review", {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
    @yield('scripts')
</body>

</html>

<!DOCTYPE html>
@php
    use Illuminate\Support\Facades\Storage;
    $lang = app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
@endphp
<html dir="{{ $lang }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Digital Events</title>
    <link rel="shortcut icon" href="{{ asset('front/assets/images/Logo 2.svg') }}" type="image/x-icon">
    <!-- CSS Code -->
    @if ($lang == 'rtl')
        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('front/assets/css/style-en.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('front/assets/css/home.css') }}">
    <!-- Swiper JS -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/swiper-bundle.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .who-image {
            background-image: url({{ asset('front/assets/images/who-are-weee.png') }});
        }
        
        .cursor {
           display: inline-block;
           width: 5px;
           height: 50px;
           margin-inline : 13px;
           box-shadow : -3px -1px 20px #46b5a1b7;
           background-color: #ffffffc4;
           animation: cursorAnimation 0.7s infinite;
        }
        
        @keyframes cursorAnimation {
           0% {
              opacity: 1;
           }
           50% {
              opacity: 0;
           }
           100% {
              opacity: 1;
           }
        }

        
    </style>
</head>

<body>
    <!---------------- Start Header ---------------->
    <div class="looder">
        <div class="cssload-loader">Loading</div>
    </div>
    <div class="h-top">
        <div class="left">
            <div class="menu-lang">
                <div class="selected-lang">
                    <i class="fa-solid fa-angle-down"></i>
                    <span>{{ LaravelLocalization::getCurrentLocaleNative() }} </span>
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
                <span> {!! $weather !!}

                </span>
            </div>
        </div>
        <div class="right">
            <a href="mailto: info@digitaleventspro.com"><img src="{{ asset('front/assets/images/Email-black.svg') }}"
                    alt="Email">info@digitaleventspro.com
            </a>
            <a href="tel:0576078079"><img src="{{ asset('front/assets/images/Phone-black.svg') }}" alt="Phone">
                0576078079</a>
        </div>
    </div>
    <div class="header">
        <div class="bg-header">
        <picture>
            <source media="(max-width: 767px)" srcset="{{ asset('front/assets/images/banners.png') }}">
            <img src="{{ asset('front/assets/images/banners1.png') }}" alt="Banner" style="width:100%; height:100%; object-fit: cover; display:block; margin-bottom:20px;">
        </picture>

        </div>
        <div class="content-slogun">
            <div class="slogun-text">
                <h1>
                </h1>
            </div>
        </div>
        <div class="nav-bar">
            <div class="logo-1">
                <a href="{{ route('index') }}"><img src="{{ asset('front/assets/images/Logo.svg') }}"
                        alt="Mega - Logo"></a>
            </div>
            <nav>
                <ul class="navbar">
                    <li><a href="{{ route('index') }}"
                            class="nav__link active">{{ trans('front/index.الرئيسية') }}</a></li>
                    <li><a href="{{ route('about_us', '1') }}"
                            class="nav__link">{{ trans('front/index.نبذة عنا') }}</a></li>
                    <li>
                        <p class="nav__link dropdown 1">{{ trans('front/index.خدماتنا') }}
                            <i class="fa-solid fa-angle-down"></i>
                        <ul class="submenu">
                            @foreach ($services ?? [] as $service)
                                <li><a href="{{ route('service', $service->id) }}">{{ $service->trans_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        </p>
                    </li>
                    <li>
                        <p class="nav__link dropdown 2">{{ trans('front/index.منتجاتنا') }}
                            <i class="fa-solid fa-angle-down"></i>
                        <ul class="submenu">
                            @foreach ($categories as $categoree)
                                <li><a href="{{ route('product', $categoree->id) }}">{{ $categoree->trans_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        </p>
                    </li>
                    <li><a href="{{ route('projects') }}" class="nav__link">{{ trans('front/index.أعمالنا') }}</a>
                    </li>
                    <li><a href="{{ route('clients') }}" class="nav__link">{{ trans('front/index.عملاؤنا') }}</a></li>
                    <li><a href="{{ route('booking') }}" class="nav__link">{{ trans('front/index.الحجز') }}</a></li>
                    <li><a href="{{ route('blogger') }}" class="nav__link">{{ trans('front/index.المدونة') }}</a></li>
                    <li><a href="{{ route('contact_us') }}" class="nav__link"> {{ trans('front/index.اتصل بنا') }}
                        </a></li>
                    <li class="lang-02">
                        <div class="selected-lang">
                            <i class="fa-solid fa-angle-down"></i>
                            <span> {{ LaravelLocalization::getCurrentLocaleNative() }}</span>
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
                    </li>
                </ul>
            </nav>
              @if(app()->currentLocale() == 'ar')
                <div class="logo-2">
                    <a href="@if($pdf && $pdf->file)
                        {{ asset('storage/files/pdf-ar') }}
                    @endif">
                        <img src="{{ asset('front/assets/images/Logo 2.svg') }}" alt="Mega - Logo">
                    </a>
                </div>
            @endif
              @if(app()->currentLocale() == 'en')
                <div class="logo-2">
                    <a href="@if($pdf && $pdf->file)
                         {{ asset('storage/files/pdf-en') }}
                    @endif">
                        <img src="{{ asset('front/assets/images/Logo 2.svg') }}" alt="Mega - Logo">
                    </a>
                </div>
            @endif

            <div class="weather">
                <img src="{{ asset('front/assets/images/Sunny.svg') }}" alt="Sunny">
                <span>{!! $weather !!}</span>
            </div>
            <div class="icon-bar">
                <div class="bg-logo">
                    <img src="{{ asset('front/assets/images/Logo 2.svg') }}" alt="Mega - Logo" class="logo-mobile">
                </div>
                <div class="bg-btn-bar">
                    <i class="fa-solid fa-bars btn-bar"></i>
                </div>
            </div>
        </div>
    </div>
    <!---------------- End Header ---------------->

    <!---------------- Start Success Partners ---------------->
    <section class="success-partners">
        <div class="container">
            <div class="text">
                <h1 class="title">
                    {{ trans('front/index.شركاء النجاح') }}
                </h1>
                <p class="description">
                    {{ trans('front/index.How does your idea become a beautiful reality for us?') }}
                </p>
            </div>
        </div>
        <div class="swiper success">
            <div class="swiper-wrapper">
                @foreach ($our_clients ?? [] as $client)
                    <div class="swiper-slide success-slide">
                        <img class="skeleton" src="{{ Storage::url('images/ourClient/' . $client->image) }}"
                            alt="">
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!---------------- End Success Partners ---------------->

    <!---------------- Start Who are We ---------------->
    <section class="who-are-we">
        <div class="container">
            @if($about_us)
            <div class="who-image ">
                <div class="who-text ">
                    <h1>{{ $about_us->trans_title }}</h1>
                    <p>
                        {{ Str::limit($about_us->trans_content, 350, '...') }}
                    </p>
                    <a href="{{ route('about_us', $about_us->id) }}">{{ trans('front/index.رؤيه المزيد') }}</a>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!---------------- End Who are We ---------------->

    <!---------------- Start Services ---------------->
    <section class="services">
        <div class="container">
            <div class="text ">
                <h1 class="title">
                    {{ trans('front/index.خدماتنا') }}
                </h1>
                <p class="description">
                    {{ trans('front/index.Lets start with your ideas and turn them into a beautiful reality that will last for a long time') }}
                </p>
            </div>
            <div class="swiper ser-slide-1 content">
                <div class="swiper-wrapper">
                    @foreach ($services ?? [] as $service)
                        <div class="ser-card swiper-slide ">
                            @php
                                $sub_image = json_decode($service->sub_images, true) ?? [];
                            @endphp
                            @if(!empty($sub_image))
                                <img src="{{ Storage::url('images/sub_images_service/' . $sub_image[0]) }}"
                                class="skeleton" alt="service">
                            <div class="bg-overlay"></div>
                            <div class="ser-text">
                                <h2>{{ $service->trans_title }}</h2>
                                <p>
                                    {{ Str::limit($service->trans_description, 350, '...') }}
                                </p>
                                <a href="{{ route('service', $service->id) }}">
                                    {{ trans('front/index.رؤيه المزيد') }}
                                </a>
                            </div>
                            <div class="ser-text-overlay">
                                <h2>{{ $service->trans_title }}</h2>
                                <p>
                                    {{ Str::limit($service->trans_description, 350, '...') }}
                                </p>
                                <a href="{{ route('service', $service->id) }}">
                                    {{ trans('front/index.رؤيه المزيد') }}
                                </a>
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!---------------- End Services ---------------->

    <!---------------- End Packages and Offers ---------------->
    <section class="packages">
        <div class="container">
            <div class="text">
                <h1 class="title">
                    {{ trans('front/index.الباقات والعروض') }}
                </h1>
            </div>
            <div class="swiper swiper-package">
                <div class="swiper-wrapper">
                    @foreach ($offers ?? [] as $offer)
                        <div class="swiper-slide slide-package">
                            <img src="{{ Storage::url('images/offers/' . $offer->image) }}" alt="image"
                                style="max-height: 45vh;" class="skeleton">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!---------------- End Packages and Offers ---------------->

    <!---------------- Start Products ---------------->
    <section class="products">
        <div class="container">
            <div class="text">
                <h1 class="title ">
                    {{ trans('front/index.منتجاتنا') }}
                </h1>
                <p class="description ">
                    @if(app()->getLocale() == 'ar')
                        نفتخر في ديجيتال ايفنتس أن عندنا أفضل معدات الفعاليات والحفلات الأعلى جودة والأحدث على مستوى المملكة العربية السعودية
                    @else
                        At Digital Events, we are proud of the best, highest quality and latest events and party equipment in the Kingdom of Saudi Arabia
                    @endif
                </p>
            </div>
            <div class="swiper ser-slide content">
                <div class="swiper-wrapper">
                    @foreach ($categories ?? [] as $categoary)
                        @php
                            $randomIndex = rand(0, count($categoary->products) - 1);
                            $randomProduct = $categoary->products[$randomIndex];
                        @endphp
                        <div class="ser-card swiper-slide ">
                            <img loading="lazy" src="{{ Storage::url('images/product/' . $randomProduct->image) }}"
                                class="skeleton" alt="service">
                            <div class="bg-overlay"></div>
                            <div class="ser-text">
                                <h2>{{ $categoary->trans_name }}</h2>
                                <p> {{ Str::limit($categoary->trans_descreption, 350, '...') }}
                                </p>
                                <a
                                    href="{{ route('product', $categoary->id) }}">{{ trans('front/index.رؤيه المزيد') }}</a>
                            </div>
                            <div class="ser-text-overlay">
                                <h2>{{ $categoary->trans_name }}</h2>
                                <p>{{ Str::limit($categoary->trans_descreption, 350, '...') }} </p>
                                <a
                                    href="{{ route('product', $categoary->id) }}">{{ trans('front/index.رؤيه المزيد') }}</a>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!---------------- End Products ---------------->

    <!---------------- Start Numbers we achieved ---------------->
    <section class="num-we-ach">
        <div class="container">
            <div class="text">
                <h1 class="title">{{ trans('front/index.ارقام حققناها') }}</h1>
            </div>
            <div class="nums">
                <div class="num">
                    <p class="num-count" data-goal="4925">0</p>
                    <div class="num-des">
                        <p>{{ trans('front/index.عميل') }}</p>
                        <img src="{{ asset('front/assets/images/client-icon.svg') }}" alt="icon">
                    </div>
                </div>
                <div class="num">
                    <p class="num-count" data-goal="763">0</p>
                    <div class="num-des">
                        <p>{{ trans('front/index.فعالية') }}</p>
                        <img src="{{ asset('front/assets/images/effectiveness-icon.svg') }}" alt="icon">
                    </div>
                </div>
                <div class="num">
                    <p class="num-count" data-goal="5000">0</p>
                    <div class="num-des">
                        <p>{{ trans('front/index.زائر') }}</p>
                        <img src="{{ asset('front/assets/images/visitor-icon.svg') }}" alt="icon">
                    </div>
                </div>
                <div class="num">
                    <p class="num-count" data-goal="2000">0</p>
                    <div class="num-des">
                        <p>{{ trans('front/index.افتتاحات') }}</p>
                        <img src="{{ asset('front/assets/images/editorial-icon.svg') }}" alt="icon">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------- End Numbers we achieved ---------------->

    <!---------------- Start Works ---------------->
    <section class="works">
        <div class="container">
            <div class="text">
                <h1 class="title">
                    {{ trans('front/index.أعمالنا') }}
                </h1>
                <p class="description">
                    {{ trans('front/index.give_vision') }}
                </p>
            </div>
        </div>
        <div class="swiper work">
            <div class="swiper-wrapper">
                @foreach ($projects ?? [] as $project)
                    <div class="swiper-slide slide-work ">
                        <div class="work-card">
                            <img src="{{ Storage::url('images/projects/' . $project->main_image) }}" class="skeleton"
                                alt="image">
                            <div class="work-text">
                                <h3><a
                                        href="{{ route('project_details', $project->id) }}">{{ $project->trans_title }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!---------------- End Works ---------------->

    <!---------------- Start Customer Reviews ---------------->
    <section class="reviews">
        <div class="container">
            <div class="text">
                <h1 class="title ">
                    {{ trans('front/index.أراء العملاء') }}
                </h1>
                <p class="description ">
                    {{ trans('front/index.نسعي دائماً لتخليد ذكرى طيبه لديكم') }}
                </p>
            </div>
            <div class="testi-container">
                <div class="testimonial review">
                    <div class="testi-content swiper-wrapper">
                        @foreach ($reviews ?? [] as $review)
                            <div class="swiper-slide slide-review ">
                                <p>{{ $review->trans_name }}
                                </p>
                                <div class="profile">
                                    <img src="{{ Storage::url('images/reviews/' . $review->image) }}" alt="image"
                                        class="img-review skeleton">
                                    <h3>
                                        {{ Str::limit($review->trans_descreption, 200, '...') }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!---------------- End Customer Reviews ---------------->

    <!---------------- Start Contact US ---------------->
    <section class="contactus">
        <div class="container">
            <div class="cont-form">
                <h2>{{ trans('front/index.be_near') }}</h2>
                <p> {{ trans('front/index.Contact_us_now') }}
                </p>
                <livewire:front.contact.index-create>
            </div>
            <div class="cont-map" style="margin-top: 28px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4565.241707014927!2d39.1552654!3d21.5794937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d1426f672b21%3A0x49f26b8befeff6bc!2z2LTYsdmD2Kkg2KfZhNin2K3Yr9in2Ksg2KfZhNix2YLZhdmK2Kk!5e1!3m2!1sar!2seg!4v1757351640445!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="info">
                    <div class="call row">
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel: 0576078079">0576078079</a>
                    </div>
                    <div class="email row">
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto: info@digitaleventspro.com">info@digitaleventspro.com</a>
                    </div>
                    <div class="location row">
                        <i class="fa-solid fa-location-dot"></i>
                        حي، السلامة، جدة 23436، المملكة العربية السعودية
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------- End Contact US ---------------->

    <!---------------- Start Footer ---------------->
    <footer>
        <div class="top">
            <div class="container">
                <div class="contact">
                    <img src="{{ asset('front/assets/images/Logo-footer.svg') }}" alt="Mega" class="logo">

                    <div class="numbers">
                        <p>{{ trans('front/index.الرقم الضريبي') }}: <a
                                href="tel:0576078079">311350289200003</a></p>
                        <p>{{ trans('front/index.السجل التجاري') }}: <a
                                href="tel:0576078079">700590412</a></p>
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
                            <input type="email" placeholder="example@example.com" required>
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
            <p> {{ trans('front/index.جميع الحقوق محفوظه') }} @2023-2025</p>
        </div>
    </footer>
    <!---------------- End Footer ---------------->

    <!-- Button Top -->
    <button class="btn-top">
        <img src="{{ asset('front/assets/images/Up Chevron.svg') }}" alt="btn">
    </button>

    <!-- Customer Support -->
    <div class="cust-support">
        <a href="mailto:info@digitaleventspro.com" class="cust-action"><img
                src="{{ asset('front/assets/images/Email-white.svg') }}" alt="Email"></a>
        <a href="tel:0576078079" class="cust-action"><img src="{{ asset('front/assets/images/Phone-black.svg') }}"
                alt="Phone"></a>
        <a href="https://api.whatsapp.com/send?phone=966500698668&text=%D9%87%D9%84%20%D9%8A%D9%85%D9%83%D9%86%D9%86%D9%8A%20%D8%A7%D9%84%D8%A3%D8%B3%D8%AA%D9%81%D8%B3%D8%A7%D8%B1" class="cust-action"><img
                src="{{ asset('front/assets/images/whatsapp.svg') }}" alt="whatsapp"></a>
    </div>
    @livewireScripts()
    <script type="text/javascript" src="https://www.youtube.com/iframe_api?ver=6.9.1" id="vc_youtube_iframe_api_js-js">
    </script>
    <!---------------- Scripts ---------------->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    <script src="{{ asset('front/assets/js/counter.js') }}"></script>
    <!-- Swiper JS -->
    <script src="{{ asset('front/assets/js/swiper-bundle.min.js') }}"></script>
    <script>
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '100%',
                width: '100%',
                videoId: 'webfMkPTO9o',
                playerVars: {
                    autoplay: 1,
                    controls: 0,
                    loop: 1,
                    disablekb: 1,
                    enablejsapi: 1,
                    modestbranding: 1,
                    rel: 0,
                    showinfo: 0,
                    iv_load_policy: 3,
                    cc_load_policy: 1
                },
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady(event) {
            event.target.mute();
            event.target.playVideo();
            event.target.addEventListener('onStateChange', function(event) {
                if (event.data === YT.PlayerState.ENDED) {
                    event.target.seekTo(0);
                    event.target.playVideo();
                }
            });
        }
    </script>
    <script>
        var swiper = new Swiper(".success", {
            slidesPerView: 4,
            spaceBetween: 55,
            freeMode: true,
            pagination: {
                clickable: true,
            },
            autoplay: {
                delay: 1,
                disableOnInteraction: false,
            },
            speed: 3000,
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
            speed: 500,
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

        const allSkeleton = document.querySelectorAll('.skeleton')

        allSkeleton.forEach(item => {
            item.addEventListener('load', _ => {
                item.classList.remove('skeleton')
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

</body>

</html>

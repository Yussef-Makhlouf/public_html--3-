@extends('frontend.master')
@section('title', 'المنتجات')

<!-- @section('styles')
    <style>
        .header.sub-product {
            background-image: url({{ asset('storage/images/category/' . $category->image) }});
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
    </style>
@endsection -->

@section('header')
    <div class="header sub-product">
        <div class="nav-bar">
            <div class="logo-1">
                <a href="{{ route('index') }}"><img src="{{ asset('front/assets/images/Logo.svg') }}" alt="Mega - Logo"></a>
            </div>
            <nav>
                <ul class="navbar">
                    <li><a href="{{ route('index') }}" class="nav__link">{{ trans('front/index.الرئيسية') }}</a></li>
                    <li><a href="{{ route('about_us', '1') }}" class="nav__link">{{ trans('front/index.نبذة عنا') }}</a></li>
                    <li>
                        <p class="nav__link dropdown 1">{{ trans('front/index.خدماتنا') }}
                            <i class="fa-solid fa-angle-down"></i>
                        <ul class="submenu">
                            @foreach ($services as $service)
                                <li><a href="{{ route('service', $service->id) }}">{{ $service->trans_title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        </p>
                    </li>
                    <li>
                        <p class="nav__link dropdown 2 active">{{ trans('front/index.منتجاتنا') }}
                            <i class="fa-solid fa-angle-down"></i>
                        <ul class="submenu">
                            @foreach ($categories as $categoary)
                                <li><a href="{{ route('product', $categoary->id) }}">{{ $categoary->trans_name }}</a>
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
            <div class="logo-2">
                <a href="{{ route('index') }}"><img src="{{ asset('front/assets/images/Logo 2.svg') }}"
                        alt="Mega - Logo"></a>
            </div>
            <div class="weather">
                <img src="{{ asset('front/assets/images/Sunny.svg') }}" alt="Sunny">
                <span>33 C {{ trans('front/index.مشمس') }}</span>
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
        <h1 class="title-page">{{ $category->trans_name }}</h1>
    </div>
@endsection
<!---------------- End Header ---------------->
@section('content')
    <div class="sec-1">
        <div class="container">
            <div class="text">
                <div class="description">
                    {{ $category->trans_description }}
                </div>
            </div>
        </div>
    </div>
    <!---------------- Start Products ---------------->
    <section class="products tools tools-1">
        <div class="container">
            <div class="text">
                <h1 class="title">
                    {{ $category->trans_name }}
                </h1>
                <p class="description">
                    {{ trans('front/index.نسعي دائماً لتخليد ذكرى طيبه لديكم') }} </p>
            </div>
            <div class="ser-slide content">
                @foreach ($productsInCategory as $product)
                    <div class="ser-card swiper-slide">
                        <img src="{{ asset('storage/images/product/' . $product->image) }}" alt="service">
                        <div class="ser-text">
                            <h2>
                                {{ $product->trans_name }}
                            </h2>
                            <p>
                                {{ $product->trans_descreption }}

                            </p>
                            <div>
                                <a
                                    href="{{ route('booking') }}">{{ trans('front/index.الحجز') }}
                                </a>
                                <a href="{{ route('product_details', $product->id) }}">رؤية المزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

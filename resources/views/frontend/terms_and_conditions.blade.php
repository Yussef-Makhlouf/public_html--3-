@extends('frontend.master')

@section('header')
    <div class="header sub-page">
        <div class="nav-bar">
            <div class="logo-1">
                <a href="{{ route('index') }}"><img src="{{ asset('front/assets/images/Logo.svg') }}" alt="Mega - Logo"></a>
            </div>
            <nav>
                <ul class="navbar">
                    <li><a href="{{ route('index') }}" class="nav__link active">{{ trans('front/index.الرئيسية') }}</a></li>
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
                        <p class="nav__link dropdown 2">{{ trans('front/index.منتجاتنا') }}
                            <i class="fa-solid fa-angle-down"></i>
                        <ul class="submenu">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('product', $category->id) }}">{{ $category->trans_name }}</a>
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
        <img class="image-sub-page" src="{{ asset('front/assets/images/bg-about.png') }}">
        <h1 class="title-page"> {{ trans('front/index.البنود والاحكام') }} </h1>
    </div>
@endsection


@section('content')
    <section class="policy">
        <div class="container">
            <div class="content-policy">
                <h1>{{ trans('front/index.البنود والاحكام') }}</h1>
                <ul>
                    <li>
                        <p class="title">
                            1. {{ trans('front/index.usage') }}
                        </p>
                        <p>
                            {{ trans('front/index.usage_description') }}
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            2. {{ trans('front/index.intellectual_property') }}
                        </p>
                        <p>
                            {{ trans('front/index.intellectual_property_description') }}
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            3. {{ trans('front/index.reservations_payment') }}
                        </p>
                        <p>
                            {{ trans('front/index.reservations_payment_description') }}
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            4. {{ trans('front/index.cancellation_refund') }}
                        </p>
                        <p>
                            {{ trans('front/index.cancellation_refund_description') }}
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            5. {{ trans('front/index.liability') }}
                        </p>
                        <p>
                            {{ trans('front/index.liability_description') }}
                        </p>
                    </li>
                    <li>
                        <p class="title">
                            6. {{ trans('front/index.additional_terms') }}
                        </p>
                        <p>
                            {{ trans('front/index.additional_terms_description') }}
                        </p>
                    </li>
                    <li>
                        <p>
                            {{ trans('front/index.contact_us') }}
                        </p>
                    </li>

                </ul>
            </div>
        </div>
    </section>
@endsection

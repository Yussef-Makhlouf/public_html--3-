@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('frontend.master')
@section('title', 'من نحن')
@section('styles')
    <style>
        body {
            overflow-x: hidden;
        }

        /* .header.sub-page {*/
        /*    background-image: url({{ asset('front/assets/images/who-are-weee.png') }});*/
        /*    background-repeat: no-repeat;*/
        /*    background-size: cover;*/
            
        /*} */

        /* New sections styling */
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            color: #5b493a;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background: #5b493a;
            margin: 1rem auto;
        }

        .vision, .mission, .values {
            padding: 4rem 0;
            background: #fff;
        }

        .vision-content, .mission-content, .values-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            position: relative;
        }

        .vision-content p, .mission-content p, .values-content p {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #333;
            white-space: pre-line;
        }

        .section-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            display: block;
            opacity: 0.8;
        }

        .vision-icon {
            background: url('{{ asset("front/assets/images/effectiveness-icon.svg") }}') no-repeat center;
            background-size: contain;
        }

        .mission-icon {
            background: url('{{ asset("front/assets/images/Service.svg") }}') no-repeat center;
            background-size: contain;
        }

        .values-icon {
            background: url('{{ asset("front/assets/images/editorial-icon.svg") }}') no-repeat center;
            background-size: contain;
        }


        .about-us .about-img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* Add spacing between sections */
        .vision, .mission, .values {
            border-top: 1px solid #f0f0f0;
        }

        .vision:first-of-type {
            border-top: none;
        }


        /* Add subtle hover effects */
        .section-icon {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .section-icon:hover {
            transform: scale(1.1);
            opacity: 1;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2rem;
            }
            
            .vision-content p, .mission-content p, .values-content p {
                font-size: 1rem;
            }

            .section-icon {
                width: 60px;
                height: 60px;
            }
        }
    </style>
@endsection
@section('header')
    <div class="header sub-page">
        <div class="nav-bar">
            <div class="logo-1">
                <a href="{{ route('index') }}"><img src="{{ asset('front/assets/images/Logo.svg') }}" alt="Mega - Logo"></a>
            </div>
            <nav>
                <ul class="navbar">
                    <li><a href="{{ route('index') }}" class="nav__link ">{{ trans('front/index.الرئيسية') }}</a></li>
                    <li><a href="{{ route('about_us', '1') }}"
                            class="nav__link active">{{ trans('front/index.نبذة عنا') }}</a></li>
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
        <img class="image-sub-page" src="{{ Storage::url('bg-about.jpg') }}">
        <h1 class="title-page">{{ trans('front/index.نبذة عنا') }}</h1>
    </div>
    <!---------------- End Header ---------------->
@endsection

@section('content')
    @php
        $aboutUs = $about_us->where('id', '1')->first();
        $vision = $about_us->where('id', '2')->first();
        $mission = $about_us->where('id', '3')->first();
        $values = $about_us->where('id', '4')->first();
    @endphp
    <!---------------- Start About ---------------->
    @if($aboutUs)
    <section class="about-us">
        <div class="container">
            <div class="left">
                <h1 dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $aboutUs->trans_title }}</h1>
                <p dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $aboutUs->trans_content }}</p>
            </div>
            <div class="right">
                <img src="{{ asset('front/assets/images/Group.svg') }}" class="half">
                <img src="{{ asset('front/assets/images/who-are-we.png') }}" alt="about-mega" class="about-img">
            </div>
        </div>
    </section>
    @endif
    <!---------------- End About ---------------->

    <!---------------- Start Vision ---------------->
    @if($vision)
    <section class="vision">
        <div class="container">
            <div class="text-center">
                <div class="section-icon vision-icon"></div>
                <h1 class="section-title" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $vision->trans_title }}</h1>
                <div class="vision-content">
                    <p dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $vision->trans_content }}</p>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!---------------- End Vision ---------------->

    <!---------------- Start Mission ---------------->
    @if($mission)
    <section class="mission">
        <div class="container">
            <div class="text-center">
                <div class="section-icon mission-icon"></div>
                <h1 class="section-title" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $mission->trans_title }}</h1>
                <div class="mission-content">
                    <p dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $mission->trans_content }}</p>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!---------------- End Mission ---------------->

    <!---------------- Start Values ---------------->
    @if($values)
    <section class="values">
        <div class="container">
            <div class="text-center">
                <div class="section-icon values-icon"></div>
                <h1 class="section-title" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $values->trans_title }}</h1>
                <div class="values-content">
                    <p dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">{{ $values->trans_content }}</p>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!---------------- End Values ---------------->

@endsection

@section('scripts')
    <script src="{{ asset('front/assets/js/tabs.js') }}"></script>

@endsection

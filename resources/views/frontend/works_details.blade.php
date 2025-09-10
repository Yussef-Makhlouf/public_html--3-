@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('frontend.master')
@section('header')
    <div class="header sub-page">

        <div class="nav-bar">
            <div class="logo-1">
                <a href="{{ route('index') }}"><img src="{{ asset('front/assets/images/Logo.svg') }}" alt="Mega - Logo"></a>
            </div>
            <nav>
                <ul class="navbar">
                    <li><a href="{{ route('index') }}" class="nav__link ">{{ trans('front/index.الرئيسية') }}</a></li>
                    <li><a href="{{ route('about_us', '1') }}" class="nav__link">{{ trans('front/index.نبذة عنا') }}</a></li>
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
                            @foreach ($categories ?? [] as $category)
                                <li><a href="{{ route('product', $category->id) }}">{{ $category->trans_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        </p>
                    </li>
                    <li><a href="{{ route('projects') }}" class="nav__link active">{{ trans('front/index.أعمالنا') }}</a>
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
        <img class="image-sub-page" src="{{ asset('storage/works.jpeg') }}">
        <h1 class="title-page"> {{ $project->trans_title }}
        </h1>
    </div>
    {{-- <div class="h-bottom">
        <div class="container">
            <p>العميل : سيفا الجمعية الصيدلانية السعودية</p>
            <div class="date">
                <i class="fa-regular fa-calendar"></i>
                1/5/2023
            </div>
        </div>
    </div> --}}
@endsection
@section('content')
    <div class="about-work">
        <div class="container">
            <img src="{{ Storage::url('images/projects/' . $project->main_image) }}" alt="">
            <div class="text-about-work">
                <h2>
                    {{ $project->trans_title }}
                </h2>

                <p>
                    {{ $project->trans_description }}
                </p>
            </div>
        </div>
    </div>

    <!---------------- Start Works ---------------->
    <section class="works works-image">
        <div class="container">
            <h1>{{ trans('front/index.صور أخري من المشروع') }}</h1>
        </div>
        <div class="swiper work">
            <div class="swiper-wrapper">
                @foreach (json_decode($project->sub_images, true) ?? [] as $subImage)
                    <div class="swiper-slide slide-work">
                        <div class="work-card">
                            <img src="{{ Storage::url('images/projects/sub_images/' . $subImage) }}" alt="image">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!---------------- End Works ---------------->

    <!---------------- Start Works ---------------->
    {{-- <section class="works">
        <div class="container">
            <h1>{{ trans('front/index.المزيد من المشاريع') }}</h1>
        </div>
        <div class="swiper work">
            <div class="swiper-wrapper">
                @foreach ($anthorProjects ?? [] as $project)
                    <div class="swiper-slide slide-work">
                        <div class="work-card">
                            <img src="{{ Storage::url('images/projects/' . $project->main_image) }}" alt="image">
                            <div class="work-text">
                                <a href="{{ route('project_details', $project->id) }}">
                                    <h3> {{ $project->trans_title }} </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!---------------- End Works ---------------->
@endsection
@section('scipts')
    <script>
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
    </script>
@endsection

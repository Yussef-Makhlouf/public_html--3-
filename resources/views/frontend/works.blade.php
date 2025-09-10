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
        <h1 class="title-page">{{ trans('front/index.أعمالنا') }}</h1>
    </div>
@endsection


@section('content')
    <section class="works">
        <div class="container">
            <div class="text">
                <h1 class="title">
                    {{ trans('front/index.أعمالنا') }} </h1>
                <p class="description">
                    {{ trans('front/index.give_vision') }} </p>
            </div>
            <div class="page-work">
                @foreach ($projects as $project)
                    <div class="work">
                        <div class="work-card">
                            <img src="{{ Storage::url('images/projects/' . $project->main_image) }}" alt="image">
                            <div class="work-text">
                                <h3>{{ $project->trans_title }} </h3>
                                <div class="work-hover">
                                    <div class="te">
                                        <p> {{ Str::limit($project->trans_description, 15, '...') }} </p>
                                        <div class="date">
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $project->created_at }}
                                        </div>
                                    </div>
                                    <a
                                        href="{{ route('project_details', $project->id) }}">{{ trans('front/index.رؤيه المزيد') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection

@section('scripts')
    <script>
        var swiper = new Swiper(".success", {
            slidesPerView: 4,
            spaceBetween: 20,
            freeMode: true,
            pagination: {
                clickable: true,
            },
            autoplay: {
                delay: 1000,
                disableOnInteraction: false,
            },
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
    </script>
@endsection

@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('frontend.master')
@section('title')
    {{ $service->trans_title }}
@endsection
@section('styles')
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
                    <li><a href="{{ route('about_us', '1') }}" class="nav__link">{{ trans('front/index.نبذة عنا') }}</a>
                    </li>
                    <li>
                        <p class="nav__link dropdown 1 active">{{ trans('front/index.خدماتنا') }}
                            <i class="fa-solid fa-angle-down"></i>
                        <ul class="submenu">
                            @foreach ($services ?? [] as $servicee)
                                <li><a href="{{ route('service', $servicee->id) }}">{{ $servicee->trans_title }}</a>
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
        <img class="image-sub-page" src="{{ Storage::url('images/service/' . $service->main_image) }}">
        <h1 class="title-page"> {{ $service->trans_title }} </h1>
    </div>
@endsection


@section('content')
    <section class="sec-1">
        <div class="container">
            <div class="text">
                <p class="description">
                    {{ $service->trans_description }}
                </p>
            </div>
        </div>
    </section>

    <section class="works service">
        <div class="swiper work">
            <div class="swiper-wrapper">
                @foreach (json_decode($service->sub_images, true) ?? [] as $subImage)
                    <div class="swiper-slide slide-work">
                        <div class="work-card">
                            <img src="{{ Storage::url('images/sub_images_service/' . $subImage) }}" alt="image">
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <div class="container">
        <div class="text">
            <h1 class="title">{{ trans('front/index.فيديو الخدمة') }}</h1>
        </div>
        @if (Str::contains($service->videoType, 'upload'))
            <video width="100%" height="max-content" controls>
                <source src="{{ Storage::url('videos/service/' . $service->video) }}" type="video/mp4">
            </video>
        @else
            <iframe class="video" width="898" height="506" src="https://www.youtube.com/embed/{{ $service->video }}"
                frameborder="0" allowfullscreen></iframe>
        @endif
    </div>

    <div class="booking form-ser">
        <div class="container">
            <div class="form-booking">
                <h2>{{ trans('front/index.حجز الخدمه') }}</h2>
                <p>{{ trans('front/index.نسعي دائماً لتخليد ذكرى طيبه لديكم') }}</p>
                <livewire:front.contact.contacts-create>
            </div>
        </div>
    </div>
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

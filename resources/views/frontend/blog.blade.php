@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('frontend.master')
@section('page-title', 'المدونة')
@section('header')
    <div class="header sub-page">
        <div class="nav-bar">
            <div class="logo-1 ">
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
                    <li><a href="{{ route('blogger') }}" class="nav__link active">{{ trans('front/index.المدونة') }}</a>
                    </li>
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
        <img class="image-sub-page" src="{{ Storage::url('blog.jpg') }}">
        <h1 class="title-page"> {{ trans('front/index.المدونة') }} </h1>
    </div>
@endsection

@section('content')

    <!---------------- End Header ---------------->

    <div class="blog-content">
        <div class="container">
            <div class="side">
                <div class="side-content" style="padding-inline: 35px;">
                    <p class="side-title">
                        {{ trans('front/index.تدوينات تمت اضافتها مؤخراً') }}
                    </p>
                    <div class="blog-added ">
                        @foreach ($latestBlogs as $blog)
                            <div class="blog-card">
                                <img src="{{ Storage::url('images/blog/' . $blog->image) }}" alt="image">
                                <div class="blog-card-cont">
                                    <a href="{{ route('blog', $blog->id) }}">
                                        <p>{{ $blog->trans_name }}</p>
                                    </a>
                                    <div class="date">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $blog->date }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="side-content">
                    <p class="side-title">
                        {{ trans('front/index.الإشتراك في القائمة البريدية') }}
                    </p>
                    <form action="">
                        <input type="email" placeholder="exmple@example.com">
                        <input type="submit" value="{{ trans('front/index.اشتراك') }}">
                    </form>
                </div>
            </div>
            <div class="content-area">
                @foreach ($blogs as $blog)
                    <div class="blog-img">
                        <img src="{{ Storage::url('images/blog/' . $blog->image) }}" alt="image">
                        <div class="blog-des">
                            <div class="title-and-date">
                                <p> {{ $blog->trans_name }} </p>
                                <div class="date">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $blog->date }}
                                </div>
                            </div>
                            <p>
                                {{ Str::limit($blog->trans_content, 130, '...') }}

                            </p>
                            <a href="{{ route('blog', $blog->id) }}">{{ trans('front/index.رؤيه المزيد') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!---------------- End Tabs ---------------->

    <!---------------- Start Success Partners ---------------->
    <section class="success-partners">
        <div class="container">
            <div class="text">
                <h1 class="title">
                    {{ trans('front/index.شركاء النجاح') }}
                </h1>
                <p class="description">
                    {{ trans('front/index.نسعي دائماً لتخليد ذكرى طيبه لديكم') }}
                </p>
            </div>
        </div>
        <div class="swiper success">
            <div class="swiper-wrapper">
                @foreach ($our_clients as $client)
                    <div class="swiper-slide success-slide">
                        <img src="{{ Storage::url('images/ourClient/' . $client->image) }}" alt="">
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!---------------- End Success Partners ---------------->
@endsection

@section('scripts')
    <script src="{{ asset('front/assets/js/tabs.js') }}"></script>

@endsection

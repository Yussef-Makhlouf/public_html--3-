@extends('frontend.master')
@section('page-title', 'bolgs')
@section('header')
    <div class="header sub-page">
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
        <img class="image-sub-page" src="{{ asset('storage/blog.jpg') }}">
        <h1 class="title-page">{{ $blog->trans_name }} </h1>
    </div>
@endsection

@section('content')
    <div class="blog-content blog-de">
        <div class="container">
            <div class="side">
                <div class="side-content" style="padding-inline: 35px;">
                    <p class="side-title">
                        {{ trans('front/index.تدوينات تمت اضافتها مؤخراً') }}
                    </p>
                    <div class="blog-added ">
                        @foreach ($latestBlogs as $late_blog)
                            <div class="blog-card">
                                <img src="{{ asset('storage/images/blog/' . $late_blog->image) }}" alt="image">
                                <div class="blog-card-cont">
                                    <a href="{{ route('blog', $late_blog->id) }}">
                                        <p>{{ $late_blog->trans_name }}</p>
                                    </a>
                                    <div class="date">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $late_blog->date }}
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
                <div class="swiper blog-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide blog-img">
                            <img src="{{ asset('storage/images/blog/' . $blog->image) }}" alt="image">
                            <div class="blog-detail">
                                <div class="title-and-date">
                                    <p style="font-weight: bold">{{ $blog->trans_name }}</p>
                                    <div class="date">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $blog->date }}
                                    </div>
                                </div>
                                <p>
                                    {!! $blog->trans_content !!}
                                </p>
                            </div>
                        </div>   
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <div class="container more">
            <h1>{{ trans('front/index.المزيد من المشاريع') }}</h1>
            <div class="more-pro">
                @foreach ($anthorBlog as $blog)
                    <div class="blog-img">
                        <img src="{{ asset('storage/images/blog/' . $blog->image) }}" alt="image">
                        <div class="blog-des">
                            <div class="title-and-date">
                                <p>{{ $blog->trans_title }}</p>
                                <div class="date">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ $blog->date }}
                                </div>
                            </div>
                            <p>
                                {!! $blog->trans_content !!}
                            </p>
                            <a href="{{ route('blog', $blog->id) }}">{{ trans('front/index.رؤيه المزيد') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var swiper = new Swiper(".blog-slide", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            // mousewheel: true,
            // keyboard: true,
        });
    </script>
@endsection

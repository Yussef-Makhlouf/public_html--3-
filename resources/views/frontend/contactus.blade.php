@php
use Illuminate\Support\Facades\Storage;
@endphp

@extends('frontend.master')
@section('page-title', 'contacts')

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
                    <li><a href="{{ route('projects') }}" class="nav__link">{{ trans('front/index.أعمالنا') }}</a>
                    </li>
                    <li><a href="{{ route('clients') }}" class="nav__link">{{ trans('front/index.عملاؤنا') }}</a></li>
                    <li><a href="{{ route('booking') }}" class="nav__link">{{ trans('front/index.الحجز') }}</a></li>
                    <li><a href="{{ route('blogger') }}" class="nav__link">{{ trans('front/index.المدونة') }}</a></li>
                    <li><a href="{{ route('contact_us') }}" class="nav__link active"> {{ trans('front/index.اتصل بنا') }}
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
        <img class="image-sub-page" src="{{ Storage::url('contact-us.jpg') }}">
        <h1 class="title-page"> {{ trans('front/index.تواصل معنا') }}</h1>
    </div>
@endsection

@section('content')
    <!---------------- Start Type Contact ---------------->
    <section class="sec-content">
        <div class="container">
            <div class="text">
                <h1 class="title">{{ trans('front/index.تواصل معنا') }}</h1>
                <p class="description">
                    {{ trans('front/index.be_near') }}
                </p>
            </div>
            <div class="content">
                <div class="cont-box">
                    <div class="img">
                        <img src="{{ asset('front/assets/images/Phone-black.svg') }}" alt="">
                    </div>
                    <p class="tit">{{ trans('front/index.الهاتف') }}</p>
                    <a href="tel: 0576078079">0576078079</a>
                </div>
                <div class="cont-box">
                    <div class="img">
                        <img src="{{ asset('front/assets/images/whatsapp.svg') }}" alt="">
                    </div>
                    <p class="tit">{{ trans('front/index.واتساب') }}</p>
                    <a href="tel: 0576078079">966500698668</a>
                </div>
                <div class="cont-box">
                    <div class="img">
                        <img src="{{ asset('front/assets/images/Email-white.svg') }}" alt="">
                    </div>
                    <p class="tit"> {{ trans('front/index.البريد الالكتروني') }} </p>
                    <a href="mailto: info@digitaleventspro.com">info@digitaleventspro.com</a>
                </div>
            </div>
        </div>
    </section>
    <!---------------- End Type Contact ---------------->

    <section class="type-contact">
        <div class="container">
            <div class="text">
                <h1 class="title"> {{ trans('front/index.نوع التواصل') }} </h1>
                <p class="description">
                    {{ trans('front/index.Contact_us_now') }}
                </p>
            </div>
            <div class="content">
                <div class="type active">
                    <img src="{{ asset('front/assets/images/Service.svg') }}" alt="">
                    <p>{{ trans('front/index.حجز') }}</p>
                </div>
                <div class="type">
                    <img src="{{ asset('front/assets/images/Chat.svg') }}" alt="">
                    <p>{{ trans('front/index.إستشارة') }}</p>
                </div>
                <div class="type">
                    <img src="{{ asset('front/assets/images/Feedback.svg') }}" alt="">
                    <p>{{ trans('front/index.تواصل مباشر') }}</p>
                </div>
                <div class="type">
                    <img src="{{ asset('front/assets/images/share session.svg') }}" alt="">
                    <p>{{ trans('front/index.رفع تذكرة') }}</p>
                </div>
            </div>
            <div class="form-contact">
                <livewire:front.contact.contacts-create>
            </div>
        </div>
    </section>
@endsection

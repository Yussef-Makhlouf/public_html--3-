@extends('cms.master')
@section('title', 'الخدمة')

@section('tittle_1', ' تعديل الخدمة ')
@section('tittle_2', ' تعديل الخدمة ')


@section('styles')
    <style>
        .color {
            color: #fff;
            margin-inline: 15px;
            width: 35px;
        }

        .img-thumbnail {
            width: 100px !important;
            height: 100px !important;
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>
@endsection


@section('content')

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"> تعديل الخدمة </h5>
        </div>

        <div class="card-body">
            <livewire:services-edit :service="$service" />
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>

@endsection

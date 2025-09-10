@extends('cms.master')
@section('title', 'حولنا')

@section('tittle_1', ' تعديل حولنا ')
@section('tittle_2', ' تعديل حولنا ')


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
            <h5 class="mb-0"> تعديل حولنا </h5>
        </div>

        <div class="card-body">
            <livewire:about-us.about-us-edit :about-us="$aboutUs" />
        </div>
    </div>

@endsection

@section('scripts')

@endsection

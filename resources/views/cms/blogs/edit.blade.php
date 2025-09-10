@extends('cms.master')
@section('title', 'التدوينة')

@section('tittle_1', ' تعديل التدوينة ')
@section('tittle_2', ' تعديل التدوينة ')


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
            <h5 class="mb-0"> تعديل التدوينة </h5>
        </div>

        <div class="card-body">
            <livewire:blogs.blogs-edit :blog="$blog" />
        </div>
    </div>

@endsection

@section('scripts')

@endsection

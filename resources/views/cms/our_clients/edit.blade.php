@extends('cms.master')
@section('title', 'العميل')

@section('tittle_1', ' تعديل العميل ')
@section('tittle_2', ' تعديل العميل ')


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
            <h5 class="mb-0"> تعديل العميل </h5>
        </div>

        <div class="card-body">
            <livewire:our-clients.our-clients-edit :ourClient="$ourClient" />
        </div>
    </div>

@endsection

@section('scripts')

@endsection

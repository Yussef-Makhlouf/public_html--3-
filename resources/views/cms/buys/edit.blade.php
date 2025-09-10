@extends('cms.master')
@section('title', 'الشراء')

@section('tittle_1', ' تعديل الشراء ')
@section('tittle_2', ' تعديل الشراء ')


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
            <h5 class="mb-0"> تعديل الشراء </h5>
        </div>

        <div class="card-body">
            <livewire:buys.buys-edit :buy="$buy" />
        </div>
    </div>

@endsection

@section('scripts')

@endsection

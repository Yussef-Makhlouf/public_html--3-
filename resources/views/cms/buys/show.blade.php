@extends('cms.master')
@section('title', 'الشراء')

@section('tittle_1', ' عرض الشراء ')
@section('tittle_2', ' عرض الشراء ')


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
            <h5 class="mb-0"> عرض الشراء </h5>
        </div>

        <div class="card-body">
            <livewire:buys.buys-show :buy="$buy" />
        </div>
    </div>

@endsection

@section('scripts')

@endsection

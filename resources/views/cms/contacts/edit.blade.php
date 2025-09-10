@extends('cms.master')
@section('title', 'الاتصال')

@section('tittle_1', ' تعديل الاتصال ')
@section('tittle_2', ' تعديل الاتصال ')


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
            <h5 class="mb-0"> تعديل الاتصال </h5>
        </div>

        <div class="card-body">
            <livewire:contacts.contacts-edit :contact="$contact" />
        </div>
    </div>

@endsection

@section('scripts')

@endsection

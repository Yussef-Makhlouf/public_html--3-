@extends('cms.master')
@section('title', 'العرض التقديمي')

@section('tittle_1', ' تعديل العرض التقديمي ')
@section('tittle_2', ' تعديل العرض التقديمي ')


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
            <h5 class="mb-0"> تعديل العرض التقديمي </h5>
        </div>

        <div class="card-body">
            <livewire:pdfs.pdfs-edit :pdf="$pdf" />
        </div>
    </div>

@endsection

@section('scripts')

@endsection

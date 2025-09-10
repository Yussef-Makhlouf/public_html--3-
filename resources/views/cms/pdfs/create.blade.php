@extends('cms.master')
@section('title', 'العروض التقديمية')

@section('tittle_1', ' اضافة عرض تقديمي ')
@section('tittle_2', ' اضافة عرض تقديمي ')


@section('styles')
    <style>
        .color {
            color: #fff;
            margin-inline: 15px;
            width: 35px;
        }
    </style>
@endsection


@section('content')

    <!-- Basic datatable -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">اضافة عرض تقديمي</h5>
        </div>

        <div class="card-body">
            <livewire:pdfs.pdfs-create />
        </div>
    </div>


@endsection






@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
@endsection

@extends('cms.master')
@section('title', 'التدوينات')

@section('tittle_1', ' اضافة تدوينة ')
@section('tittle_2', ' اضافة تدوينة ')


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
            <h5 class="mb-0">اضافة تدوينة</h5>
        </div>

        <div class="card-body">
            <livewire:blogs.blogs-create />
        </div>
    </div>


@endsection






@section('scripts')
    <script src="{{ asset('cms/assets/js/vendor/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('cms/assets/demo/pages/form_select2.js') }}"></script>
@endsection

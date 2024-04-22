@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.css') }}">
@endsection

@section('content')
    <div class="card card-primary card-outline card-outline-tabs col-sm-12">
        <div class="row">
            <div class="card-body col-12">
                @if (request()->segment(3) == 'show')
                    @include('management-app.scheduler.content.detail')
                @else
                    @include('management-app.scheduler.content.list')
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/libs/datatables/datatables.js') }}"></script>
    <script src="{{ asset('js/tables_datatables.js') }}"></script>
    <script src="{{ asset('vendor/libs/bootbox/bootbox.js') }}"></script>
    <script src="{{ asset('vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.js') }}"></script>
    <script src="{{ asset('js/ui_modals.js') }}"></script>
@endsection

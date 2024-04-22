@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables/datatables.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/libs/smartwizard/smartwizard.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css')}}">
@endsection

@section('content')
<div class="card card-primary card-outline card-outline-tabs col-sm-12">
    <div class="row">
      <div class="card-body col-12">
            @if(request()->segment(3) == 'show')
                @include('pbb.daftar-tpbb.content.detail')
            @else
                @include('pbb.registrasi-tpbb.content.registrasi')
            @endif
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('vendor/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{ asset('vendor/libs/datatables/datatables.js')}}"></script>
<script src="{{ asset('js/tables_datatables.js')}}"></script>
<script src="{{ asset('vendor/libs/bootbox/bootbox.js')}}"></script>
<script src="{{ asset('vendor/libs/bootstrap-sweetalert/bootstrap-sweetalert.js')}}"></script>
<script src="{{ asset('vendor/libs/smartwizard/smartwizard.js')}}"></script>
<script src="{{ asset('vendor/libs/validate/validate.js')}}"></script>
<script src="{{ asset('vendor/libs/moment/moment.js')}}"></script>
<script src="{{ asset('js/ui_modals.js')}}"></script>
<script src="{{ asset('js/forms_pickers.js')}}"></script>
<script src="{{ asset('js/forms_wizard.js')}}"></script>
@endsection

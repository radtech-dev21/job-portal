<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/custom/auth.js') }}"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
@extends('layouts.app')
@section('content')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <h3  class="register-heading">Add Your Skills</h3>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>
@endsection
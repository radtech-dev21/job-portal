@extends('layouts.app')
@section('content')
<div class="container">
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-6">

            @if (Auth::user()->email_is_verified ==0)
            <div class="card">
                <div class="card-header">{{ __('Verify Email') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('verifications')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">{{ __('E-Mail:-') }}</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('OTP') is-invalid @enderror" name="emailOtp"  required autofocus>
                                @error('OTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">{{ __('Verify') }}</button>
                                <!-- <a type="submit" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">{{ __('Verify') }}</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Verify Phone No.') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('verifications')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">{{ __('Phone No:-') }}</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->phone_no}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('OTP') is-invalid @enderror" name="phoneOtp"  required autofocus>
                                @error('OTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">{{ __('Verify') }}</button>
                                <!-- <a type="submit" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">{{ __('Verify') }}</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/custom/custom.js') }}"></script>
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<!------ Include the above in your HEAD tag -------- -->
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
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="save_hirer" method="POST">
                        @csrf
                        <h3  class="register-heading">Apply as a Hirer</h3>
                        <div class="row register-form">
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                Session::forget('success');
                                @endphp
                            </div>
                            @endif
                            <div class="col-md-12">
                                <h5>Job Details</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Position *" value="{{old('position')}}" name="position" />
                                    @if ($errors->has('position'))
                                    <span class="text-danger">{{ $errors->first('position') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div id="sinolo" class="form-control">
                                        <button type="button" id="dec" class="btn btn-info pull-left">-</button>
                                        <input type="text" id="experience" name="experience" placeholder="Experience(in years) *" value="{{old('experience')}}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <button type="button" id="inc" class="btn btn-info pull-right">+</button>
                                    </div>

                                    @if ($errors->has('experience'))
                                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select multiple name="location[]" id="location" class="{{ $errors->has('location') ? ' is-invalid' : '' }} selectpicker w-100" data-style="bg-white px-4 py-3 shadow-sm " title="Select Location *">
                                        <option value="Pune" <?php echo (old('location') && in_array('Pune', old('location'))) ? "selected" : "" ?>>Pune</option>
                                        <option value="Mumbai" <?php echo (old('location') && in_array('Mumbai', old('location'))) ? "selected" : "" ?>>Mumbai</option>
                                        <option value="Chennai" <?php echo (old('location') && in_array('Chennai', old('location'))) ? "selected" : "" ?>>Chennai</option>
                                        <option value="Bangalore" <?php echo (old('location') && in_array('Bangalore', old('location'))) ? "selected" : "" ?>>Bangalore</option>
                                        <option value="Gurgaon" <?php echo (old('location') && in_array('Gurgaon', old('location'))) ? "selected" : "" ?>>Gurgaon</option>
                                        <option value="Ahmedabad" <?php echo (old('location') && in_array('Ahmedabad', old('location'))) ? "selected" : "" ?>>Ahmedabad</option>
                                    </select>
                                    @if ($errors->has('location'))
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select multiple name="skills[]" id="skills" class="{{ $errors->has('skills') ? ' is-invalid' : '' }} selectpicker w-100" data-style="bg-white px-4 py-3 shadow-sm " title="Select Skills *">
                                        <option value="PHP" <?php echo (old('skills') && in_array('PHP', old('skills'))) ? "selected" : "" ?>>PHP</option>
                                        <option value="JQuery" <?php echo (old('skills') && in_array('JQuery', old('skills'))) ? "selected" : "" ?>>JQuery</option>
                                        <option value="Javascript" <?php echo (old('skills') && in_array('Javascript', old('skills'))) ? "selected" : "" ?>>Javascript</option>
                                        <option value="Ajax" <?php echo (old('skills') && in_array('Ajax', old('skills'))) ? "selected" : "" ?>>Ajax</option>
                                        <option value="HTML" <?php echo (old('skills') && in_array('HTML', old('skills'))) ? "selected" : "" ?>>HTML</option>
                                        <option value="CSS" <?php echo (old('skills') && in_array('CSS', old('skills'))) ? "selected" : "" ?>>CSS</option>
                                    </select>
                                    @if ($errors->has('skills'))
                                    <span class="text-danger">{{ $errors->first('skills') }}</span>
                                    @endif
                                </div>
                                <input type="submit" class="btnRegister"  value="Apply"/>
                            </div>
                        </div>
                    </form>
                </div>
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
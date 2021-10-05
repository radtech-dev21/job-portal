<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" id="bootstrap-css">
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
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="save_employee" method="POST">
                        <input type="hidden" name="user_id" value="{{  !empty($employeeDetails['id']) ? $employeeDetails['id'] : 0 }}">
                        @csrf
                        <h3  class="register-heading">Looking</h3>
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
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name *" value="{{ !empty($employeeDetails['name']) ? $employeeDetails['name'] : old('name') }}" name="name" />
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                @php 
                                $values = array();
                                @endphp 
                                @if(!empty($employeeDetails['skills']))
                                @php
                                $values = explode(",",$employeeDetails['skills']);
                                @endphp
                                @endif
                                <div class="form-group">
                                    <select multiple name="skills[]" id="skills" class="{{ $errors->has('skills') ? ' is-invalid' : '' }} selectpicker w-100" data-style="bg-white px-4 py-3 shadow-sm " title="Select Skills *">
                                        <option value="PHP" <?php echo (in_array('PHP', $values) || (old('skills') && in_array('PHP', old('skills')))) ? "selected" : ""; ?>  >Php</option>
                                        <option value="JQuery" <?php echo (old('skills') && in_array('JQuery', old('skills'))) ? "selected" : "" ?>>JQuery</option>
                                        <option value="Javascript" <?php echo (in_array('Javascript', $values) || (old('skills') && in_array('Javascript', old('skills')))) ? "selected" : ""; ?>>Javascript</option>
                                        <option value="HTML" <?php echo (in_array('HTML', $values) || (old('skills') && in_array('HTML', old('skills')))) ? "selected" : ""; ?>>HTML</option>
                                        <option value="CSS" <?php echo (in_array('CSS', $values) || (old('skills') && in_array('CSS', old('skills')))) ? "selected" : ""; ?>>CSS</option>
                                        <option value="Laravel" <?php echo (in_array('Laravel', $values) || (old('skills') && in_array('Laravel', old('skills')))) ? "selected" : ""; ?>>Laravel</option>
                                        <option value="Vue Js" <?php echo (in_array('Vue Js', $values) || (old('skills') && in_array('Vue Js', old('skills')))) ? "selected" : ""; ?>>Vue Js</option>
                                        <option value="Mongo DB" <?php echo (in_array('Mongo DB', $values) || (old('skills') && in_array('Mongo DB', old('skills')))) ? "selected" : ""; ?>>Mongo DB</option>
                                        <option value="MySQL" <?php echo (in_array('MySQL', $values) || (old('skills') && in_array('MySQL', old('skills')))) ? "selected" : ""; ?>>MySQL</option>
                                        <option value="Firebase" <?php echo (in_array('Firebase', $values) || (old('skills') && in_array('Firebase', old('skills')))) ? "selected" : ""; ?>>Firebase</option>
                                        <option value="Networking" <?php echo (in_array('Networking', $values) || (old('skills') && in_array('Networking', old('skills')))) ? "selected" : ""; ?>>Networking</option>
                                        <option value="Shopify" <?php echo (in_array('Shopify', $values) || (old('skills') && in_array('Shopify', old('skills')))) ? "selected" : ""; ?>>Shopify</option>
                                        <option value="Wordpress" <?php echo (in_array('Wordpress', $values) || (old('skills') && in_array('Wordpress', old('skills')))) ? "selected" : ""; ?>>Wordpress</option>
                                        <option value="Codeigniter" <?php echo (in_array('Codeigniter', $values) || (old('skills') && in_array('Codeigniter', old('skills')))) ? "selected" : ""; ?>>Codeigniter</option>
                                    </select>
                                    @if ($errors->has('skills'))
                                    <span class="text-danger">{{ $errors->first('skills') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div id="sinolo" class="form-control">
                                        <button type="button" id="dec" class="btn btn-info pull-left">-</button>
                                        <input type="text" id="experience" name="experience" placeholder="Experience(in years) *" value="{{ !empty($employeeDetails['experience']) ? $employeeDetails['experience'] : old('experience') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <button type="button" id="inc" class="btn btn-info pull-right">+</button>
                                    </div>
                                    @if ($errors->has('experience'))
                                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @php 
                                    $values = array();
                                    @endphp 

                                    @if(!empty($employeeDetails['locations']))
                                    @php
                                    $values = json_decode($employeeDetails['locations']);
                                    @endphp
                                    @endif
                                    <select multiple name="locations[]" id="locations" class="{{ $errors->has('locations') ? ' is-invalid' : '' }} selectpicker w-100" data-style="bg-white px-4 py-3 shadow-sm " title="Select Locations *">
                                        <option value="Pune" <?php echo (in_array('Pune', $values) || (old('locations') && in_array('Pune', old('locations')))) ? "selected" : ""; ?>>Pune</option>
                                        <option value="Mumbai" <?php echo (in_array('Mumbai', $values) || (old('locations') && in_array('Mumbai', old('locations')))) ? "selected" : ""; ?>>Mumbai</option>
                                        <option value="Chennai" <?php echo (in_array('Chennai', $values) || (old('locations') && in_array('Chennai', old('locations')))) ? "selected" : ""; ?>>Chennai</option>
                                        <option value="Bangalore" <?php echo (in_array('Bangalore', $values) || (old('locations') && in_array('Bangalore', old('locations')))) ? "selected" : ""; ?>>Bangalore</option>
                                        <option value="Gurgaon" <?php echo (in_array('Gurgaon', $values) || (old('locations') && in_array('Gurgaon', old('locations')))) ? "selected" : ""; ?>>Gurgaon</option>
                                        <option value="Ahmedabad" <?php echo (in_array('Ahmedabad', $values) || (old('locations') && in_array('Ahmedabad', old('locations')))) ? "selected" : ""; ?>>Ahmedabad</option>
                                        <option value="Hyderabad" <?php echo (in_array('Hyderabad', $values) || (old('locations') && in_array('Hyderabad', old('locations')))) ? "selected" : ""; ?>>Hyderabad</option>
                                        <option value="Noida" <?php echo (in_array('Noida', $values) || (old('locations') && in_array('Noida', old('locations')))) ? "selected" : ""; ?>>Noida</option>
                                        <option value="Trichy" <?php echo (in_array('Trichy', $values) || (old('locations') && in_array('Trichy', old('locations')))) ? "selected" : ""; ?>>Trichy</option>
                                        <option value="Sikkim" <?php echo (in_array('Sikkim', $values) || (old('locations') && in_array('Sikkim', old('locations')))) ? "selected" : ""; ?>>Sikkim</option>
                                        <option value="West Bengal" <?php echo (in_array('West Bengal', $values) || (old('locations') && in_array('West Bengal', old('locations')))) ? "selected" : ""; ?>>West Bengal</option>
                                        <option value="Chandigarh" <?php echo (in_array('Chandigarh', $values) || (old('locations') && in_array('Chandigarh', old('locations')))) ? "selected" : ""; ?>>Chandigarh</option>
                                    </select>
                                    @if ($errors->has('locations'))
                                    <span class="text-danger">{{ $errors->first('locations') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Current CTC *" value="{{ !empty($employeeDetails['current_ctc']) ? $employeeDetails['current_ctc'] : old('current_ctc') }}" name="current_ctc" />
                                    @if ($errors->has('current_ctc'))
                                    <span class="text-danger">{{ $errors->first('current_ctc') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Expected CTC *" value="{{ !empty($employeeDetails['expected_ctc']) ? $employeeDetails['expected_ctc'] : old('expected_ctc') }}" name="expected_ctc" />
                                    @if ($errors->has('expected_ctc'))
                                    <span class="text-danger">{{ $errors->first('expected_ctc') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="notice_period">
                                        <option value="">Select Notice Period In Months</option>
                                        <option value="1" <?php echo ((!empty($employeeDetails['notice_period']) && ($employeeDetails['notice_period'] == 1)) || (old('notice_period') && (old('notice_period') == 1))) ? "selected" : ""; ?> >1 Month</option>
                                        <option value="2" <?php echo ((!empty($employeeDetails['notice_period']) && ($employeeDetails['notice_period'] == 2)) || (old('notice_period') && (old('notice_period') == 2))) ? "selected" : ""; ?>>2 Months</option>
                                        <option value="3" <?php echo ((!empty($employeeDetails['notice_period']) && ($employeeDetails['notice_period'] == 3)) || (old('notice_period') && (old('notice_period') == 3))) ? "selected" : ""; ?> >3 Months</option>
                                        <option value="4" <?php echo ((!empty($employeeDetails['notice_period']) && ($employeeDetails['notice_period'] == 4)) || (old('notice_period') && (old('notice_period') == 4))) ? "selected" : ""; ?>>4 Months</option>
                                    </select>
                                    @if ($errors->has('notice_period'))
                                    <span class="text-danger">{{ $errors->first('notice_period') }}</span>
                                    @endif
                                </div>
                                <a href="{{ url('employee') }}" class="btn btn-primary btnRegister" tabindex="-1" role="button">{{ __('Back') }}</a>
                                <input type="submit" class="btnRegister"  value="Apply"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/custom/auth.js') }}"></script>
<script>
    $(function () {
        $('.selectpicker').selectpicker();
    });
</script>
@endsection
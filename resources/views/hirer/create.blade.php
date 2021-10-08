@extends('layouts.app')
@section('content')
<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" id="bootstrap-css">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Welcome</h3>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <form action="{{ route('save-company') }}" method="POST">
                     	<input type="hidden" name="company_id" value="{{  !empty($companyDetails['id']) ? $companyDetails['id'] : 0 }}">
                        @csrf
                        <h3  class="register-heading">Company</h3>
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
                                    <input type="text" class="form-control" placeholder="Name *" value="{{ !empty($companyDetails['name']) ? $companyDetails['name'] : old('name') }}" name="name" />
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email *" value="{{ !empty($companyDetails['email']) ? $companyDetails['email'] : old('email') }}" name="email" />
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Address *" value="" name="address" >{{ !empty($companyDetails['address']) ? $companyDetails['address'] : old('address') }}</textarea>
                                    @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Contact Number *" value="{{ !empty($companyDetails['contact_no']) ? $companyDetails['contact_no'] : old('contact_no') }}" name="contact_no" />
                                    @if ($errors->has('contact_no'))
                                    <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Number Of Employees *" value="{{ !empty($companyDetails['no_of_employees']) ? $companyDetails['no_of_employees'] : old('no_of_employees') }}" name="no_of_employees" />
                                    @if ($errors->has('no_of_employees'))
                                    <span class="text-danger">{{ $errors->first('no_of_employees') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    @php 
                                    $values = array();
                                    @endphp 

                                    @if(!empty($companyDetails['locations']))
                                    @php
                                    $values = json_decode($companyDetails['locations']);
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
                                <a href="#" class="btn btn-primary btnRegister" tabindex="-1" role="button">{{ __('Back') }}</a>
                                <input type="submit" class="btnRegister"  value="Apply"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

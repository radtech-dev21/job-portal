<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<div class="page-content container page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="{{ asset('img/iam_employer.png') }}" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{ $details->name ? $details->name : 'Unknown' }}</h6>
                                <!-- <p>Web Designer</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i> -->
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ $details->email ? $details->email : '' }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">{{ $details->phone_no ? $details->phone_no : '' }}</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Skills</h6>
                                <div class="row">
                                	<div class="col-sm-12">
                                        <p class="m-b-10 f-w-600"></p>
                                        <h6 class="text-muted f-w-400">{{ $details->skills ? $details->skills : '' }}</h6>
                                    </div>
                                </div>

                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Experience</h6>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="m-b-10 f-w-600"></p>
                                        <h6 class="text-muted f-w-400">{{ $details->experience ? $details->experience.' yr(s)' : '' }}</h6>
                                    </div>
                                </div>
                            	
                            	<h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Notice Period</h6>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="m-b-10 f-w-600"></p>
                                        <h6 class="text-muted f-w-400">{{ $details->notice_period ? $details->notice_period.' mo(s)' : '' }}</h6>
                                    </div>
                                </div>

                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">CTC</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Current CTC</p>
                                        <h6 class="text-muted f-w-400">{{ $details->current_ctc ? number_format($details->current_ctc) : '' }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Expected CTC</p>
                                        <h6 class="text-muted f-w-400">{{ $details->expected_ctc ? number_format($details->expected_ctc) : '' }}</h6>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
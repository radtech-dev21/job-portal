@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active request-tabs" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="true">Pending Approval</button>
        <button class="nav-link request-tabs" id="nav-accept-tab" data-bs-toggle="tab" data-bs-target="#nav-accept" type="button" role="tab" aria-controls="nav-accept" aria-selected="false">Accepted Requests</button>
        <button class="nav-link request-tabs" id="nav-reject-tab" data-bs-toggle="tab" data-bs-target="#nav-reject" type="button" role="tab" aria-controls="nav-reject" aria-selected="false">Declined Requests</button>
        <button class="nav-link request-tabs" id="nav-block-tab" data-bs-toggle="tab" data-bs-target="#nav-block" type="button" role="tab" aria-controls="nav-block" aria-selected="false">Blocked Requests</button>
    </div>
</nav>
<div class="tab-content" id="connection-tabs">
    <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
        @if(sizeof($hirerDetails))
            @foreach ($hirerDetails as $hirer)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <img src="{{ asset('img/user.png') }}">
                            {{ $hirer->name }}
                        </div>
                        <div class="col-sm conn-btn" data-hirer_id="{{ $hirer->id }}" data-hirer_name="{{ $hirer->name }}">
                            <button type="button" class="btn btn-primary connection-request" data-request="accept">Accept</button>
                            <button type="button" class="btn btn-danger connection-request" data-request="reject">Reject</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="alert alert-danger">No Data Found</div>
        @endif
    </div>
    <div class="tab-pane fade" id="nav-accept" role="tabpanel" aria-labelledby="nav-accept-tab">
        <div class="alert alert-danger">No Data Found</div>
    </div>
    <div class="tab-pane fade" id="nav-reject" role="tabpanel" aria-labelledby="nav-reject-tab">
        <div class="alert alert-danger">No Data Found</div>
    </div>
     <div class="tab-pane fade" id="nav-block" role="tabpanel" aria-labelledby="nav-block-tab">
        <div class="alert alert-danger">No Data Found</div>
    </div>

    <div class="modal fade" id="blockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Reason For Blocking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-1 form-group">
                            To: 
                        </div>
                        <div class="col-sm-4 form-group">
                            <label class="hirer-name"></label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-group">Message</label>
                        <textarea class="mail-content form-group" id="mail_text" name="mail_text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary send-mail">Send Mail</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/custom/hirer.js') }}"></script>
@endsection

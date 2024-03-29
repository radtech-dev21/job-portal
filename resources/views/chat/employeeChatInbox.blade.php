<link href="{{ asset('css/chat.css') }}" rel="stylesheet" id="bootstrap-css">
<body>
@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class=" text-center">Messaging</h3>
    <a class="back-icon" href="{{ url('employee') }}" data-toggle="tooltip" data-placement="top" title="Back"><i class="fas fa-arrow-left"></i></a>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Inbox</h4>
                    </div>
                    <div class="srch_bar">
                        <div class="stylish-input-group">
                            <input type="text" class="search-bar" placeholder="Search">
                            <span class="input-group-addon">
                                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="inbox_chat" style="cursor: pointer;">
                    @forelse($users_list as $k => $user_list)
                        <div class="chat_list {{$k == 0 ? 'active_chat' : ''}}">
                            <div class="chat_people">
                                <div class="chat_img"> 
                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> 
                                </div>
                                <div class="chat_ib">
                                    <h5>{{$user_list->name}} <span class="chat_date">Dec 25</span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"> 
                            <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>Test which is a new approach to have all
                                    solutions</p>
                                <span class="time_date"> 11:01 AM | June 9</span>
                            </div>
                        </div>
                    </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Test which is a new approach to have all
                                solutions</p>
                            <span class="time_date"> 11:01 AM | June 9</span>
                        </div>
                    </div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message" />
                        <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
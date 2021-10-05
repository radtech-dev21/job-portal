
<link href="{{ asset('css/chat.css') }}" rel="stylesheet" id="bootstrap-css">
<html>
<head>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" type="text/css" rel="stylesheet">

</head>

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
                        @foreach ($hirer_data as $hirer)
                        <a href="">
                        <div class="chat_list">
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="user"> </div>
                                <div class="chat_ib">
                                    <h5>{{ $hirer['name'] }}<span class="chat_date"></span></h5>
                                    <p>Test, which is a new approach to have all solutions
                                        astrology under one roof.</p>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history">
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" id="msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="button" onclick="displayEnteredText()"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function displayEnteredText() {
        var inputText = document.getElementById("msg");
        alert(inputText.value);
      }
    </script>
</body>
</html>
@endsection
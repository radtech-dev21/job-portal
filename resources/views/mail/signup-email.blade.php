Hello {{$email_data['name']}}
<br><br>
Welcome to my Website!
<br>
Please click the below link to verify your email and activate your account!
<h1>{{$email_data['verification_code']}}</h1>
<br><br>
<a href="/verify?code={{$email_data['verification_code']}}">Click Here!</a>

<br><br>
Thank you!
<br>
{{-- <h2>Forgot Password</h2>
<h3>Hello, User</h3>
{{-- <h4>This is your one time token to reset your password</h4><br>Please click on the below button to reset it. --}}

{{-- <h4>Below is your password for the {{ $data1['email'] }} of our website Red Ronin, <br>
Do not share with anyone</h4>

<h4 >{{ $data1['token'] }}</h4>
<a href="{{ URL::to('/') }}/activate_user/{{ $data1['token'] }}"><button style="align-self: center;background:rgb(0, 183, 255)">Activate</button></a> --}} 

Hello Mr/Ms. {{ $data3['name'] }}

You have requested for a Password reset link, so below is the link to reset your password.
is given below.
<br>

Link::http://127.0.0.1:8000/verify_forget_pwd_otp/{{ $data3['email'] }}/{{ $data3['token'] }}

OTP for password reset is {{ $data3['otp'] }}

This is the password reset link for your account with Red Ronin

The link is valid for 30 minutes. Please use forgot password facility again if the link has
expired
<h2>Account Activation Link</h2>
<h3>Hello, {{ $data1['name'] }}</h3>
<h4>You have successfully registered in our website Red Ronin please click the given button to activate your account.</h4><br>

<a href="{{ URL::to('/') }}/activate_user/{{ $data1['email'] }}"><button style="align-self: center;background:rgb(0, 183, 255)">Activate</button></a>
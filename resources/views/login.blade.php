@extends('master_view')
@section('content')
<head>
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<section class="img-fluid" style="background-size:cover; justify-content:center;background-image:url('Images/night.png');">


    <div class="container py-5 h-100 login">
      <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-10 col-lg-7 col-xl-5">
          <div class="card shadow-2-strong card-registration">
            <div class="row justify-content-center align-items-center h-50">
              <div class="col-12 col-lg-12 col-xl-12">
                        
              </div>
            </div>
            <div class="card-body p-4 p-md-5" >
         
              
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="color:white;">Login Form</h3>

              
              @if(Session::has('login_err'))

              <div class="alert alert-danger text-red" role="alert">{{ Session::get('login_err') }}</div>

              @endif

              @if(Session::has('succ'))

              <div class="alert alert-success " role="alert">{{ Session::get('succ') }}</div>

              @endif
              <form action="{{URL::to('/')}}/login_action" method="POST">
                @csrf
            
                <div class="row">
                  <div class="col-md-12 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="emailAddress" value="{{ old('email') }}" class="form-control form-control-lg" name="email"/>
                      <label class="form-label" for="emailAddress">Email</label>
                    </div>
                    <span class="error">
                      @error('email')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="col-md-12 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="password" id="password" class="form-control form-control-lg" name="pwd" />
                      <label class="form-label" for="phoneNumber">Password</label>
                    </div>
                    <span class="error">
                      @error('pwd')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>

                 
                </div>
  

  
                
                <div class="mt-4 pt-2 bottom-control" >
                  
                  <a href="{{ URL::to('/') }}/register" id="show_register" role="button">Sign Up</a>
                  <input class="btn btn-primary btn-lg" id="submit_btn" type="submit" value="Submit"  />
                  
                  <a href="{{ URL::to('/') }}/forget_password_form" role="button">Forgot Password?</a>
                    
                </div>
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    {{-- --------------------------------------------------------------------------------------------------------------------------------------------- --}}

    <div class="container py-5 h-100 forgot">
      <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-10 col-lg-7 col-xl-5">
          <div class="card shadow-2-strong card-registration">
            <div class="row justify-content-center align-items-center h-50">
              <div class="col-12 col-lg-12 col-xl-12">
                        
              </div>
            </div>
            <div class="card-body p-4 p-md-5" >
         
              
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="color:white;">Forgot Password</h3>
              <form method="POST" action="{{ URL::to('/') }}/forgot_password" >
                @csrf
  
                <div class="row">
                  <div class="col-md-12 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="emailAddress" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="emailAddress">Email</label>
                    </div>
  
                  </div>
                 
                </div>
  

  
                
                <div class="mt-4 pt-2 bottom-control" >
                  
                  {{-- <a href="" id="show_login" role="button">Sign in</a> --}}
                  <a href=""><input class="btn btn-primary btn-lg" id="submit_btn" type="submit" value="Send" />
                  </a>
                  {{-- <a href="" id="show_register" role="button">Sign up</a> --}}
                    
                </div>
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



<head><link rel="stylesheet" href="css/register.css"></head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
<script>



  $(function(){
   $('#show_login').click(function(){
            $('.forgot').fadeOut(200);
            $('.register').fadeOut(100);
            $('.login').fadeIn(1200);
            
            return false;
        });    
  });

  $(function(){
   $('#show_forgot').click(function(){
            $('.register').fadeOut(200);
            $('.login').fadeOut(100);
            $('.forgot').fadeIn(1200);
            return false;
        });    
  });
</script>
@endsection
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
              <form action="{{ URL::to('/') }}/reset_pwd_action" method="POST">
                @csrf
            
                <div class="row">
                  <div class="col-md-12 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="password" id="pass" value="{{ old('npwd') }}" class="form-control form-control-lg" name="npwd"/>
                      <label class="form-label" for="">Password</label>
                    </div>
                    <span class="error">
                      @error('npwd')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="col-md-12 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="password" id="password" class="form-control form-control-lg" name="npwd_confirmation" />
                      <label class="form-label" for="phoneNumber">Confirm Password</label>
                    </div>
                    <span class="error">
                      @error('npwd_confirmatioon')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>

                 
                </div>
  

  
                
                <div class="mt-4 pt-2 bottom-control" >
                  
                  <input class="btn btn-primary btn-lg" id="submit_btn" type="submit" value="Submit"  />
                  
                    
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

@endsection
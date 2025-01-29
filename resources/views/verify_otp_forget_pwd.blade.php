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

<section class="img-fluid" style="background-size:cover; justify-content:center;background-image:url('{{ URL::to('/') }}/Images/night.png');">


    <div class="container py-5 h-100 login">
      <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-10 col-lg-7 col-xl-5">
          <div class="card shadow-2-strong card-registration">
            <div class="row justify-content-center align-items-center h-50">
              <div class="col-12 col-lg-12 col-xl-12">
                        
              </div>
            </div>
            <div class="card-body p-4 p-md-5" >
         
              
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="color:white;">Verify OTP</h3>

              
              @if(Session::has('error'))

              <div class="alert alert-danger text-red" role="alert">{{ Session::get('error') }}</div>

              @endif

          
              <form action="{{ URL::to('/') }}/verify_otp_forget_password_action" method="POST">
                @csrf
            
                <div class="row">
     
                  <div class="col-md-12 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="password" id="password" class="form-control form-control-lg" name="otp" />
                      <label class="form-label" for="">OTP</label>
                    </div>
                    <span class="error">
                      @error('otp')
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



<head><link rel="stylesheet" href="{{ URL::to('/') }}/css/register.css"></head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

@endsection
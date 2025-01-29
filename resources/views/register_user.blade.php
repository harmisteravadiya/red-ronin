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
    <div class="container py-5 h-100 register">
      <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration">
            <div class="row justify-content-center align-items-center h-50">
              <div class="col-12 col-lg-12 col-xl-12">
                            {{-- <img src="Images/OTAKU.webp" alt="register" class="d-inline-block align-text-center img-fluid rounded"> --}}
              </div>
            </div>
            <div class="card-body p-4 p-md-5" >
         
              
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="color:white;">Registration Form</h3>
              <form action="add_user" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                      <input type="text" id="fullname" value="{{old('fullname')}}" class="form-control form-control-lg" name="fullname" />
                      <label class="form-label" for="Name">Full Name</label>
                    
                    </div>
                    <span class="error">
                      @error('fullname')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                      <input type="tel" id="phoneNumber" name="mobile" value="{{old('mobile')}}" class="form-control form-control-lg" />
                      <label class="form-label" for="phoneNumber">Phone Number</label>
                    </div>
                    
                    <span class="error">
                      @error('mobile')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
               
                </div>
  
                <div class="row">

                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="emailAddress" name="email" value="{{old('email')}}" class="form-control form-control-lg" />
                      <label class="form-label" for="emailAddress">Email</label>
                    </div>
                    <span class="error">
                      @error('email')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
             
                  
                  
                  <div class="col-md-6 mb-4">
  
                    <h6 class="mb-2 pb-1">Gender: </h6>
  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gen" id="maleGender"
                        value="Male"  @if ( old('gen') =="Male") checked  @endif />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gen" id="femaleGender"
                        value="Female"  @if ( old('gen') =="Female") checked  @endif />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                 
  
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline w-100">
                      <input type="date" class="form-control form-control-lg" value="{{old('dob')}}" name="dob" id="birthdayDate" />
                      <label for="birthdayDate" class="form-label">Birth date</label>
                    
                    </div>
                    <span class="error">
                      @error('dob')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="text" id="pin" name="pin" value="{{old('pin')}}" class="form-control form-control-lg" />
                      <label class="form-label" for="pin">Pincode</label>
                    </div>
                    <span class="error">
                      @error('pin')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>

                </div>
                <div class="row"> 
                  
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                      <input type="password" id="password" name="pwd" value="{{old('pwd')}}" class="form-control form-control-lg" />
                      <label class="form-label" for="phoneNumber">Password</label>
                      
                    </div>
                    <span class="error">
                      @error('pwd')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>

                  <div class="col-md-6 mb-4 pb-2">
                    <div class="form-outline">
                      <input type="text" id="cpassword" name="pwd_confirmation" value="{{old('pwd_confirmation')}}" class="form-control form-control-lg" />
                      <label class="form-label" for="phoneNumber">Confirm Password</label>
                    </div>
                    <span class="error">
                      @error('pwd_confirmation')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
               
  

                <div class="row">
                  <div class="col-12">
                    <div class="form-outline">
                    <textarea name="address" class="form-control form-control-lg" id="addr" value="{{old('address')}}" cols="30" rows="3" style="color:aliceblue;"></textarea>
                    <label class="form-label" for="address">Address</label>
                    </div>
                    <span class="error">
                      @error('address')
                          {{ $message }}
                      @enderror
                    </span>
                  </div>
                </div>
  
                
                <div class="mt-4 pt-2 bottom-control">
                  <input class="btn btn-primary btn-lg" id="submit_btn" type="submit" value="Submit"  />
                  <a href="{{ URL::to('/') }}/login" role="button" id="show_login">Already signed up? Login</a>
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
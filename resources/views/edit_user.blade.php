@extends('admin_layout')
@section('admin_content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/admin_header.css">
</head>
  

      
        <section class="py-5 d-flex justify-content-center">
            <div class="container">
              <div class="row">
                <div class="col-xl-10 col-lg-10 mb-4">
        
                    <div class="card shadow-0 border text-white">
                        <div class="p-4">
                          <h5 class="card-title mb-3">Edit User</h5>
                          <form action="{{ URL::to('/') }}/update_user/{{ $result['id'] }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="row">
                            <div class="col-lg-6 col-md-12  mb-3">
                              <p class="mb-0">Full name</p>
                              <div class="form-outline border rounded-3 shadow-0">
                                <input type="text" id="typeText" placeholder="Type here" name="fullname" value="{{ $result['name'] }}" class="form-control" />
                              </div>

                              <span class="error">
                                @error('fullname')
                                    {{ $message }}
                                @enderror
                              </span>
                            </div>
              
                           
              
                            <div class="col-lg-6 col-md-12 mb-3">
                              <p class="mb-0">Phone</p>
                              <div class="form-outline border rounded-3 shadow-0">
                                <input type="text" id="typePhone" value="{{ $result['mobile'] }}" name="mobile" class="form-control" />
                              </div>
                              <span class="error">
                                @error('mobile')
                                    {{ $message }}
                                @enderror
                              </span>
                            </div>
              
                            <div class="col-lg-6 col-md-12 mb-3 ">
                              {{-- <p class="mb-0">Email</p>
                              <div class="form-outline border rounded-3 shadow-0">
                                <input type="text" id="typeEmail" name="email" value="{{ $result['email'] }}" placeholder="example@gmail.com" class="form-control" readonly />
                              </div>
                              <span class="error">
                                @error('email')
                                    {{ $message }}
                                @enderror
                              </span> --}}
                            </div>
    
    
                            <div class="col-lg-6 col-md-12">
                                <p class="mb-0">Birth Date</p>
                                <div class="form-outline border rounded-3 shadow-0">
                                  <input type="date" id="typeText" name="dob" value="{{ $result['dob'] }}" placeholder="Type here" class="form-control" />
                                </div>
                            
                              </div>
                          </div>
              
                      
              
                          <hr class="my-2" />
              
                          <h5 class="card-title mb-3">Gender</h5>
              
                          <div class="row mb-3">
                            <div class="col-lg-4 mb-3">
                              <!-- Default checked radio -->
                              <div class="form-check border rounded-3">
                                <div class="p-3">
                                  <input class="form-check-input" type="radio" name="gender" value="Male" id="flexRadioDefault1" @if ( $result['gender']=='Male' )
                                      checked
                                  @endif />
                                  <label class="form-check-label" for="flexRadioDefault1">
                                    Male <br />
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                              <!-- Default radio -->
                              <div class="form-check border rounded-3">
                                <div class="p-3">
                                  <input class="form-check-input" type="radio" name="gender" value="Female" id="flexRadioDefault2" @if ( $result['gender']=='Female' )
                                  checked
                              @endif />
                                  <label class="form-check-label" for="flexRadioDefault2">
                                    Female <br />
                                  </label>
                                </div>
                              </div>
                            </div>
                          
                          </div>
              
                          <div class="row">
                       
              
                            <div class="col-sm-4 mb-3">
                              <p class="mb-0">Pincode</p>
                              <div class="form-outline">
                                <input type="text" id="typeText" name="pin" value="{{ $result['pincode'] }}" class="form-control border rounded-3 shadow-0" />
                              </div>
                         
                            </div>
              
                            <div class="col-sm-4 mb-3">
                              <p class="mb-0">Password</p>
                              <div class="form-outline">
                                <input type="text" id="typeText" name="pwd" value="{{ $result['pwd'] }}" placeholder="Type here" class="form-control border rounded-3 shadow-0" />
                              </div>
                              <span class="error">
                                @error('pwd')
                                    {{ $message }}
                                @enderror
                              </span>
                            </div>
    
                            <div class="col-sm-4 mb-3">
                                <p class="mb-0">Confirm Password</p>
                                <div class="form-outline">
                                  <input type="text" id="typeText" name="pwd_confirmation"value="{{ $result['pwd'] }}" placeholder="Type here" class="form-control border rounded-3 shadow-0" />
                                </div>
                            
                              </div>
              
                           
              
                            <div class="col-sm-4 col-6 mb-3">
                              {{-- <p class="mb-0">Zip</p> --}}
                              {{-- <div class="form-outline border rounded-3 shadow-0"> --}}
                                {{-- <input type="text" id="typeText" class="form-control " /> --}}
                              {{-- </div> --}}
                            </div>
                          </div>
              
                          <div class="col-sm-12 mb-3">
                            <p class="mb-0">Address</p>
                            <div class="form-outline">
                              <textarea name="address" id="" cols="70" rows="5"  class="form-control border rounded-3 shadow-0">{{ $result['address'] }}</textarea>
                            </div>
                      
                          </div>
            
            
                        
            
              
                          <div class="justify-content-center d-flex">
                         <a href="{{ URL::to('/') }}/update_user">   <button type="submit" class="btn btn-success shadow-0 border ">Update User</button> </a>
                           <a href="{{ URL::to('/') }}/manage_users" class="btn btn-secondary shadow-0 border mx-2"> Cancel</a>
                          </div>
                        </form>

                        </div>
                    
                      </div>
     
              </div>
            </div>
          </section>
   
@endsection

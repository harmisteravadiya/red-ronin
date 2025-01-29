@extends('master_view')
@section('content')
<head><link rel="stylesheet" href="css/cart.css"></head>

<section class="py-5 text-white" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title_all text-center">
                    <h3 class="font-weight-bold">Welcome To <span class="text-custom">Red Ronin</span></h3>
                    <p class="section_subtitle mx-auto text-white   ">Anime Merchandise selling website<br/></p>
                    <div class="">
                        <i class=""></i>
                    </div>
                </div>
            </div>
        </div>

        <hr class="py-2"/>

        <div class="row mt-5">
            <div class="col-lg-6">
                <div class=" mt-3">
                    
                    <h4 class=" text-capitalize font-weight-bold mt-4">Our Motive</h4>
                    <p class="text-white mt-3">Red Ronin is website specially made for connecting our customers online with our shop. </p>

                    <p class="text-white mt-3"> Our goal is to provide customers a user friendly expereince for shopping with our shop through this website and to make shopping easier for them </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img_about mt-3">
                    <img src="{{ URL::to('/') }}/Images/logo.png" alt="logo" class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>

        <hr class="py-2"/>

        {{-- <div class="row mt-3">
            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 font-weight-bold">Creative Design</h5>
                        <p class="edu_desc mt-3 mb-0 text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fab fa-angellist"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 font-weight-bold">We make Best Result</h5>
                        <p class="edu_desc mb-0 mt-3 text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="about_content_box_all mt-3">
                    <div class="about_detail text-center">
                        <div class="about_icon">
                            <i class="fas fa-paper-plane"></i>
                        </div>
                        <h5 class="text-dark text-capitalize mt-3 font-weight-bold">best platform </h5>
                        <p class="edu_desc mb-0 mt-3 text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                </div>
            </div>
        </div> --}}

        <section class="py-5">
            <div class="container">
              @if (Session::has('succ'))
              <div class="alert alert-success text-red" role="alert">{{ Session::get('succ') }}</div>
              @endif

              @if (Session::has('err'))
              <div class="alert alert-danger text-red" role="alert">{{ Session::get('err') }}</div>
                  
              @endif
                <form action="{{ URL::to('/') }}/send_request" method="post" enctype="multipart/form-data">
                  @csrf
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-4 mb-4">

               
                
                  <img src="{{ URL::to('/') }}/Images/contact_us.png" alt="contact us" class="img img-fluid my-5" />
                 
                </div>

                <div class="col-xl-2 col-lg-2 col-sm-2 mb-4">


                </div>
                <div class="col-xl-6 col-lg-6 col-sm-6 mb-4">
        
          
                  <div class="card shadow-0 border text-white">
                    <div class="p-4">
                      <h5 class="card-title mb-3">Contact Us</h5>
                      <div class="row">
                        <div class="col-lg-12 col-md-12  mb-3">
                          <p class="mb-0">Full name</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <input type="text" name="fullname" id="typeText" placeholder="Type here" class="form-control" />
                          </div>
                          <span class="error">
                            @error('fullname')
                                {{ $message }}
                            @enderror
                          </span>
                        </div>
          
                       
          
                        <div class="col-lg-12 col-md-12 mb-3">
                          <p class="mb-0">Phone</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <input type="text" id="typePhone" name="mobile" value="" class="form-control" />
                          </div>
                          <span class="error">
                            @error('mobile')
                                {{ $message }}
                            @enderror
                          </span>
                        </div>
          
                        <div class="col-lg-12 col-md-12 mb-3 ">
                          <p class="mb-0">Email</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <input type="text" id="typeEmail" name="email" placeholder="example@gmail.com" class="form-control" />
                          </div>
                          <span class="error">
                            @error('email')
                                {{ $message }}
                            @enderror
                          </span>
                        </div>


                
                      </div>
          
                  
          
                      <hr class="my-2" />
          
                
          
                      <div class="col-sm-12 mb-3">
                        <p class="mb-0">Message</p>
                        <div class="form-outline">
                          <textarea name="message1" id="" cols="70" rows="5" class="form-control border rounded-3 shadow-0"></textarea>
                        </div>
                        <span class="error">
                          @error('message1')
                              {{ $message }}
                          @enderror
                        </span>
                      </div>
        
        
                    
        
          
                      <div class="justify-content-center d-flex">
                        <button class="btn btn-success shadow-0 border " type="submit">Send</button> 
                        {{-- <a href="{{ URL::to('/') }}/manage_users" class="btn btn-secondary shadow-0 border mx-2" id="hide_register">Cancel</a> --}}
                      </div>
                    </div>
                  </div>
               
                </div>
     
              </div>
                </form>
            </div>
          </section>
    </div>
</section>
    @endsection
@extends('master_view')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/cart.css">
    </head>
    <section>
        <div class="container py-5">
          
      
          <div class="row d-flex">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center text-white">
                  <img src="{{ URL::to('/') }}/Images/Profile/{{ $result['pic'] }}" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3">{{ $result['name'] }}</h5>
                  <p class="text-light mb-1">User</p>
                  <p class="text-light mb-4">{{ $result['address'] }}</p>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="{{ URL::to('/') }}/edit_user/{{ $result['id'] }}" class="btn btn-primary">Edit details</a>
                    <a href="{{ URL::to('/') }}/change_profile" class="btn btn-outline-primary ms-1">Change profile</a>
                  </div>
                </div>
              </div>
        
              <div class="card mb-4">
                <div class="card-body text-light">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-light mb-0">{{ $result['name'] }}</p>
                      <p class="text-light mb-0"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-light mb-0">{{ $result['name'] }}</p>
                      <p class="text-light mb-0"></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Mobile</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-light mb-0">{{ $result['mobile'] }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Gender</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-light mb-0">{{ $result['gender'] }}</p>
                    </div>
                  </div>
                

                  <hr/>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Pincode</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-light mb-0">{{ $result['pincode'] }}</p>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-light mb-0">{{ $result['address'] }}</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
       


                <div class="col-md-8">
                 
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                          <div class="row g-0 cart-box">
                            <div class="col-lg-12">
                              <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                  <h1 class="fw-bold mb-0 text-white">My Orders</h1>
                                  <h6 class="mb-0 text-light">{{ $count }} items</h6>
                                </div>
                                <hr class="my-4">
              
                                @foreach ($order as $data)
                                    
                                <div class="row mb-4 d-flex justify-content-between align-items-center ">
                                 
                                  <div class="col-md-3 col-lg-3 col-xl-3">
                                    {{-- <h6 class="text-light">Shirt</h6> --}}
                                    <h6 class="text-white mb-0">
                                   {{ $data->item_name }}
                                    </h6>
                                  </div>
                                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                               
                                  </div>
                                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h6 class="mb-0 price">{{ $data->amount }}</h6>
                                  </div>
                                
                                  <div class="col-md-3 col-lg-3 col-xl-3">

                                    <a href="{{ URL::to('/') }}/generate_bill/{{ $data->order_id }}" class="btn btn-sm btn-primary shadow-sm text-white"><i
                                      class="fas fa-clipboard-check fa-sm text-white mx-1"></i>Bill</a> 
                                </div>
                                </div>
              
                                <hr class="my-4">
                               
                                @endforeach
              
               
              
                      
              
                                {{-- <hr class="my-4"> --}}
              
                                <div class="pt-3">
                                  <h6 class="mb-0 "><a href="{{ URL::to('/') }}/home " class="text-body d-flex "><i
                                        class="fas fa-long-arrow-alt-left me-3 text-white"> </i><h6 class="text-white">Back to shop </h6></a></h6>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                </div>
                
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

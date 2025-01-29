@extends('master_view')
@section('content')
    <head><link rel="stylesheet" href="{{ URL::to('/') }}/css/cart.css">
        </head>
        <section class="h-100 h-custom">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                  <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                      <div class="row g-0 cart-box">
                        <div class="col-lg-8">
                          <div class="p-5">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                              <h1 class="fw-bold mb-0 text-white">Shopping Cart</h1>
                              <h6 class="mb-0 text-white">{{ $count }} items</h6>
                            </div>
                            <hr class="my-4">
          
                            @foreach ($result as $data)
                                
                            <div class="row mb-4 d-flex justify-content-between align-items-center ">
                              <div class="col-md-2 col-lg-2 col-xl-2">
                                @if ($data['manga_id']==0)
                                <img
                                src="{{URL::to('/')}}/Images/products/{{ $data->pic }}"
                                class="img-fluid rounded-3" alt="">  
                                @else
                                <img
                                src="{{URL::to('/')}}/Images/manga/{{ $data->pic }}"
                                class="img-fluid rounded-3" alt="">
                                @endif
                 
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3">
                                {{-- <h6 class="text-muted">Shirt</h6> --}}
                                <h6 class="text-white mb-0">@if ($data['manga_id']==0)
                                    {{ $data['product_name'] }}
                                @else
                                {{ $data['manga_name'] }}
                                    
                                @endif</h6>
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <a href="{{ URL::to('/') }}/decrease_quantity/{{ $data['cart_item_id'] }}"> <button class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                  <i class="fas fa-minus"></i>
                                </button>
                                </a>
                               
                                <input id="form1" min="0" name="quantity" value="{{ $data['quantity'] }}" type="number"
                                  class="form-control form-control-sm" readonly/>
          
                               <a href="{{ URL::to('/') }}/increase_quantity/{{ $data['cart_item_id'] }}"> <button class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                  <i class="fas fa-plus"></i>
                                </button></a>
                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0 price">₹ {{ $data['price'] }}</h6>
                              </div>
                              <div class="col-md-1 col-lg-1 col-xl-1 ">
                                <a href="{{ URL::to('/') }}/delete_product_cart/{{ $data['cart_item_id'] }}" class="text-white"><i class="fas fa-times"></i></a>
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
                        <div class="col-lg-4 col-md-12 bg-grey">
                          <div class="p-5 ">
                            <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                            <hr class="my-4">
          
                            <div class="d-flex justify-content-between mb-4">
                              <h5 class="text-uppercase">Total Items {{ $count }}</h5>
                             
                            </div>
          
                            @foreach ($result as $data)
                                
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="">@if ($data['manga_id']==0)
                                  {{ $data['product_name'] }}
                              @else
                              {{ $data['manga_name'] }}
                                  
                              @endif
                                <h5>₹{{ $data->price *  $data->quantity}}</h5>
                              </div>

                         
                              @endforeach

                        
              
                       
                            <hr class="my-4">
          
                            <div class="d-flex justify-content-between mb-5">
                              <h5 class="text-uppercase">Total price</h5>
                              <h5>₹ {{ $totalPrice  }}</h5>
                            </div>
          
                            <a href="{{ URL::to('/') }}/checkout/{{ Session::get('id') }}">
                            <button type="button" class="btn btn-success btn-block btn-lg"
                              data-mdb-ripple-color="dark">Proceed</button>
                            </a>
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
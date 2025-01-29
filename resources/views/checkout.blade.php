@extends('master_view')
@section('content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/css/cart.css">
<style type="text/css">
.float-end .btn, .float-end .btn:hover{
    box-shadow: none;
}
input::placeholder{
    color: white
}
    </style></head>
  
  <section class="py-5">
    <div class="container">
      <form action="{{ URL::to('/') }}/checkout_action" method="post" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-xl-8 col-lg-8 mb-4">

  
          <!-- Checkout -->
          <div class="card shadow-0 border">
            <div class="p-4">
              <h5 class="card-title mb-3">Checkout</h5>
              <div class="row">
                <div class="col-12 mb-3">
                  <p class="mb-0">Full name</p>
                  <div class="form-outline border rounded-3 shadow-0">
                    <input type="text" id="typeText" name="fname" placeholder="Type here" value="{{ old('fname') }}" class="form-control" />
                  </div>
                  <span class="error">
                    @error('fname')
                        {{ $message }}
                    @enderror
                  </span>
                </div>
  
       
  
                <div class="col-6 mb-3">
                  <p class="mb-0">Phone</p>
                  <div class="form-outline border rounded-3 shadow-0">
                    <input type="text" name="mobile" id="typePhone" value="{{ old('mobile') }}" class="form-control" />
                  </div>
                  <span class="error">
                    @error('mobile')
                        {{ $message }}
                    @enderror
                  </span>
                </div>
  
                <div class="col-6 mb-3 ">
                  {{-- <p class="mb-0">Email</p>
                  <div class="form-outline border rounded-3 shadow-0">
                    <input type="text" id="typeEmail" name="email" value="{{ session()->get('email') }}" placeholder="example@gmail.com" class="form-control" readonly/>
                  </div>
                  <span class="error">
                    @error('email')
                        {{ $message }}
                    @enderror
                  </span> --}}
                </div>
              </div>
  
          
  
              <hr class="my-4" />
  
              <h5 class="card-title mb-3">Shipping info</h5>
  
              <div class="row mb-3">
                <div class="col-lg-4 mb-3">
                  <!-- Default checked radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" value="express" name="shipping" id="flexRadioDefault1" checked />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Express delivery <br />
                        <small class="text-white">2 days </small>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <!-- Default radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" value="normal" name="shipping" id="flexRadioDefault2" />
                      <label class="form-check-label" for="flexRadioDefault2">
                        Normal <br />
                        <small class="text-white">5-7 days </small>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <!-- Default radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" value="self-pick-up" name="shipping" id="flexRadioDefault3" />
                      <label class="form-check-label" for="flexRadioDefault3">
                        Self pick-up <br />
                        <small class="text-white">Come to our shop </small>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

              
              <hr class="my-4" />
  
              <h5 class="card-title mb-3">Payment method</h5>
              <div class="row mb-3">
                <div class="col-lg-4 mb-3">
                  <!-- Default checked radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" value="cod" name="payment" id="flexRadioDefault1" checked />
                      <label class="form-check-label" for="flexRadioDefault1">
                        Cash on delivery <br />
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <!-- Default radio -->
                  <div class="form-check h-100 border rounded-3">
                    <div class="p-3">
                      <input class="form-check-input" type="radio" value="online" name="payment" id="flexRadioDefault2" />
                      <label class="form-check-label" for="flexRadioDefault2">
                        Online <br />
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
        
                </div>
              </div>
              <hr class="my-4" />
  
              <div class="row">
           
  
                <div class="col-sm-4 mb-3">
                  <p class="mb-0">City</p>
                  <div class="form-outline">
                    <input type="text" id="typeText" name="city" value="{{ old('city') }}" class="form-control border rounded-3 shadow-0" />
                  </div>
                  <span class="error">
                    @error('city')
                        {{ $message }}
                    @enderror
                  </span>
                </div>
  
                <div class="col-sm-4 mb-3">
                  <p class="mb-0">House (Optional)</p>
                  <div class="form-outline">
                    <input type="text" id="typeText" placeholder="Type here" value="{{ old('house') }}" name="house" class="form-control border rounded-3 shadow-0" />
                  </div>
                </div>
  
                <div class="col-sm-4 col-6 mb-3">
                  <p class="mb-0">Postal code</p>
                  <div class="form-outline">
                    <input type="text" id="typeText" name="pin" value="{{ old('pin') }}" class="form-control border rounded-3 shadow-0" />
                  </div>
                  <span class="error">
                    @error('pin')
                        {{ $message }}
                    @enderror
                  </span>
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
                  <textarea name="address" id="" cols="70" rows="5" class="form-control border rounded-3 shadow-0">{{ old('address') }}</textarea>
                </div>
                <span class="error">
                  @error('address')
                      {{ $message }}
                  @enderror
                </span>
              </div>


              {{-- <div class="form-check mb-3">
                <input class="form-check-input border rounded-3 shadow-0" type="checkbox" value="" id="flexCheckDefault1" />
                <label class="form-check-label" for="flexCheckDefault1">Save this address</label>
              </div> --}}
{{--   
              <div class="mb-3">
                <p class="mb-0">Message to seller</p>
                <div class="form-outline">
                  <textarea class="form-control" id="textAreaExample1" rows="2"></textarea>
                </div>
              </div> --}}
  
              <div class="float-end">
                <a href="{{ URL::to('/') }}/cart" class="btn btn-light border">Cancel</a>
                <button class="btn btn-success shadow-0 border">Continue</button>
              </div>
            </div>
          </div>
          <!-- Checkout -->
        </div>
        <div class="col-xl-4 col-lg-4 d-flex text-white justify-content-center justify-content-lg-end">
          <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
            <h6 class="mb-3">Summary</h6>
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2">₹ {{ $totalPrice }}</p>
            </div>
            {{-- <div class="d-flex justify-content-between">
              <p class="mb-2">Discount:</p>
              <p class="mb-2 text-danger">- $60.00</p>
            </div> --}}
            <div class="d-flex justify-content-between">
              <p class="mb-2">Shipping cost:</p>
              <p class="mb-2">0</p>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <p class="mb-2">Total price:</p>
              <p class="mb-2 fw-bold">₹ {{ $totalPrice }}</p>
            </div>
  
       
  
            <hr />
            <h6 class="text-white my-4">Items in cart</h6>
  
  
            @foreach ($result as $data)
                
            <div class="d-flex align-items-center mb-4">
              <div class="me-3 position-relative">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary text-black">
                  {{ $data['quantity'] }}
                </span>
                @if ($data['manga_id']==0)
                <img src="{{ URL::to('/') }}/Images/products/{{ $data['pic'] }}" style="height: 96px; width: 96x;" class="img img-fluid rounded border" />
                @else
                <img src="{{ URL::to('/') }}/Images/manga/{{ $data['pic'] }}" style="height: 96px; width: 96x;" class="img img-fluid rounded border" />                       
                @endif
              </div>
              <div class="">
                <a href="" class="nav-link">
                  @if ($data['manga_id']==0)
                  {{ $data->product_name }} <br />
                  @else
                  {{ $data->manga_name }} <br />
                                    
                @endif
                </a>
                <div class="price text-white">Total: {{ $data->price }}</div>
              </div>
            </div>
          
          @endforeach

  
       
          
            </div>
          </div>
        </div>
      </div>
</form>

    </div>
  </section>
  
@endsection
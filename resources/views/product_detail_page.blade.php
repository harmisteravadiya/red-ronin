@extends('master_view')
@section('content')
<head>
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/product_detail.css">
</head>

<!-- content -->
<section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="rounded-4 mb-3 d-flex justify-content-center">
        
              <img style="max-width: 100%; max-height: 50vh; margin: auto;" class="rounded-4 fit" src="{{ URL::to('/') }}/Images/products/{{ $result['pic'] }}" />
        
          </div>
        </aside>
        <main class="col-lg-6 detail-box py-4">
          <div class="ps-lg-3">
            <h4 class="title text-light">
             {{ $result['product_name'] }}
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span class="ms-1">
                  {{ $result['rating'] }}
                </span>
              </div>
              <span class="text-primary"><i class="fas fa-shopping-basket fa-sm mx-1"></i>{{ $result['sell_count'] }} orders</span>
              @if ($result['stock']==0)
              <span class="text-danger ms-2">Out of stock</span>
            @else
            <span class="text-success ms-2">  In stock</span>
              @endif 
            </div>
  
            <div class="mb-3">
              <span class="h5">₹{{ $result['price'] }}</span>
              <span class="text-muted">/per item</span>
            </div>
  
            <p>
              {{-- Modern look and quality demo item is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown clothing low-top shirts for
              men. --}}
              {{ $result['description'] }}
            </p>
{{--   
            <div class="row">
              <dt class="col-3">Type:</dt>
              <dd class="col-9">Regular</dd>
  
              <dt class="col-3">Color</dt>
              <dd class="col-9">Brown</dd>
  
              <dt class="col-3">Material</dt>
              <dd class="col-9">Cotton, Jeans</dd>
  
              <dt class="col-3">Brand</dt>
              <dd class="col-9">Reebook</dd>
            </div> --}}
  
            <hr />
  
            <div class="row mb-4">
              {{-- <div class="col-md-4 col-6">
                <label class="mb-2">Size</label>
                <select class="form-select border border-secondary" style="height: 35px;">
                  <option>Small</option>
                  <option>Medium</option>
                  <option>Large</option>
                </select>
              </div>
              <!-- col.// -->
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Quantity</label>
                <div class="input-group mb-3" style="width: 170px;">
                  <button class="btn btn-black border border-secondary px-3 ic" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input type="text" class="form-control text-center border border-secondary" placeholder="14" aria-label="Example text with button addon" aria-describedby="button-addon1" />

                  <button class="btn btn-black border border-secondary px-3 ic" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div> --}}
            </div>
            <a href="{{ URL::to('/') }}/add_product_cart/{{ $result['product_id'] }}" class="btn btn-success shadow-0"> Buy now </a>
            <a href="{{ URL::to('/') }}/add_product_cart/{{ $result['product_id'] }}" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
            {{-- <a href="#" class="btn btn-dark border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a> --}}
          </div>
        </main>
      </div>
    </div>
  </section>
  <!-- content -->
  
  <section class="border-top py-4 content-box">
    <div class="container">
      <div class="row gx-4">
        <div class="col-lg-8 mb-4">
          {{-- <div class="border rounded-2 px-3 py-2">
            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
              <li class="nav-item d-flex " role="presentation">
                <a class="nav-link d-flex align-items-center justify-content-center w-100 active" >Specification</a>
              </li>
            </ul>
            <!-- Pills navs -->
  
            <!-- Pills content -->
            <div class="tab-content" id="ex1-content">
              <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                <p>
                  With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                  enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                  pariatur.
                </p>
                <div class="row mb-2">
                  <div class="col-12 col-md-6">
                    <ul class="list-unstyled mb-0">
                      <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                      <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit amet, consectetur</li>
                      <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in reprehenderit</li>
                      <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                    </ul>
                  </div>
                  <div class="col-12 col-md-6 mb-0">
                    <ul class="list-unstyled">
                      <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver good</li>
                      <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                      <li><i class="fas fa-check text-success me-2"></i>Modern style and design</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                Tab content or sample information now <br />
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              </div>
              <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                Another tab content or sample information now <br />
                Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </div>
              <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                Some other tab content or sample information now <br />
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                officia deserunt mollit anim id est laborum.
              </div>
            </div>
            <!-- Pills content -->

          

          </div> --}}
          

          <div class="card-body p-4 p-md-5 my-2 border rounded-2" >
         
              
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5" style="color:white;">Add Review</h3>
            <form method="POST" action="{{ URL::to('/') }}/add_review/{{ $result['product_id'] }}">
                @csrf
              <div class="row" >
                <div class="col-md-12">
                <fieldset class="rating">
                
                  <input type="radio" id="rate1" name="rating" value="1" checked>
                  <label for="rate1">1 star</label>
          
                  <input type="radio" id="rate2" name="rating" value="2">
                  <label for="rate2">2 stars</label>
          
                  <input type="radio" id="rate3" name="rating" value="3">
                  <label for="rate3">3 stars</label>
          
                  <input type="radio" id="rate4" name="rating" value="4">
                  <label for="rate4">4 stars</label>
          
                  <input type="radio" id="rate5" name="rating" value="5">
                  <label for="rate5">5 stars</label>
          
                  <span class="focus-ring"></span>
                </fieldset>
              </div>
                <div class="col-md-12 mb-2 pb-2">

                  <div class="form-outline border rounded-2">
                    <textarea name="review" class="form-control form-control-lg" id="review" cols="30" rows="3" style="color:aliceblue;"></textarea>
                    <label class="form-label" for="Review">Review</label>
                  </div>
                  @error('review')
                      <span style="color: red">
                        {{ $message }}
                      </span>
                  @enderror
                </div>
               
              
               <a href=""><input class="btn btn-primary" id="submit_btn" type="submit" value="Send" />
                </a>
            </div>

            </form>
          </div>



        </div>
        <div class="col-lg-4">
          <div class="px-0 border rounded-2 shadow-0">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Similar items</h5>

                @foreach ($similar as $data)
                  
                <div class="d-flex mb-3">
                  <a href="#" class="me-3">
                    <img src="{{ URL::to('/') }}/Images/products/{{ $data['pic'] }}" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                  </a>
                  <div class="info">
                    <a href="#" class="nav-link mb-1">
                      {{ $data['product_name'] }}
                    </a>
                    <strong class="text-light"> ₹ {{ $data['price'] }}</strong>
                  </div>
                </div>

                @endforeach
                


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <section class="py-5">
    <div class="container">
    <div class="list-group">
      
      @foreach ($review as $data)
          
      <div class="list-group-item">
        
        <div class="d-flex w-100 justify-content-between">
          <div class="d-flex w-70 justify-content-left px-1 align-self-center">
          <img src="{{ URL::to('/') }}/Images/profile/{{ $data->pic }}" class="img mx-2 align-text-center review-profile" alt="profile" height="50px" width="50px">
          <h5 class="mb-1 align-self-center">{{ $data->name }}</h5>
          <div class="d-flex flex-row my-3 mx-4">
            <div class="text-warning mb-1 me-2 mx-2">

              @for ($i = 0; $i < $data->rating; $i++)
              <i class="fa fa-star"></i>
                  
              @endfor
              <span class="ms-1">
                {{ $data->rating }}
              </span>
            </div>
          </div>
        </div>
          <small class="text-body-primary align-self-center">{{ $data->date }}</small>
        </div>

        <p class="mb-2 mx-5 px-4">{{ $data->review }}</p>
      </div>

      @endforeach

    </div>
  </div>

  </section>
  
@endsection
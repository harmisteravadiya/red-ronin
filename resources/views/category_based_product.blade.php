@extends('master_view')
@section('content')
 
<head><link rel="stylesheet" href="{{ URL::to('/') }}/css/search.css"></head>

<section class="py-4"> 


<div class="container-fluid pt-5 ">
    <div class="row px-xl-5 ">
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        
                          <select name="sort" id="sort" class="sort-menu">
                            <option value=""class="sort-item">Sort By</option>
                            <option value="Latest" class="sort-item">Latest</option>
                            <option value="Cheapst" class="sort-item">Cheapest</option>
                            <option value="Best_Rating" class="sort-item">Best Rating</option>


                          </select>



                    </div>
                </div>
             

                @foreach ($result as $data)
    

                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                  <a href="{{ URL::to('/') }}/product_detail/{{ $data['product_id'] }}/{{ $data['category'] }}" style="color: white">  <div class="card product-item border mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent  p-0">
                            <img class="img-fluid" src="{{ URL::to('/') }}/Images/products/{{ $data['pic'] }}"  style="height: 260px;width:460px"  alt="{{ $data['product_name
                            '] }}">
                        </div>
                        <div class="card-body text-left p-0 pt-4 pb-3 px-3">
                            <h5 class="text-truncate mb-3">{{ $data['product_name'] }}</h5>
                            <div class="d-flex justify-content-left">
                               
                            </div>
                            <h6>₹{{ $data['price'] }}</h6>
                            <div class="d-flex ">
                                <div class="text-warning mb-1 me-2">
                                  <i class="fa fa-star"></i>
                                  <span class="ms-1">
                                    {{ $data['rating'] }} <span class="text-light">( {{ $data['stock'] }} )</span>
                                  </span>
                                </div>
                            </div>  

                            <a href="{{ URL::to('/') }}/add_product_cart/{{ $data['product_id'] }}" class="btn btn-success shadow-0 py-2 mx-3"> Buy now </a>
                            <a href="{{ URL::to('/') }}/add_product_cart/{{ $data['product_id'] }}" class="btn btn-primary shadow-0 py-2 "> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
                        </div>
                    </div>
                  </a>
                </div>
                
                @endforeach
                
                  <div class="col-12 text-light ">
                      {{ $result->links('pagination::bootstrap-5') }}
                  </div>
             

            </div>
        </div>
    </div>
</div>



</section>
@endsection
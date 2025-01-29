@extends('master_view')
@section('content')
 
<head><link rel="stylesheet" href="{{ URL::to('/') }}/css/search.css"></head>

<section class="py-4"> 


<div class="container-fluid pt-5 ">
    <div class="row px-xl-5 ">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12 border rounded-2 shadow-0">
            <!-- Price Start -->
            <div class="mb-4 pb-4 py-2 my-2 part-1">

                <button class="btn collapsed border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Filter by choice
                  </button>
            
                <div class="collapse" id="collapseExample" style="">
                  <div class="card card-body">

                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                    </form>

                </div>
                </div>

            </div>
            <!-- Price End -->
            <div class=" mb-4 pb-4 py-2 my-2">

                <button class="btn collapsed border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRating" aria-expanded="false" aria-controls="collapseExample">
                    Filter by Rating
                  </button>
            
                <div class="collapse" id="collapseRating" style="">
                  <div class="card card-body">

                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">5 star</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">4 star</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">3 star</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>

                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">2 star</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                    </form>

                </div>
                </div>

            </div>

            <div class=" mb-4 pb-4 py-2 my-2">

                <button class="btn collapsed border-bottom" type="button" data-bs-toggle="collapse" data-bs-target="#collapsecategories" aria-expanded="false" aria-controls="collapseExample">
                    Filter by Categories
                  </button>
            
                <div class="collapse" id="collapsecategories" style="">
                  <div class="card card-body">

                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                    </form>

                </div>
                </div>

            </div>
            <!-- Color Start -->
                  </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        {{-- <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by name">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form> --}}

                       
                        {{-- <div class="dropdown sort border rounded-2 shadow-0">
                            <a class="btn dropdown-toggle" href="#" id="sort" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Sort By
                            </a>
                          
                            <div class="dropdown-menu">
                              <a class="dropdown-item" value="latest" href="#">Latest</a>
                              <a class="dropdown-item" value="cheapst" href="#">Cheapest</a>
                              <a class="dropdown-item" value="best_rating" href="#">Best Rating</a>
                            </div>
                          </div> --}}

                        
                          {{-- <select name="sort" id="sort" class="sort-menu">
                            <option value=""class="sort-item">Sort By</option>
                            <option value="Latest" class="sort-item">Latest</option>
                            <option value="Cheapst" class="sort-item">Cheapest</option>
                            <option value="Best_Rating" class="sort-item">Best Rating</option>


                          </select> --}}



                    </div>
                </div>
             
                @foreach ($result as $data)
    

                <div class="col-lg-4 col-md-6 col-sm-12 pb-1 alldata">
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
                
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1 searchdata">
                    
                </div>
                  <div class="col-12 text-light ">
                      {{ $result->links('pagination::bootstrap-5') }}
                  </div>
             

            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->



</section>

<script>
  $('#sort').on('keyup',function(){

      $value=$(this).val();
      
      if($value){
          $('.alldata').hide();
          $('.searchdata').show();
      }
      else{
          $('.searchdata').hide();
          $('.alldata').show();
      }
      
      $.ajax({
      type : 'get',
      url : '{{URL::to('sort_product')}}',
      data:{'search':$value},
      success:function(data){
      $('#Content').html(data);
      }
      });
      })
              </script>
@endsection
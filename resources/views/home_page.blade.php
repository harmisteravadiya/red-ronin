@extends('master_view')
@section('content')
<head><link rel="stylesheet" href="css/home.css"></head>
<div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">

    {{-- <div class="carousel-indicators">
      <button
        type="button"
        data-mdb-target="#carouselExampleIndicators"
        data-mdb-slide-to="0"
        class="active"
        aria-current="true"
        aria-label="Slide 1"
      ></button>
      <button
        type="button"
        data-mdb-target="#carouselExampleIndicators"
        data-mdb-slide-to="1"
        aria-label="Slide 2"
      ></button>
      <button
        type="button"
        data-mdb-target="#carouselExampleIndicators"
        data-mdb-slide-to="2"
        aria-label="Slide 3"
      ></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Images/sword.png" class="d-block w-100 img-fluid" alt="Wild Landscape"/>
      </div>
      <div class="carousel-item">
        <img src="Images/ks.jpg" class="d-block w-100 img-fluid" alt="Camera"/>
      </div>
      <div class="carousel-item">
        <img src="Images/lie2.jpg" class="d-block w-100 img-fluid" alt="Exotic Fruits"/>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> --}}
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Images/store.jpg" class="d-block w-100 img-fluid" alt="Wild Landscape"/>
      </div>
   
    </div>
  </div>
  

{{-- Categories --}}


<div class="row row-cols-1 row-cols-md-3 g-4 categories">
    <div class="col categorie-item">
      <div class="card"><a href="{{ URL::to('/') }}/category/clothes" > 
        <img src="Images/clothes-removebg-preview.png" class="card-img-top img-fluid" alt="..." style="height: 228.59px" width="310px"  >
        <div class="card-body">
          <h5 class="card-title">Clothes</h5>
        </div>  </a>
       </div>
    
    </div>

    <div class="col categorie-item">
        <div class="card"><a href="{{ URL::to('/') }}/category/Case" > 
          <img src="Images/case5.jpg" class="img-fluid card-img-top" alt="..." style="height: 228.59px" width="310px">
          <div class="card-body">
            <h5 class="card-title">Mobile cases</h5>
          </div></a>
         </div>
      </div>


      <div class="col categorie-item">
        <div class="card"><a href="{{ URL::to('/') }}/category/Figures" > 
          <img src="Images/fg6.webp" class="img-fluid card-img-top" alt="..." style="height: 228.59px" width="310px">
          <div class="card-body">
            <h5 class="card-title">Figures</h5>
          </div></a>
         </div>
      </div>


      <div class="col categorie-item">
        <div class="card"><a href="{{ URL::to('/') }}/category/Katana" > 
          <img src="Images/katana-img.png" class="img-fluid card-img-top" alt="..." style="height: 228.59px" width="310px">
          <div class="card-body">
            <h5 class="card-title">Katana</h5>
          </div></a>
         </div>
      </div>


      <div class="col categorie-item">
        <div class="card"><a href="{{ URL::to('/') }}/manga" > 
          <img src="Images/manga-img.jpg" class="card-img-top img-fluid" alt="..." style="height: 228.59px" width="310px">
          <div class="card-body">
            <h5 class="card-title">Manga</h5>
          </div></a>
         </div>
      </div>


      <div class="col categorie-item">
        <div class="card"><a href="{{ URL::to('/') }}/category/Accesories" > 
          <img src="Images/accessories-img.png" class="card-img-top img-fluid" alt="..." style="height: 228.59px" width="310px">
          <div class="card-body">
            <h5 class="card-title">Accesories</h5>
          </div></a>
         </div>
      </div>
</div>

  {{-- Popular --}}

    <section id = "collection" class = "py-4">
        <div class = "container">
            <div class = "title text-center title1">
                <h2 class = "position-relative d-inline-block pop-title">Popular Collection</h2>
            </div>
               
                <div class = "row m-auto" id="popular">
                  @foreach ($popular as $data)
                      
                 
                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat title1">
                      <a href="{{ URL::to('/') }}/product_detail/{{ $data['product_id'] }}/{{ $data['category'] }}">
                        <div class = "collection-img position-relative">
                            <img src = "Images/products/{{ $data['pic'] }}" class = "w-100" style="height: 276px;width:276px">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                              @for ($i = 0; $i < $data['rating']; $i++)
                                <span class = "text-warning"><i class = "fas fa-star"></i></span>
                                  
                              @endfor
                      
                            </div>
                            <p class = "text-capitalize my-1">{{ $data['product_name'] }}</p>
                            <span class = "fw-bold">₹ {{ $data['price'] }}</span>
                        </div>
                      </a>
                    </div>

                    @endforeach
                  




                              
                </div>
        </div>
    </section>


    {{-- New releases   --}}

    <section id = "collection" class = "py-4 new-rel">
        <div class = "container">
            <div class = "title text-center title1" >
                <h2 class = "position-relative d-inline-block new-title">New Releases</h2>
            </div>
               
                <div class = "row m-auto" id="new-rel">


                    @foreach ($new as $data)
                      
                 
                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat title1">
                      <a href="{{ URL::to('/') }}/product_detail/{{ $data['product_id'] }}/{{ $data['category'] }}">
                        <div class = "collection-img position-relative">
                            <img src = "Images/products/{{ $data['pic'] }}" class = "w-100" style="height: 276px;width:276px">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                              @for ($i = 0; $i < $data['rating']; $i++)
                                <span class = "text-warning"><i class = "fas fa-star"></i></span>
                                  
                              @endfor
                      
                            </div>
                            <p class = "text-capitalize my-1">{{ $data['product_name'] }}</p>
                            <span class = "fw-bold">₹ {{ $data['price'] }}</span>
                        </div>
                      </a>
                    </div>

                    @endforeach


                                  
                </div>
        </div>
    </section>



    {{-- Filtering Section --}}


    {{-- <section id = "collection" class = "py-4 ">
      <div class = "container-fluid">    
              <div class = "row m-auto fil-sec" id="">


                  <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 topic title1">
                      <div class = "collection-img position-relative">
                        <div class="card">
                          <img src="Images/black.jpg" class="card-img-top img-fluid" style="height: 565px;width:878px;" alt="...">              
                        </div>
                        
                      </div>
                  </div>

            <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 topic title1">
                  <div class="row m-auto">

                  <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 topic title1">
                      <div class = "collection-img position-relative">
                        <div class="card">
                          <a href=""><img src="Images/jjk1.jpg" class="card-img-top img-fluid" style="height:260px;width:414px;" alt="..."></a>     
                        </div>
                      </div>
                  </div>  
                  
                  
                  <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 topic title1">
                    <div class = "collection-img position-relative">
                      <div class="card">
                      <a href=""> <img src="Images/your_name.png" class="card-img-top img-fluid" style="height:260px;width:414px;" alt="...">            </a>  
                      </div>
                    </div>
                </div>  


                <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 topic title1">
                  <div class = "collection-img position-relative">
                    <div class="card">
                    <a href="">  <img src="Images/jjk1.jpg" class="card-img-top img-fluid" style="height:260px;width:414px;" alt="...">   </a>           
                    </div>
                  </div>
              </div> 
              

              
              <div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 topic title1">
                <div class = "collection-img position-relative">
                  <div class="card">
                  <a href="">  <img src="Images/ace.png" class="card-img-top img-fluid" style="height:260px;width:414px;"  alt="...">   </a>           
                  </div>
                </div>
            </div> 
            </div>
            </div>  


            </div>
      </div>
  </section> --}}


<head><link rel="stylesheet" href="css/home.css">
<script>

$(document).ready(function(){
  $(".pop-title").click(function(){
    $("#popular").fadeToggle("slow");
  });
});

$(document).ready(function(){
  $(".new-title").click(function(){
    $("#new-rel").fadeToggle("slow");
  });
});


 ScrollReveal({ reset: false });
// ScrollReveal().reveal(".show-once", {
//   reset: true
// });

ScrollReveal().reveal(".title1", {
  duration: 3000,
  origin: "bottom",
  distance: "400px",
  easing: "cubic-bezier(0.5, 0, 0, 1)",
  // rotate: {
  //   x: 20,
  //   z: -10
  // }
});

ScrollReveal().reveal(".categorie-item", {
  duration: 3000,
  origin: "bottom",
  distance: "400px",
  easing: "cubic-bezier(0.5, 0, 0, 1)",
});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

    @endsection
@extends('master_view')
@section('content')
<!-- Font Awesome -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
{{-- <body style="background-size:cover;background-color:rgb(41, 39, 39);"> --}}

<div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
    <div class="carousel-indicators">
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
        <img src="Images/lie.jpg" class="d-block w-100 img-fluid" alt="Exotic Fruits"/>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  

{{-- Categories --}}


<div class="row row-cols-1 row-cols-md-3 g-4 categories">
    <div class="col">
      <div class="card">
        <img src="Images/night.png" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
          <h5 class="card-title">Clothes</h5>
        </div>
       </div>
    </div>

    <div class="col">
        <div class="card">
          <img src="Images/night.png" class="card-img-top img-fluid" alt="...">
          <div class="card-body">
            <h5 class="card-title">Mobile cases</h5>
          </div>
         </div>
      </div>


      <div class="col">
        <div class="card">
          <img src="Images/night.png" class="card-img-top img-fluid" alt="...">
          <div class="card-body">
            <h5 class="card-title">Figures</h5>
          </div>
         </div>
      </div>


      <div class="col">
        <div class="card">
          <img src="Images/night.png" class="card-img-top img-fluid" alt="...">
          <div class="card-body">
            <h5 class="card-title">Katana</h5>
          </div>
         </div>
      </div>


      <div class="col">
        <div class="card">
          <img src="Images/night.png" class="card-img-top img-fluid" alt="...">
          <div class="card-body">
            <h5 class="card-title">Manga</h5>
          </div>
         </div>
      </div>


      <div class="col">
        <div class="card">
          <img src="Images/night.png" class="card-img-top img-fluid" alt="...">
          <div class="card-body">
            <h5 class="card-title">Accesories</h5>
          </div>
         </div>
      </div>
</div>

  {{-- Popular --}}

    <section id = "collection" class = "py-4">
        <div class = "container">
            <div class = "title text-center" >
                <h2 class = "position-relative d-inline-block">Popular Collection</h2>
            </div>
               
                <div class = "row m-auto">


                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat title1">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case3.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>


                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat title1">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case3.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>


                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat title1">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case3.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>


                    <div class ="col-xl-3 col-lg-3 col-md-3 col-sm-12 feat title1">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case3.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>                  
                </div>
        </div>
    </section>


    {{-- New releases   --}}

    <section id = "collection" class = "py-4">
        <div class = "container">
            <div class = "title text-center" >
                <h2 class = "position-relative d-inline-block">New Releases</h2>
            </div>
               
                <div class = "row m-auto">


                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat fade-in">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case2.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>


                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat fade-in">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case2.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>


                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-12 feat fade-in">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case2.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>


                    <div class ="col-xl-3 col-lg-3 col-md-3 col-sm-12 feat fade-in">
                        <div class = "collection-img position-relative">
                            <img src = "Images/case2.webp" class = "w-100">
                            {{-- <span class = "position-absolute bg-primary d-flex align-items-center justify-content-center">sale</span> --}}
                        </div>
                        <div class = "text-center">
                            <div class = "rating mt-3">
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                                <span class = "text-primary"><i class = "fas fa-star"></i></span>
                            </div>
                            <p class = "text-capitalize my-1">gray shirt</p>
                            <span class = "fw-bold">$ 45.50</span>
                        </div>
                    </div>                  
                </div>
        </div>
    </section>
<head><link rel="stylesheet" href="css/home.css"></head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head> --}}
<script>
ScrollReveal({ reset: true });
ScrollReveal().reveal(".show-once", {
  reset: false
});

ScrollReveal().reveal(".title1", {
  duration: 3000,
  origin: "bottom",
  distance: "400px",
  easing: "cubic-bezier(0.5, 0, 0, 1)",
  rotate: {
    x: 20,
    z: -10
  }
});

// ScrollReveal().reveal(".fade-in", {
//   duration: 4000,
//   move: 0
// });

// ScrollReveal().reveal(".scaleUp", {
//   duration: 4000,
//   scale: 0.85
// });

// ScrollReveal().reveal(".flip", {
//   delay: 500,
//   duration: 2000,
//   rotate: {
//     x: 20,
//     z: 20
//   }
// });

// ScrollReveal().reveal(".slide-right", {
//   duration: 3000,
//   origin: "left",
//   distance: "300px",
//   easing: "ease-in-out"
// });

// ScrollReveal().reveal(".fade-in", {
//   duration: 2000,
//   origin: "bottom",
//   distance: "100px",
//   easing: "cubic-bezier(.37,.01,.74,1)",
//   opacity: 0.3,
//   scale: 0.5
// });

</script>

    @endsection
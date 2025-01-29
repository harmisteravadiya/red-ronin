@extends('master_view')
@section('content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/css/manga.css"></head>
<section class="justify-content-fit-content">


<!-- Background image -->
<div class="bg-image">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class=" align-text-center justify-content-center align-items-center">
      <h1 class="text-white mb-0">Manga Centre</h1>
      <br>
      <h5 class="text-white mx-5">One more Chapter</h5>
    </div>
    </div>
  </div>
</div>

</section>

<section class="py-4">
  <div class = "title text-center title1">
  <h2 class = "position-relative d-inline-block pop-title">Genre</h2>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 categories">
  
  <div class="col categorie-item">
    <a href="" class="hello">
    <div class="card"> 
      <div class="card-body">
        <h5 class="card-title">Action</h5>
      </div>  
     </div></a>
  
  </div>

  <div class="col categorie-item">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"> Adventure</h5>
        </div>
       </div>
    </div>


    <div class="col categorie-item">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Shonen</h5>
        </div>
       </div>
    </div>


    <div class="col categorie-item">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Isekai</h5>
        </div>
       </div>
    </div>


    <div class="col categorie-item">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Shoujo</h5>
        </div>
       </div>
    </div>


    <div class="col categorie-item">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sci-fi</h5>
        </div>
       </div>
    </div>
</div>

</section>


<section id = "collection" class = "py-4">
  <div class = "container">
      <div class = "title text-center title1">
          <h2 class = "position-relative d-inline-block pop-title">Popular Collection</h2>
      </div>
         
          <div class = "row m-auto py-4 scroll" id="popular">
            @foreach ($popular as $data)                  
            <div class ="col-xl-6 col-lg-6 col-md-6 col-sm-6 feat title1">
              <a href="{{ URL::to('/') }}/manga_detail/{{ $data['manga_id'] }}">
              <div class="card mb-3 " style="max-width: 540px;">
                <div class="row g-0">
                
                
                      
                 
                  <div class="col-md-4" style="height: 279px;">
                    <img src="{{ URL::to('/') }}/Images/manga/{{ $data['pic'] }}" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $data['manga_name'] }}</h5>
                      <p class="card-text">{{ $data['description'] }}</p>
                      <p class="card-text">Writer :{{ $data['writer'] }} </p>
                      {{-- <p class="card-text">Genre : </p> --}}
                      <p class="card-text">Price: {{ $data['price'] }}</p>
                    </div>
                  </div>
              
                </div>
              </div>
              </a>
              </div>

              @endforeach


                </div>          
      
          </div>
  </div>
</section>


{{-- New releases   --}}

<section id = "collection" class = "py-4 new-rel">
  <div class = "container ">
      <div class = "title text-center title1" >
          <h2 class = "position-relative d-inline-block new-title">New Releases</h2>
      </div>
         
          <div class = "row m-auto py-4 scroll" id="new-rel">

            
            @foreach ($new as $data)                  
            <div class ="col-xl-6 col-lg-6 col-md-6 col-sm-6 feat title1">
              <a href="{{ URL::to('/') }}/manga_detail/{{ $data['manga_id'] }}">
              <div class="card mb-3 " style="max-width: 540px;">
                <div class="row g-0">
                
                
                      
                 
                  <div class="col-md-4" style="height: 279px;">
                    <img src="{{ URL::to('/') }}/Images/manga/{{ $data['pic'] }}" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $data['manga_name'] }}</h5>
                      <p class="card-text">{{ $data['description'] }}</p>
                      <p class="card-text">Writer :{{ $data['writer'] }} </p>
                      {{-- <p class="card-text">Genre : </p> --}}
                      <p class="card-text">Price: {{ $data['price'] }}</p>
                    </div>
                  </div>
              
                </div>
              </div>
              </a>
              </div>

              @endforeach
  
             
              

            
                            
          </div>
  </div>
</section>


<section id = "collection" class = "py-4">
  <div class = "container">
      <div class = "title text-center title1">
          <h2 class = "position-relative d-inline-block pop-title">Much More</h2>
      </div>
         
          <div class = "row m-auto py-4" id="other">
                            
            @foreach ($result as $data)                  
            <div class ="col-xl-6 col-lg-6 col-md-6 col-sm-6 feat title1">
              <a href="{{ URL::to('/') }}/manga_detail/{{ $data['manga_id'] }}">
              <div class="card mb-3 " style="max-width: 540px;">
                <div class="row g-0">
                
                
                      
                 
                  <div class="col-md-4" style="height: 279px;">
                    <img src="{{ URL::to('/') }}/Images/manga/{{ $data['pic'] }}" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{ $data['manga_name'] }}</h5>
                      <p class="card-text">{{ $data['description'] }}</p>
                      <p class="card-text">Writer :{{ $data['writer'] }} </p>
                      {{-- <p class="card-text">Genre : </p> --}}
                      <p class="card-text">Price: {{ $data['price'] }}</p>
                    </div>
                  </div>
              
                </div>
              </div>
              </a>
              </div>

              @endforeach

          </div>
  </div>
</section>


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

 
  const scroll = document.querySelector(".scroll");
var isDown = false;
var scrollX;
var scrollLeft;

// Mouse Up Function
scroll.addEventListener("mouseup", () => {
isDown = false;
scroll.classList.remove("active");
});

// Mouse Leave Function
scroll.addEventListener("mouseleave", () => {
isDown = false;
scroll.classList.remove("active");
});

// Mouse Down Function
scroll.addEventListener("mousedown", (e) => {
e.preventDefault();
isDown = true;
scroll.classList.add("active");
scrollX = e.pageX - scroll.offsetLeft;
scrollLeft = scroll.scrollLeft;
});

// Mouse Move Function
scroll.addEventListener("mousemove", (e) => {
if (!isDown) return;
e.preventDefault();
var element = e.pageX - scroll.offsetLeft;
var scrolling = (element - scrollX) * 2;
scroll.scrollLeft = scrollLeft - scrolling;
scroll.
});

</script>     
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
  
@endsection
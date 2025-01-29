@extends('admin_layout')
@section('admin_content')

    <head>
        <link rel="stylesheet" href="{{ URL::to('/') }}admin_css/admin_header.css">
    </head>



    <section class="py-5 d-flex justify-content-center">
        <div class="container">
            <form action="{{ URL::to('/') }}/update_manga/{{ $result['manga_id'] }}" method="post" enctype="multipart/form-data">
                @csrf
          <div class="row">
            <div class="col-xl-10 col-lg-10 mb-4">
    
      
              <!-- Checkout -->
              <div class="card shadow-0 border text-white">
                <div class="p-4">
                  <h5 class="card-title mb-3">Edit Product</h5>
                  <div class="row">
                    <div class="col-lg-6 col-md-12  mb-3">
                      <p class="mb-0">Product name</p>
                      <div class="form-outline border rounded-3 shadow-0">
                        <input type="text" id="typeText" name="name" value="{{ $result['manga_name'] }}" placeholder="Type here" class="form-control" />
                      </div>
                      <span class="error">
                        @error('name')
                        {{ $message }}    
                        @enderror
                        
                      </span>
                    </div>
      
                   
      
                    <div class="col-lg-6 col-md-12 mb-3">
                      <p class="mb-0">Price</p>
                      <div class="form-outline border rounded-3 shadow-0">
                        <input type="text" id="typePhone" value="{{ $result['price'] }}" name="price" placeholder="In rupees" class="form-control" />
                      </div>
                      <span class="error">
                        @error('price')
                        {{ $message }}    
                        @enderror
                        
                      </span>
                    </div>
      
                    <div class="col-lg-6 col-md-12 mb-3 ">
                      <p class="mb-0">Writer</p>
                      <div class="form-outline border rounded-3 shadow-0">
                        <input type="text" value="{{ $result['writer'] }}" name="writer" placeholder="Full Name" class="form-control" />

                      </div>
                      <span class="category" style="color: red;">
                        @error('category')
                        {{ $message }}    
                        @enderror
                        
                      </span>
                    </div>


                    <div class="col-lg-6 col-md-12 mb-3 ">
                      <p class="mb-0">Stock</p>
                      <div class="form-outline">
                        <input type="text" id="typeText" name="stock" value="{{ $result['stock'] }}" class="form-control border rounded-3 shadow-0" />
                      </div>
                      <span class="error">
                        @error('stock')
                        {{ $message }}    
                        @enderror
                        
                      </span>
                    </div>
                    
      
              
      
                  <hr class="my-2" />
      
                 
      
                  <div class="row">
               
      
                
      
                    <div class="col-lg-4 col-md-12 mb-3">
                      <img src="{{ URL::to('/') }}/Images/manga/{{ $result['pic'] }}" alt="prooduct" class="img img-fluid" style="height: 200px"/>
                      <div class="form-outline border rounded-3 shadow-0 my-2">
                        <input type="file" id="typePhone" name="pic"  placeholder="In rupees" value="{{ $result['pic'] }}" class="form-control" />
                      </div>
                      <span class="error">
                          @error('pic')
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
                    <p class="mb-0">Description</p>
                    <div class="form-outline">
                      <textarea name="desc" id="" cols="70" rows="5" class="form-control border rounded-3 shadow-0"> {{ $result['description'] }}</textarea>
                    </div>
                    <span class="error">
                        @error('desc')
                        {{ $message }}    
                        @enderror
                        
                      </span>
                  </div>
    
    
                
    
      
                  <div class="justify-content-center d-flex">
                    <button class="btn btn-success shadow-0 border ">Edit Manga</button> 
                    <a href="{{ URL::to('/') }}/manage_manga" class="btn btn-secondary shadow-0 border mx-2" >Cancel</a>
                  </div>
                </div>
              </div>
           
            </div>
 
          </div>
        </form>
        </div>
    </section>
@endsection

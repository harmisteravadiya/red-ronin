@extends('admin_layout')
@section('admin_content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/admin_header.css">
  
</head>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Products</h1>
            
        </div>
        
        <section class="py-3">
            <div class="container">
         
                <form action="{{ URL::to('/') }}/insert_product" method="post" enctype="multipart/form-data">
                    @csrf
                
              <div class="row">
                <div class="col-xl-10 col-lg-10 mb-4">
        
                  @if (Session::has('succ'))
                  <div class="alert alert-success text-red" role="alert">{{ Session::get('succ') }}</div>
                  @endif
                  @if (Session::has('err'))
                  <div class="alert alert-danger text-red" role="alert">{{ Session::get('err') }}</div>
                      
                  @endif
                  <!-- Checkout -->
                  <div class="card shadow-0 border text-white">
                    <div class="p-4">
                      <h5 class="card-title mb-3">Add Product</h5>
                      <div class="row">
                        <div class="col-lg-6 col-md-12  mb-3">
                          <p class="mb-0">Product name</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <input type="text" id="typeText" name="name" placeholder="Type here" value="{{ old('name') }}" class="form-control" />
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
                            <input type="text" id="typePhone"  name="price" value="{{ old('price') }}" placeholder="In rupees" class="form-control" />
                          </div>
                          <span class="error">
                            @error('price')
                            {{ $message }}    
                            @enderror
                            
                          </span>
                        </div>
          
                        <div class="col-lg-6 col-md-12 mb-3 ">
                          <p class="mb-0">Category</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <select name="category" id="" class="form-control" >
                                <option value="">Select category</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Manga">Manga</option>
                                <option value="Katana">Katana</option>
                                <option value="Case">Case</option>
                                <option value="Figures">Figures</option>
                                <option value="Accesories">Accesories</option>
                            </select>
                          </div>
                          <span class="category" style="color: red;">
                            @error('category')
                            {{ $message }}    
                            @enderror
                            
                          </span>
                        </div>


                        <div class="col-lg-6 col-md-12 mb-3">
                            <p class="mb-0">Image of product</p>
                            <div class="form-outline border rounded-3 shadow-0">
                              <input type="file" id="typePhone" name="pic"  placeholder="In rupees" class="form-control" />
                            </div>
                            <span class="error">
                                @error('pic')
                                {{ $message }}    
                                @enderror
                                
                              </span>
                          </div>
          
                  
          
                      <hr class="my-2" />
          
                     
          
                      <div class="row">
                   
          
                        <div class="col-sm-4 mb-3">
                          <p class="mb-0">Stock</p>
                          <div class="form-outline">
                            <input type="text" id="typeText" name="stock" value="{{ old('stock') }}" class="form-control border rounded-3 shadow-0" />
                          </div>
                          <span class="error">
                            @error('stock')
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
                          <textarea name="desc" id="" cols="70" rows="5" class="form-control border rounded-3 shadow-0">{{ old('desc') }}</textarea>
                        </div>
                        <span class="error">
                            @error('desc')
                            {{ $message }}    
                            @enderror
                            
                          </span>
                      </div>
        
        
                    
        
          
                      <div class="justify-content-center d-flex">
                        <button class="btn btn-success shadow-0 border ">Add Product</button> 
                        <a href="{{ URL::to('/') }}/manage_products" class="btn btn-secondary shadow-0 border mx-2" >Cancel</a>
                      </div>
                    </div>
                  </div>
               
                </div>
     
              </div>
            </form>
            </div>
          </section>

  
    </div>
@endsection

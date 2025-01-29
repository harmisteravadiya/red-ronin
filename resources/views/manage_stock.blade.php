@extends('admin_layout')
@section('admin_content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/admin_header.css">
  
</head>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products ()</h1>
            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="show_register"><i
                class="fas fa-add fa-sm text-white-50"></i>Add Product</button>

        </div>
        <section class="py-5 register">
            <div class="container">
              <div class="row">
                <div class="col-xl-10 col-lg-10 mb-4">
        
          
                  <!-- Checkout -->
                  <div class="card shadow-0 border text-white">
                    <div class="p-4">
                      <h5 class="card-title mb-3">Add Product</h5>
                      <div class="row">
                        <div class="col-lg-6 col-md-12  mb-3">
                          <p class="mb-0">Product name</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <input type="text" id="typeText" placeholder="Type here" class="form-control" />
                          </div>
                        </div>
          
                       
          
                        <div class="col-lg-6 col-md-12 mb-3">
                          <p class="mb-0">Price</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <input type="text" id="typePhone" value="" placeholder="In rupees" class="form-control" />
                          </div>
                        </div>
          
                        <div class="col-lg-6 col-md-12 mb-3 ">
                          <p class="mb-0">Category</p>
                          <div class="form-outline border rounded-3 shadow-0">
                            <select name="category" id="" class="form-control">
                                <option value="">Select category</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Manga">Manga</option>
                                <option value="Katana">Katana</option>
                                <option value="Case">Case</option>
                                <option value="Figures">Figures</option>
                                <option value="Accesories">Accesories</option>
                            </select>
                          </div>
                        </div>


                        <div class="col-lg-6 col-md-12 mb-3">
                            <p class="mb-0">Image of product</p>
                            <div class="form-outline border rounded-3 shadow-0">
                              <input type="file" id="typePhone" value="" placeholder="In rupees" class="form-control" />
                            </div>
                          </div>
          
                  
          
                      <hr class="my-2" />
          
                     
          
                      <div class="row">
                   
          
                        <div class="col-sm-4 mb-3">
                          <p class="mb-0">Stock</p>
                          <div class="form-outline">
                            <input type="text" id="typeText" class="form-control border rounded-3 shadow-0" />
                          </div>
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
                          <textarea name="desc" id="" cols="70" rows="5" class="form-control border rounded-3 shadow-0"></textarea>
                        </div>
                      </div>
        
        
                    
        
          
                      <div class="justify-content-center d-flex">
                        <button class="btn btn-success shadow-0 border ">Add Product</button> 
                        <button class="btn btn-secondary shadow-0 border mx-2" id="hide_register">Cancel</button>
                      </div>
                    </div>
                  </div>
               
                </div>
     
              </div>
            </div>
          </section>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control  border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">


                        <div style="overflow-x:auto;" >
                            <table class="text-white table table-borderless align-self-center" >
                              <tr class="border-bottom">
                                <th>Product</th>
                                <th>Product Id</th>
                                <th>Name</th>
                                <th>Price (Rupees)</th>
                                <th>Stock</th>
                                <th>Total selled</th>
                                <th>Rating</th>
                                <th>Action</th>
                                <th>Action</th>
                                <th>Action</th>
                              
                              </tr>
                              
                              <tr class="border-bottom align-self-center text-center">
                                <td><div class="d-flex align-items-center">
                                    <img src="{{ URL::to('/') }}/Images/products/t1.webp" class="img mx-2 align-text-center" alt="profile" height="70px" width="70px"></div></td>
                                <td>1</td>
                                <td class="text-center">Harmis</td>
                                <td>500</td>
                                <td>20</td>
                                <td>50</td>
                                <td>5</td>
                                <td><button type="button" class="btn btn-info">Add or Delete</button></td>
                             
                              </tr>


                              

                              
                    

                              
         
                            </table>
                          </div>
                          

                       
                    </div> 
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="{{ URL::to('/') }}/generate_report" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!--  (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Products Selled (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countProducts }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success h-100 ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Mangas Selled (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countMangas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Yearly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info h-100 ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products in stock
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $stock }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning h-100 ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Reviews</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countReviews }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
                        {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
                    </div>


                    <!-- Card Body -->
                    <div class="card-body">


                        <div class="container-fluid">

                            @foreach ($order as $data)
                                
                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <h6 class="text-white mb-0">{{ $data->name }}</h6>
                                </div>
                                <div class="col-md-5 col-lg-5 col-xl-5">

                                    <h6 class="text-white mb-0">{{ $data->item_name }}</h6>
                                </div>

                                <div class="col-md-3 col-lg-3 col-xl-3 ">
                                    <h6 class="mb-0 price text-white">₹ {{ $data->amount }}</h6>
                                </div>

                            </div>

                            <hr class="my-4 bg-light">
                            @endforeach
                           

                          
                        </div>


                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Top Products</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">


                        <div class="container">

                            @foreach ($product as $data)
                                
                           
                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <img src="{{ URL::to('/') }}/Images/products/{{ $data->pic }}" class="img-fluid rounded-3"
                                        alt="Cotton T-shirt" height="50px" width="60px" />
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4">

                                    <h6 class="text-white mb-0">{{ $data->product_name }}</h6>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4 ">
                                    <h6 class="mb-0 price text-white">₹ {{ $data->price }}</h6>
                                </div>

                            </div>

                            <hr class="my-2" />


                            @endforeach



                        

                         



                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">   
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Recent Reviews</h6>

                    </div>


                    <!-- Card Body -->
                    <div class="card-body container-fluid">



                        <div class="list-group">


                            {{-- Entry 1 --}}
                            @foreach ($review as $data)
                                
                            
                            
                            <div class="list-group-item">

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="d-flex w-70 justify-content-left px-1 align-self-center">
                                        <img src="{{ URL::to('/') }}/Images/profile/{{ $data->pic }}"
                                        class="img mx-2 align-text-center review-profile" alt="profile"
                                        height="50px" width="50px">
                                        
                                        <h5 class="mb-1 align-self-center">{{ $data->user }}</h5>
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

                                <p class="mb-2 mx-5 px-4"> {{ $data->review}}</p>
                            </div>

                            @endforeach



           

                        </div>





                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Top Manga</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">


                        <div class="container">

                            @foreach ($manga as $data)
                                
                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                <div class="col-md-4 col-lg-4 col-xl-4">
                                    <img src="{{ URL::to('/') }}/Images/manga/{{ $data->pic }}" class="img-fluid rounded-3"
                                        alt="Cotton T-shirt" height="70px" width="60px" />
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4">

                                    <h6 class="text-white mb-0">{{ $data->manga_name }}</h6>
                                </div>

                                <div class="col-md-4 col-lg-4 col-xl-4 ">
                                    <h6 class="mb-0 price text-white">₹ {{ $data->price }}</h6>
                                </div>

                            </div>

                            <hr class="my-2" />

                            @endforeach


                 



                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection

@extends('master_view')
@section('content')

    <head>
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/admin_css/admin_header.css">
    </head>

    <section class="py-5 d-flex justify-content-center">
        <div class="container">
            <form action="{{ URL::to('/') }}/update_profile" method="POST" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 mb-4">


                        <div class="card shadow-0 border text-white">
                            
                            <div class="p-4">
                                <h4 class="card-title mb-3">Change Profile</h4>
                                <hr class="my-2" />
                              
                                <div class="row">
                                 

                                    <div class="col-lg-4 col-md-12  justify-content-center">
                                        <p class="mb-0">Image</p>
                                        <img src="{{ URL::to('/') }}/Images/profile/{{ $result['pic'] }}" class="img img-fluid" alt="profile" height="200px" width="200px" />
                                   
                                        
                                    </div>

                 


                                    <div class="col-lg-6 col-md-12 mb-3 py-5">
                                     
                                        <p class="mb-0">Profile</p>
                                        <div class="form-outline border rounded-3 shadow-0">
                                            <input type="file" name="pic"
                                                class="form-control" />
                                        </div>
                                        <span class="error">
                                            @error('pic')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>







                                    <div class="justify-content-center d-flex">
                                        <button type="submit" class="btn btn-success shadow-0 border ">Update
                                            Profile</button>
                                        <a href="{{ URL::to('/') }}/user_profile" class="btn btn-secondary shadow-0 border mx-2">Cancel</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
            </form>
        </div>
    </section>
@endsection

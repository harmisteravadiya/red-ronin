@extends('master_view')
@section('content')
<section class="img-fluid" style="background-size:cover; justify-content:center;background-image:url('Images/night.png');">
    <div class="container py-5 h-100 register">
      <div class="row justify-content-center align-items-center h-100">
        
        <div class="col-7 col-lg-7 col-xl-7">
          <div class="card shadow-2-strong" style="background: rgba(41, 39, 39, 0.896)" >
            <div class="card-body p-4 p-md-5  align-items-center cursor-pointer">
                <div class="d-flex justify-content-center ">
                    <h2 class="text-white mx-2">Activate Your Account</h2>
                </div>
                
         <div class="d-flex justify-content-center py-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="35" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                  </svg> <h4 class="text-white mx-3">Check your Mail To Activate Your Account</h4>
                </div>

                <div class="d-flex justify-content-center">

                    <a class="btn btn-success border-none shadow-none" href="https://mail.google.com/mail/u/0/#inbox">Go to Gmail</a>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>

   
  </section>   

@endsection
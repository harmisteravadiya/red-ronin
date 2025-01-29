@extends('admin_layout')
@section('admin_content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/admin_css/admin_header.css">

</head>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-white">Requests ({{ $count }})</h1>
         
        </div>

    


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" id="search" class="form-control  border-0 small" placeholder="Search for..."
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


                        <div style="overflow-x:auto ;" >
                            <table class="text-white table table-borderless align-self-center" >
                            <tr class="border-bottom ">
                               
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Action</th>
                            
                            </tr>
                            <tbody class="alldata">
                                @foreach ($result as $data)
                                    
                                
                            <tr class="border-bottom align-self-center text-center">
                                <td class="text-center">{{ $data['name'] }}</td>
                                <td>{{ $data['email'] }}</td>
                                <td>{{ $data['mobile'] }}</td>
                                <td>{{ $data['message'] }}</td>
                                <td>{{ $data['status'] }}</td>
                                <td>@if ($data['status']=="Pending")
                                    <a href="{{ URL::to('/') }}/answer_request/{{ $data['request_id'] }}"><button type="button" class="btn btn-primary">Answer</button></a>
                                @else
                                <a href="{{ URL::to('/') }}/pending_request/{{ $data['request_id'] }}"><button type="button" class="btn btn-secondary">Pending</button></a>
                                @endif
                                    
                                    </td>
                                <td><a href="{{ URL::to('/') }}/delete_request/{{ $data['request_id'] }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                            
                            </tr>

                            @endforeach

                           
                        </tbody>
                            <tbody id="Content" class="searchdata"></tbody>
        
                            </table>
                           
                        </div>
                    

                    
                    </div> 
                    
                </div>
            </div>
           

        </div>

        <div class="row py-3 ">
            <div class="col-12 text-light ">
                {{ $result->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>


    <script>
    
    

      $('#search').on('keyup',function(){

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
url : '{{URL::to('search_request')}}',
data:{'search':$value},
success:function(data){
$('#Content').html(data);
}
});
})
    </script>

@endsection

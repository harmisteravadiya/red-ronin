@extends('admin_layout')
@section('admin_content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/admin_header.css">
</head>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reviews ({{ $count }})</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-add fa-sm text-white-50"></i>Add Users</a> --}}
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


                        <div style="overflow-x:auto;" class="justify-content-center align-self-center">
                            <table class="text-white table table-borderless " >
                              <tr class="border-bottom">
                                <th class="text-center">Product</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Review</th>
                                <th class="text-center">Action</th>
                              
                              </tr>
                              <tbody class="alldata">
                                @foreach ($result as $data)
                                    
                              <tr class="border-bottom align-self-center text-center">
                                <td><div class="d-flex align-items-center">
                                    @if ($data['manga_id']==0)
                                    <img src="{{ URL::to('/') }}/Images/products/{{ $data['pic'] }}" class="img mx-2 align-text-center" alt="profile" height="90px" width="90px"></div></td>
                                        
                                    @else
                                    <img src="{{ URL::to('/') }}/Images/manga/{{ $data['pic'] }}" class="img mx-2 align-text-center" alt="profile" height="120px" width="90px"></div></td>
                                        
                                    @endif
                                    <td class="text-center">@if ($data['manga_name']=="")
                                        {{ $data['product_name'] }}
                                    @else
                                        {{ $data['manga_name'] }}
                                    @endif</td>
                                
                                <td>{{ $data['user'] }}</td>
                                <td>{{ $data['rating'] }}</td>
                                <td class="text-center">{{ $data['review'] }}</td>

                                <td><a href="{{ URL::to('/') }}/delete_review/{{ $data['review_id'] }}"><button type="button" class="btn btn-danger">Delete</button></td></a>
                             
                              </tr>
                              @endforeach

                              </tbody>


                      
                              <tbody class="searchdata" id="Content"></tbody>
                      
                            

                           
                              
         
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
            url : '{{URL::to('search_review')}}',
            data:{'search':$value},
            success:function(data){
            $('#Content').html(data);
            }
            });
            })
                    </script>
            
    
@endsection

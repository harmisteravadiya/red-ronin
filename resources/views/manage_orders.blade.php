@extends('admin_layout')
@section('admin_content')
<head><link rel="stylesheet" href="{{ URL::to('/') }}/admin_header.css">

</head>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products ({{ $total }})</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-add fa-sm text-white-50"></i>Add Products</a> --}}
        </div>

        <div class="row">
            

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control  border-0 small" id="search" placeholder="Search for..."
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
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Items</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Amount (Rupees)</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Devilery Status</th>
                                <th class="text-center">Action</th>
                                {{-- <th>Action</th> --}}
                                <th>Action</th>
                              
                              </tr>
                              
                              <tbody class="alldata">
                               @foreach ($result as $data)
                                  
                              
                              <tr class="border-bottom align-self-center text-center">
                                <td>{{ $data->order_id }}</td>
                                <td>{{ $data->item_name }}</td>
                                <td class="text-center">{{ $data->name }}</td>
                                <td>{{ $data->amount }}</td>    
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->payment_status }}</td>
                                <td>{{ $data->delivery_status }}</td>
                       <td>
                                @if ($data->delivery_status=="Not delivered")
                                <a href="{{ URL::to('/') }}/delivered/{{ $data->order_id }}"><button type="button" class="btn btn-primary">Complete</button></a>
                            @else
                            <a href="{{ URL::to('/') }}/pending/{{ $data->order_id }}"><button type="button" class="btn btn-secondary">Pending</button></a>
                            @endif
                                
                                </td>
                            <td><a href="{{ URL::to('/') }}/delete_order/{{ $data->order_id }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                         
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
            url : '{{URL::to('search_order')}}',
            data:{'search':$value},
            success:function(data){
            $('#Content').html(data);
            }
            });
            })
                    </script>
@endsection

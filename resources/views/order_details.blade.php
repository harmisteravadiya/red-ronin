<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body style="justify-content: center" >

  <h2>Hello {{ $data['name'] }} your order has been placed, Kindly check your order details</h2>
  <br>
  <table border="1px">
    <tr>
      <th>Item Name</th>
      <th>Item Quantity</th>
      <th>Item Price</th>

    </tr>

    @foreach ($data['item'] as $item)
    @if ($item->manga_id !=0)
    <tr>    
    <td>
      {{ $item->manga_name }}
    </td>
    <td>
      {{ $item->quantity }} 
    </td>    
   
    <td>
      {{ $item->price }} 
    </td>    
    </tr>
    @endif


    @if ($item->product_id !=0)
    <tr>    
    <td>
      {{ $item->product_name }}
    </td>
    <td>
      {{ $item->quantity }} 
    </td>    
    <td>
      {{ $item->price }} 
    </td>
    </tr>
    @endif
    @endforeach 


    <tr>
      <td>Total Price</td>
      <td>{{ $data['total'] }}</td></tr>
  </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div style="background: rgb(41, 39, 39);height:50px;">
            <b>
            <p class="align-self-center p-2 mx-3" style="color: rgba(255, 0, 0, 0.892);font-size:20px;align-self:center;margin-left:30px">Invoice</p></b>
        </div>

        <div class="d-flex mb-3 " style="display:flex;justify-content:space-between">
            <div class="me-auto p-2" style="margin: auto;">
                <b><h3>Order Details</h3></b>
                <p>Order number : {{ $order->order_id }}  <br>
                    Order date : {{ $order->date }}<br>
                </p>
            </div>
            <div class="p-2 text-end" style="text:end;">
                <b><h3>Buyer Detail</h3></b>
                <p>{{ $order->name }} <br>
                    Email : {{ $order->date }}<br>
                    Mobile no : {{ $order->mobile }} 
                </p>
            </div>
          </div>
    
    <div class="d-flex" style="display:flex;justify-content:space-between">
        <div class="me-auto p-2" style="margin: auto;">
            <b><h3>Sold By</h3></b>
            <p>Red Ronin Private Ltd, <br>
                Building no 1, Railway station road,<br>
                Village - Chital , District - Amreli,<br>
                State - Gujrat
            </p>
        </div>
        <div class="text-end" style="text:end;">
            <b ><h3 >Shipping Address</h3></b>
            <p>{{ $order->name }} <br>
                {{ $order->address }}<br>
                Pincode : {{ $order->pincode }}
            </p>

        </div>
      </div>

      <div>
        <h3>Description</h3>

        <table class="table" border="2px" style="width:100%";>
                <tr>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            <tbody>
             <tr>
                <td>{{ $order->item_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->amount }}</td>
            </tr>
             
            </tbody>
            
          </table>
      </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>
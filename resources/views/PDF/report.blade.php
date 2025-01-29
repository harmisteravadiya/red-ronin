<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
    <style type="text/css">
        .second{
            background:rgb(0, 0, 0) ;
            height: 90px;
            width: 450px;
            
        }
       
        .head-text{
            font-size: 12px;
            color: rgb(255, 0, 0);
        }
       
        .date{
            margin-left: 500px;
            margin-top: -70px;
                font-size: 20px;
        }
        .body{
            font-size: 20px;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    
    <div class="head">
        <div class="second">
            <div class="head-text">
                <h1 style="padding:20px 0px; margin-left: 180px">Monthly Sales Report</h1>
            </div>
            
        </div>
        <div class="date">
            <p>{{ $data['date'] }}</p>
        </div>
    </div>
    <br>
    <div class="body">
        <p>Total Items Selled</p>
        <p style="margin-left: 300px;margin-top: -40px;">{{ $data['product_sell'] }}</p>
        <div>
            <p style="margin-top: -20px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="margin-top: -40px; margin-left: 450px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="height: 2px; width: 550px; background-color: rgb(153, 153, 153)"></p>
        </div>
    </div>

    {{-- <div class="body">
        <p>Total Manga Selled</p>
        <p style="margin-left: 450px;margin-top: -40px;">{{ $data['manga_sell'] }}</p>
        <div>
            <p style="margin-top: -20px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="margin-top: -40px; margin-left: 450px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="height: 2px; width: 550px; background-color: rgb(153, 153, 153)"></p>
        </div>
    </div> --}}

    <div class="body">
        <p>Total Products in Stock</p>
        <p style="margin-left: 300px;margin-top: -40px;">{{ $data['stock'] }}</p>
        <div>
            <p style="margin-top: -20px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="margin-top: -40px; margin-left: 450px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="height: 2px; width: 550px; background-color: rgb(153, 153, 153)"></p>
        </div>
    </div>


    <div class="body">
        <p>Top Product</p>
        <p style="margin-left: 300px;margin-top: -40px;">{{ $data['product']->product_name }}</p>
        <div>
            <p style="margin-top: -20px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="margin-top: -40px; margin-left: 450px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="height: 2px; width: 550px; background-color: rgb(153, 153, 153)"></p>

        </div>
    </div>

    <div class="body">
        <p>Top Manga</p>
        <p style="margin-left: 300px;margin-top: -40px;">{{ $data['manga']->manga_name }}</p>
        <div>
            <p style="margin-top: -20px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="margin-top: -40px; margin-left: 450px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="height: 2px; width: 550px; background-color: rgb(153, 153, 153)"></p>

        </div>
    </div>

    <div class="body">
        <p>Total Monthly Earnings</p>
        <p style="margin-left: 300px;margin-top: -40px;">{{ $data['earning'] }} Rupees</p>
        <div>
            <p style="margin-top: -20px; color:rgba(94, 94, 94, 0.823);"></p>
            <p style="margin-top: -40px; margin-left: 450px; color:rgba(94, 94, 94, 0.823);"></p>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>
@extends('layouts.navbarProducts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="Shopping_cart.css">
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">

    <style>
        .cart-info {
            display: flex;
            flex-wrap: wrap;
        }



        table {
            width: 100%;
        }

        the td {
            padding: 10px 5px;
            font-weight: 500;
        }

        td input {
            width: 50px;
            height: 30px;
            padding: 5px;
        }

        td a {
            color: white;
            background-color: rgb(3, 3, 142);
            font-weight: bolder;
            border: 3px;
            border-radius: 3px;
            border-color: black;
            border-width: 4px;
            font-size: 12px;
        }

        td img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }

        small {
            font-weight: 900;
        }

        .total-price {
            display: flex;
            justify-content: flex-end;
        }

        .total-price table {
            width: 100%;
            max-width: 400px;
        }

        td:last-child {
            text-align: right;
        }

        th:last-child {
            text-align: right;
        }
    </style>
</head>

<body>
    @section('content')

    <div class="container" style="margin-bottom:3%;">
        <div class="row">
            <h1 class="products-heading" style="color: black; font-size: 60px;font-family: 'Macondo', sans-serif;text-align: center;padding-top: 3%;margin-bottom: 3%;">Shopping Cart:</h1>
            <div class="small-container col-md-12 col-lg-7 col-sm-12 col-12" style="padding: 7px; margin: 10px auto;  border-collapse: collapse; float: left; border: 1.5px solid rgb(216, 212, 212); border-radius: 2%;overflow-x: hidden;
        overflow-y: auto;height:100%; display: flex; flex: right;">
                @php $total=0;$quantity =1;$tax=0; @endphp
                <table class="cartpage" style="border-radius: 15px;text-align: left;padding: 5px;color: black;font-weight: normal;border:1px solid cyan">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
            
                    @foreach ($products as $product)

                    <tr >
                        <td></td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['category']}}</td>
                        <td>{{$product['salePrice']}}</td>
                        <td style="width:20%">
                            <form action="updateCart" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$product['id']}}">
                                <input type="number" name="quantity" value="{{$product['quantity']}}" min="1" max="5">
                                <input type="submit" name="button-update" value="update" style="background-color:lightgreen;padding:2%;padding-right:5%;border-radius:5px;">
                            </form>
                        </td>
                        <td style="margin-right: 15%;"><a type="button" href="/removecart/{{$product['id']}}" value="remove" style="background-color:red;padding:10px;border-radius:5px;">Remove</a></td>

                    </tr>
                    @php $total +=$product['salePrice']*$product['quantity']; 

                    @endphp
                    @endforeach


                </table>

            </div>
            <div class="small-container col-md-4 offset-lg-1 col-lg-4 col-sm-12 col-12" id="coupon" style="padding: 7px; margin: 10px auto; overflow-x: hidden;
        overflow-y: auto;height:43vh; display: flex; flex: right; border: 1.5px solid rgb(216, 212, 212); border-radius: 2%;">
                <div class="row" style="margin: 5px;">
                    <p style="font-size: large; font-weight: 600; top: 100px;">Have Coupon?</p>
                    <input type="text" id="promocode" placeholder="Promo Code">
                    <button class="btn btn-primary" style="margin-top:15px;margin-bottom: 15px;">Apply</button>
                    <img class="col-6 col-sm-3" src="../Photos/Mastercard-Logo.png" alt="Mastercard-Logo">
                    <img class="col-6 col-sm-3" src="../Photos/Visa.png" alt="Visa-logo">
                    <img class="col-6 col-sm-3" src="../Photos/hbl.png" alt="Hbl-logo">
                    <img class="col-6 col-sm-3" src="../Photos/easypaisa.png" alt="Easypaisa-logo">
                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>Rs.{{$total }}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>Rs.{{$tax=$total*0.2 }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>

                                <td>Rs.{{$total+=$tax}} </td>
                            </tr>
                        </table>
                    </div>
                    <form action="ordernow" method="post">
                    @csrf
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="subtotal" value="{{$total}}">
                        <button type="submit" class="btn btn-success" style="text-align: center;width:100%">Pay {{$total}}</button> 
                    </form>
                </div>

            </div>
        </div>
    </div>

    <section class="content-section bg-primary text-white text-center" id="services">
        <div class="container px-4 px-lg-5">
            <div class="content-section-heading" style="padding-top:2%;">
                <h2 style="font-size: xxx-large; font-family: 'Allura', cursive;" class="mb-5">What We Offer</h2>
            </div>
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa fa-user" style="height: 50px;"></i></span>
                    <h4 style="font-size:xx-large"><strong>Account</strong></h4>
                    <p class="text-faded mb-0" style="font-size: large;">Track and Modify your orders,make a return and
                        manage your account here
                    </p>
                    <ul style="list-style-type:none;text-align: left;font-size: large;font-family: 'Josefin Sans', sans-serif;" class="listItems">
                        <li><a href="Profile.html" style="color:navajowhite;margin-left:6%;text-decoration: underline;">Profile></a>
                        </li>

                        <li><a href="userProfiling.html" style="color:navajowhite;margin-left:6%;text-decoration: underline;">Login></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa fa-cog"></i></span>
                    <h4 style="font-size:xx-large"><strong>Services</strong></h4>
                    <p style="font-size: large;" class="text-faded mb-0">Manage Your all Subscriptions with ease</p>
                    <ul style="list-style-type: none;text-align: left;font-size: large;font-family: 'Josefin Sans', sans-serif;" class="listItems">
                            <li><a href="" style="color:navajowhite;margin-left:6%;text-decoration: underline;">My
                                    Orders></a></li>
                            <li><a href="" style="color:navajowhite;margin-left:6%;text-decoration: underline;">Payments></a></li>
                        </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-md-0">
                    <span class="service-icon rounded-circle mx-auto mb-3"><i class="fa fa-cart-plus"></i></span>
                    <h4 style="font-size: xx-large;"><strong>Support</strong></h4>
                    <p style="font-size: large;">Have questions related to the products? Please let us know...</p>
                    <ul style="list-style-type: none;text-align: left;font-size: large;font-family: 'Josefin Sans', sans-serif;" class="listItems">
                        <li><a href="" style="color:navajowhite;margin-left:6%;text-decoration: underline;">About Us></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    </section>
    @include('layouts.footerAdmin')
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function Calculate(){
        let quantity= document.getElementById("quantity").value;
        let price= document.getElementById("price").value;
        let subtotal = quantity*price;
        document.getElementById("subtotal").value = subtotal;
        console.log(document.getElementById("subtotal").value);

        
    }
    </script>
</body>

</html>
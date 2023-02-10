@extends('layouts.navbarAdmin')
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
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" href="Shopping_cart.css"> -->
    <link rel="stylesheet" href="{{asset('Styles.css')}}">
    <link rel="stylesheet" href="{{asset ('css/app.css')}}">
    <style>
        .cart-info {
            display: flex;
            flex-wrap: wrap;
        }

        table {
            width: 100%;
        }

        td {
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
            <h1 class="products-heading" style="color: black; font-size: 60px;font-family: 'Macondo', sans-serif;text-align: center;padding-top: 3%;margin-bottom: 3%;">Orders:</h1>
            <div class="small-container col-md-12 col-lg-10 col-sm-12 col-12" style="padding: 7px; margin: 10px auto;  border-collapse: collapse; float: left; border: 1.5px solid rgb(216, 212, 212); border-radius: 2%;overflow-x: hidden;
        overflow-y: auto;height:43vh; display: flex; flex: right;">

                <table border="1px solid black" style="border-radius: 15px;text-align: left;padding: 5px;color: black;font-weight: normal;height:100%;">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Total Bill</th>
                            <th>Deliver</th>
            
                        </tr>
                    </thead>

                    @foreach ($products as $product)
                    @php $increment=0 @endphp
                    <tr>
                        <td>{{$product['id']}}</td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['subtotal']}}</td>
                        <td ><a type="button" href="/deliver/{{$product['id']}}" value="Deliver" style="background-color:green;padding:10px;border-radius:5px;">Deliver</a></td>
                        


                    </tr>
                    @endforeach
                </table>

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
                        <li><a href="Shopping_cart.html" style="color:navajowhite;margin-left:6%;text-decoration: underline;">My
                                Orders></a></li>
                        <li><a href="Shopping_cart.html" style="color:navajowhite;margin-left:6%;text-decoration: underline;">Payments></a></li>
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
</body>

</html>
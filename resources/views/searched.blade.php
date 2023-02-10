@extends('layouts.navbarProducts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouse Pad Content</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset ('keyboardContent.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
</head>

<body>
    @section('content')
    <section><div class="container" style="margin-top: 2%;margin-bottom: 2%;">
                <h1 class="products-heading" style="color: black; font-size: 60px;font-family: 'Macondo', sans-serif;">Result of Products Search: </h1>
                <div class="row" style="margin-left: 10px;">
                    @foreach ($products as $product)
                    <div class="product col col-sm-12 col-md-12 col-lg-5">  
                        <div class="product-content">
                            <div class="product-img">
                                <a href="details/{{$product['id']}}">
                                    <img src="/uploads/products/{{$product->image}}" alt="product image" style='height: 100%; width: 100%; object-fit: contain;border-radius:05%;'>
                                </a>
                            </div>
                            <div class="product-btns">
                            <form action="addtoCart" method="post">
                                @csrf
                                <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">    
                                <input type="hidden" name="products_id" value="{{$product['id']}}">    
                                <button class="btn-cart"> Add to Cart
                                    <span><i class="fa fa-plus"></i></span>
                                </button>
                            </form>
                                <button type="button" class="btn-buy"> Buy Now
                                    <span><i class="fa fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </div>

                        <div class="product-info">
                            <div class="product-info-top">
                                <h2 class="sm-title">Headset</h2>
                              
                            </div>
                            <h4 class="product-name">{{$product['name']}}</h4>
                            <p class="product-price">{{$product['originalPrice']}}</p>
                            <p class="product-price">{{$product['salePrice']}}</p>
                        </div>

                        <div class="off-info">
                            <h2 class="sm-title">25% off</h2>
                        </div>

                    </div>
                    @endforeach
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



</body>

</html>
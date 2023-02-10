@extends('layouts.navbarProducts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouse Pad Content</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('home.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body>


@section('content')

    



    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../images/headset.jpg" alt="First slide">
                
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../images/keyboard.jpg" alt="Second slide">
                
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../images/mouse.jpg" alt="Third slide">
                
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../images/mousePad.png" alt="Fourth slide">
                
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> <!-- Carousel-->

    <div class="product-items" style="background-color: aliceblue;">
        <!-- single product -->
        <div class="container">
            <h1 class="products-heading" style="padding-top:5%;color: black; font-size: 60px;font-family: 'Macondo', sans-serif;">Products:</h1>
            <div class="row" style="margin-left: 10px;">
                <div class="product col col-sm-12 col-md-12 col-lg-5">

                    <div class="product-content">
                        <div class="product-img">
                            <a href="keyboard">
                                <img src="../images/keyboard.jpg" alt="product image" style='height: 100%; width: 100%; object-fit: contain'>
                            </a>
                        </div>


                    </div>

                    <div class="product-info">
                        <div class="product-info-top">
                            <h2 class="sm-title">Keyboard</h2>
                        </div>
                    </div>
                </div>
                <div class="product col col-sm-12 col-md-12 col-lg-5">

                    <div class="product-content">
                        <div class="product-img" style="height: 100%;">
                            <a href="mouse">
                                <img src="../images/mouse.jpg" alt="product image" style='height: 100%; width: 100%; object-fit: contain'>
                            </a>
                        </div>

                    </div>

                    <div class="product-info">
                        <div class="product-info-top">
                            <h2 class="sm-title">Mouse</h2>
                        </div>
                    </div>
                </div>
                <div class="product col col-sm-12 col-md-12 col-lg-5">

                    <div class="product-content">
                        <div class="product-img">
                            <a href="headset">
                                <img src="../images/headset.jpg" alt="product image" style='height: 130%; width: 100%; object-fit: contain;margin-bottom:04%;'>
                            </a>
                        </div>

                    </div>

                    <div class="product-info">
                        <div class="product-info-top">
                            <h2 class="sm-title">Headset</h2>
                        </div>
                    </div>
                </div>
                <div class="product col col-sm-12 col-md-12 col-lg-5">

                    <div class="product-content">
                        <div class="product-img">
                            <a href="mousePad">
                                <img src="../images/mousePad.png" alt="product image" style='height: 100%; width: 100%; object-fit: contain'>
                            </a>
                        </div>

                    </div>

                    <div class="product-info">
                        <div class="product-info-top">
                            <h2 class="sm-title">Mouse Pad</h2>
                        </div>
                    </div>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>

</html>
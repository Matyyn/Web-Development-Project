@extends('layouts.navbarProducts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset ('home.css')}}">
    <link rel="stylesheet" href="{{ asset ('checkout.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
    
</head>

<body>
    @section('content')
    <section>

    <div class="container mt-5 px-5">

<div class="mb-4" style="text-align:center">

    <h2>Confirm Order and Pay</h2>
    <span>please make the payment, after that you can enjoy all the features and benefits.</span>

</div>
<div id="Success" class="alert alert-success alert-dismissible fade" role="alert">
    <strong>Success!</strong> Your form has been submitted.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="row">

    <div class="col-12 col-sm-12 col-md-12 col-lg-12">


    <form action="check" method="post" id="checkOut">
        @csrf
        
    
            <div class="card p-3">

                <h6 class="text-uppercase">Payment details</h6>
                <div class="inputbox mt-3"> <input type="text" name="name" class="form-control" required="required" id="name" value="">
                    <span>Name on card</span>
                    <small id="nameValid" class="invalid-feedback">
                        Please Enter a valid Name it must be of 2 to 20 characters and doesnot start with Numbers.
                    </small>
                </div>


                <div class="row">

                    <div class="col-md-6">


                        <div class="inputbox mt-3 mr-2"> <input type="text" name="cardNumber" class="form-control" required="required"value="" id="card"> <i class="fa fa-credit-card"></i> <span>Card Number</span>
                            <small id="nameValid" class="invalid-feedback">
                                Please Enter a valid card number it must be of 2 to 20 characters and doesnot start with Numbers.
                            </small>

                        </div>


                    </div>

                    <div class="col-md-6">

                        <div class="d-flex flex-row">


                            <div class="inputbox mt-3 mr-2"> <input type="text" name="expiry" class="form-control" required="required" value=""id="expiry"> <span>Expiry</span>
                                <small id="nameValid" class="invalid-feedback">
                                    Please Enter a valid Expiry it must be of 2 to 20 characters and doesnot start with Numbers.
                                </small>
                            </div>

                            <div class="inputbox mt-3 mr-2"> <input type="text" name="cvv" class="form-control" required="required" id="cvv" value=""> <span>CVV</span>
                                <small id="nameValid" class="invalid-feedback">
                                    Please Enter a valid CVV it must be of 2 to 20 characters and doesnot start with Numbers.
                                </small>
                            </div>


                        </div>


                    </div>


                </div>



                <div class="mt-4 mb-4">

                    <h6 class="text-uppercase">Billing Address</h6>


                    <div class="row mt-3">

                        <div class="col-md-6">

                            <div class="inputbox mt-3 mr-2"> <input type="text" name="address" class="form-control" required="required" id="address" value=""> <span>Street Address</span>
                                <small id="nameValid" class="invalid-feedback">
                                    Please Enter a valid address it must be of 2 to 20 characters and doesnot start with Numbers.
                                </small>
                            </div>


                        </div>


                        <div class="col-md-6">

                            <div class="inputbox mt-3 mr-2"> <input type="text" name="city" class="form-control" required="required" id="city" value=""> <span>City</span>

                                <small id="nameValid" class="invalid-feedback">
                                    Please Enter a valid city name it must be of 2 to 20 characters and doesnot start with Numbers.
                                </small>
                            </div>


                        </div>




                    </div>


                    <div class="row mt-2">

                        <div class="col-md-6">

                            <div class="inputbox mt-3 mr-2"> <input type="text" name="state" class="form-control" required="required" id="state" value=""> <span>State/Province</span>
                                <small id="nameValid" class="invalid-feedback">
                                    Please Enter a valid state it must be of 2 to 20 characters and doesnot start with Numbers.
                                </small>
                            </div>


                        </div>


                        <div class="col-md-6">

                            <div class="inputbox mt-3 mr-2"> <input type="number" name="zipCode" class="form-control" required="required" id="zip" value=""> <span>Zip code</span>
                                <small id="nameValid" class="invalid-feedback">
                                    Please Enter a valid zip it must be of 2 to 20 characters and doesnot start with Numbers.
                                </small>
                            </div>


                        </div>


                    </div>

                </div>

            </div>


            <div class="mt-4 mb-4 d-flex justify-content-between">


                <a href="productList"><span>Previous step</span></a>
   
                    <button class="btn btn-success px-3" type="submit" id="payment">Pay</button>
                

               


            </div>
        </form>



    </div>

</div>
</div>	
       
    </section>
    
    @endsection



</body>
<script>

const Name = document.getElementById('name');
const Card = document.getElementById('card');
const Expiry = document.getElementById('expiry');
const CVV = document.getElementById('cvv');
const Street = document.getElementById('address');
const City = document.getElementById('city');
const State = document.getElementById('state');
const Zip = document.getElementById('zip');

Name.addEventListener('blur', (e) => {

    let regex = /^[a-zA-Z]([0-9a-zA-Z]){2,10}/
    let str = Name.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log('It Matched')
        Name.classList.add('is-valid')
    }
    else {
        console.log('It doesnot match')
        Name.classList.add('is-invalid')
    }
})
Card.addEventListener('blur', (e) => {
    
    

    let regex = /[0-9a-zA-Z]{2,20}/
    let str = Card.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log('It Matched')
        Card.classList.add('is-valid')
    }
    else {
        console.log('It doesnot match')
        Card.classList.add('is-invalid')
    }
})
Expiry.addEventListener('blur', (e) => {
    console.log("Expiry is blurred");
    // validate Expiry here

    let regex = /[0-9a-zA-Z]{2,20}/
    let str = Expiry.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log('It Matched')
        Expiry.classList.add('is-valid')
    }
    else {
        console.log('It doesnot match')
        Expiry.classList.add('is-invalid')
    }
})

CVV.addEventListener('blur', (e) => {
    console.log("CVV is blurred");
    // validate CVV here

    let regex = /[0-9a-zA-Z]{2,20}/
    let str = CVV.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log('It Matched')
        CVV.classList.add('is-valid')
    }
    else {
        console.log('It doesnot match')
        CVV.classList.add('is-invalid')
        e.preventDefault();
    }
})

Street.addEventListener('blur', (e) => {
    console.log("Street is blurred");
    // validate CVV here

    let regex = /[0-9a-zA-Z]{2,50}/
    let str = Street.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log('It Matched')
        Street.classList.add('is-valid')
    }
    else {
        console.log('It doesnot match')
        Street.classList.add('is-invalid')
        e.preventDefault();
    }
})

City.addEventListener('blur', (e) => {
    console.log("City is blurred");
    // validate CVV here

    let regex = /[0-9a-zA-Z]{2,20}/
    let str = City.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log('It Matched')
        City.classList.add('is-valid')
    }
    else {
        console.log('It doesnot match')
        City.classList.add('is-invalid')
        e.preventDefault();
    }
})

State.addEventListener('blur',()=>{
    console.log("State is blurred");
    // validate the name here
    
    let regex = /[0-9a-zA-Z]{2,20}/
    let str = State.value;
    console.log(regex,  str); 
    if(regex.test(str)){
        console.log('It Matched')
        State.classList.add('is-valid')
    }
    else{
        console.log('It doesnot match')
        State.classList.add('is-invalid')
    }
})
Zip.addEventListener('blur',()=>{
    console.log("Zip is blurred");
    // validate the name here
    
    let regex = /[0-9]{2,20}/
    let str = Zip.value;
    console.log(regex,  str); 
    if(regex.test(str)){
        console.log('It Matched')
        Zip.classList.add('is-valid')
    }
    else{
        console.log('It doesnot match')
        Zip.classList.add('is-invalid')
    }
})
const submit = document.getElementById('payment');
payment.addEventListener('click', (e) => {
    if ((Name.value == "" || Card.value == "" || Expiry.value == ""  || CVV.value == "" || Street.value == "" || City.value == ""|| State.value == ""|| Zip.value == "") ) {
        e.preventDefault();
        alert('All fields are not filled')
        
    }
    else {
        console.log('You have clicked One time')
        const success = document.getElementById('Success');
        success.classList.add('show');
        form = document.getElementById('checkOut');
        form.reset();
         location.href="home.html";
    }
})


</script>
</html>
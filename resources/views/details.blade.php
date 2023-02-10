@extends('layouts.navbarProducts')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mouse Pad Content</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <link rel="stylesheet" href="{{ asset ('Shopping_cart.css')}}">
    <link rel="stylesheet" href="{{ asset ('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset ('Shopping_cart.css')}}">


    
    <style>
        .divi {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 2px solid rgb(173, 171, 171);
            border-radius: 12px;
            padding: 5px;
            margin-bottom: 10px;
            background-color: white;
        }

        #btn {
            width: 25%;
            border-radius: 12px;
            margin-left: 5%;
            margin-top: 2.5%;
            margin-bottom: 2.5%;
        }

        .rev {
            border: 2px solid rgb(173, 171, 171);
            border-radius: 12px;
            padding: 5px;
            margin-top: 5px;
        }

        img {
            width: 100%;
            height: 100%;
            margin-right: 3%;
        }
    </style>
</head>

<body>
    @section('content')
    <section>

 
    <div class="container divi">
        <div class="row">
            <h1 class="products-heading"
                style="color: black; font-size: 60px;font-family: 'Macondo', sans-serif;text-align: center;padding-top: 3%;margin-bottom: 3%;">
                Product Details:</h1>
            <div class="container col-sm-12 col-md-4 col-lg-3">
                <img src="/uploads/products/{{$products->image}}" alt="Product Image" style="border-radius:15px;">
            </div>
            <div class="container col-sm-12 col-md-4 col-lg-4">
                <label for="name" style="font-weight: bolder;margin-left:05%;"> Name: </label>
                <h5 style="margin-left:07%;" name="name">{{$products['name']}}</h5>
                <label for="Price" style="font-weight: bolder;margin-left:05%;">Price: </label>
                <h6 style="margin-left:07%;" name="Price" > {{$products['salePrice']}}</h6>
                <strong>
                    <p style="margin-left: 20px;"> Quantity: 1</p>
                </strong>

                       
            </div>
            <div class="container col-12 col-sm-12 col-md-12 col-lg-4 col-lg-3 scroll" style="overflow: auto;width:31%;height: 30vh;margin-right: 2%;">
                <h2>Reviews</h2>
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-floating">
                            <h5 class="class-title">Enter Your Name</h5>
                            <textarea class="form-control" placeholder="Leave a comment here" id="addTitle"
                                style="margin-bottom: 2%;"></textarea>
                                <h5 class="card-title">Add Your Review</h5>
                                <textarea class="form-control" placeholder="Leave a comment here" id="addText"
                                style="margin-bottom: 2%;"></textarea>
                        </div>
                        <button class="btn btn-primary" onclick="add()" id="addBtn">Add</button>
                    </div>
                </div>
                <h4>Product Reviews</h4>
                <hr>
                <div id="Reviews" class="row container-fluid">
                    
                </div>
            </div>
        </div>
    </div>
    </section>
    @include('layouts.footerAdmin')
    @endsection
    

</body>
    <script>
        // user will enter Reviews from here to the local storage
let addbtn = document.getElementById('addBtn');

    function add(){
        let addTitle = document.getElementById("addTitle")
        let addTxt = document.getElementById("addText")
        let Reviewstitle = localStorage.getItem("Reviewstitle")
        let Reviews = localStorage.getItem("Reviews");
        if (Reviews == null) {
            ReviewsArray = [];
        }
        else {
            ReviewsArray = JSON.parse(Reviews);
        }
        let Obj = {
            title: addTitle.value,
            text: addTxt.value
        }
        ReviewsArray.push(Obj);
        localStorage.setItem("Reviews", JSON.stringify(ReviewsArray));
        addTxt.value = "";
        addTitle.value = "";
        console.log(ReviewsArray);
        showReviews();
    };

// function to display the Reviews

function showReviews() {
    let Reviews = localStorage.getItem('Reviews')
    if (Reviews == null) {
        ReviewsArray = [];
    }
    else {
        ReviewsArray = JSON.parse(Reviews);
    }
    let html = ""
    ReviewsArray.forEach(function (element, index) {
        html += `<div class="Reviewscard my-2 mx-2 card" style="width: 18rem;" value="0">
        <div class="card-body">
          <label for="card-title" style="font-size:20px;font-weight:bold;">Name:</label>
          <h5 class="card-title">${element.title}</h5>
          <label for="card-text" style="font-size:20px;font-weight:bold;">Review:</label>
          <p class="card-text">${element.text}</p>
          <button id = "${index}" onclick="deleteNote(this.id)" class="btn btn-primary">Delete</button>
         
        </div>
      </div>`
    });


    let ReviewsElement = document.getElementById('Reviews');
    if (ReviewsArray.length != 0) {
        ReviewsElement.innerHTML = html;
    }
    else {
        ReviewsElement.innerHTML = `<div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
          Nothing to show now . Add Reviews to show them!
        </div>
      </div>`
    }
}
function deleteNote(index) {
    console.log('this item with index', index, ' will be deleted')
    let Reviews = localStorage.getItem('Reviews')
    if (Reviews == null) {
        ReviewsArray = [];
    }
    else {
        ReviewsArray = JSON.parse(Reviews);
    }
    ReviewsArray.splice(index, 1);
    localStorage.setItem("Reviews", JSON.stringify(ReviewsArray));
    showReviews();
}

    </script>
</html>

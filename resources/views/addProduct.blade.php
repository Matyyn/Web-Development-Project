<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <link rel="stylesheet" href="{{asset('Styles.css')}}">
    <link rel="stylesheet" href="{{asset ('css/app.css')}}">
</head>

<body>
    <header class="row">
        @include('includes.header')
    </header>

  <div class="container mt-5 px-5">

    <div class="mb-4" style="text-align:center">

      <h2>Product Adding Form</h2>
      <hr>
      @if (session('status'))
      <h6 class="alert alert-success">{{session('status')}}</h6>
      @endif
    </div>

    <div class="row">

      <div class="col-12 col-sm-12 col-md-12 col-lg-12">


        <div class="card p-3">
          <form id="addProduct" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 class="text-uppercase">Product Details:</h4>

            <div class="inputbox mt-3"> <input type="text" name="name" class="form-control" required="required" value="">
              <span>Product Name:</span>
            </div>


            <div class="row">

              <div class="col-md-6">

                <div class="inputbox mt-3 mr-2"><select class="form-select" name="category" aria-label="Default select example" value="" width="30%">
                    <option value="Mouse">Mouse</option>
                    <option value="Keyboard">Keyboard</option>
                    <option value="Headset">Headset</option>
                    <option value="Mousepad">Mousepad</option>
                  </select><span>Category:</span>
                </div>
              </div>

              <div class="col-md-6">

                <div class="d-flex flex-row">

                  <div class="inputbox mt-3 mr-2"> <input type="text" name="originalPrice" class="form-control" required="required" value=""> <span>Original Price</span> </div>
                  <div class="inputbox mt-3 mr-2"> <input type="text" name="salePrice" class="form-control" required="required" value=""> <span>Sale Price</span> <input type="hidden" name="quantity" value="1"></div>

                </div>


              </div>


            </div>



            <div class="mt-4 mb-4">

              <h5 class="text-uppercase">Product Image:</h5>


              <div class="row mt-3">

                <div class="col-md-6">

                  <input id="picture" type="file" name="picture" maxlength="300" size="300">

                </div>

              </div>

            </div>

        </div>


        <div class="mt-4 mb-4    ">
          <button class="btn btn-success px-3" type="submit" style="float:right;">Submit</button>

        </div>
        </form> <!-- form ends here -->
        <br><br>
        <table id="admin-table" class="table table-hover">
          <thead>
            <tr>
            <th>ID</th>
              <th>Name</th>
              <th>Original Price</th>
              <th>Sale Price</th>
              <th>Category</th>
              <th>Image</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody id="admin-body">

          </tbody>
        </table>
      </div>

    </div>

    <hr>
  </div>
  


  <script src="{{ asset ('js/getproducts.js')}"></script>
   <!-- Use -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Instead of -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  @include('layouts.footerAdmin')
  
</body>
<script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(document).ready(function() {
      $(document).on('submit', '#addProduct', function(e) {

        let formData = new FormData($('#addProduct')[0]);
        $.ajax({
          type: "POST",
          url: "  addProduct",
          data: formData,
          contentType: false,
          processData: false,

        });

      });
    });

    var atBody = $('#admin-table tbody')
    atBody.addEventListener("load", loadAdmins())

    function htmlAdminRow(userID,name, category, originalPrice, salePrice, image) {
      var row = `<tr>
      <td>${userID}</td>
    <td>${name}</td>
    
    <td>${originalPrice}</td>
    <td>${salePrice}</td>
    <td>${category}</td>
    <td><img src="${image}"></img></td> `;
    row+=
    `<td>
        <div class = "d-flex">
        
            <button type="button" onclick= "deleteAdmin(${userID})" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Delete User">
                Delete
            </button>
        </div>
        </td>
    </tr>`;
      return row;
    }


    function loadAdmins() {
      const xhr = new XMLHttpRequest();

      xhr.open('GET', '/get-products', true);

      xhr.onload = function() {
        var adminList = JSON.parse(this.responseText);
        tbodyInnerHTML = "";
        for (key in adminList) {
          products = adminList[key];
          adminRow = htmlAdminRow(products.id,products.name,products.category,products.originalPrice,products.salePrice,products.image);
          tbodyInnerHTML += adminRow;
        }
        atBody.html(tbodyInnerHTML);
      }

      xhr.send();
    }
    $.ajaxSetup({
         headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });
    function deleteAdmin(adminID){
    let url = '/delete-admin';
    
    $.ajax({
        url: url,
        type:"POST",
        dataType: 'json',
        data:{
            adminID: adminID
        },
        success:function(response){
            loadAdmins();
        },
        error: function (data) {
           alert('Unable to Delete Product, An Error Occur');
           console.log(data);
        }
    });
}

  </script>
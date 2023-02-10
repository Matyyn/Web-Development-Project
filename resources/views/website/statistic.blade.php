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
    <div class="container" >
        <div class="row" style="background-color:aliceblue">
            <div class=" col-12 col-sm-10 col-md-10 col-lg-12">
                <h1 style="text-align: center; color: #5c68b0;">Store Stocks</h1>
                <div class="row justify-content-center">
                    <div style="background-color:lightgreen; border-radius: 15px;"
                        class="card text-black my-3 mx-5 col-lg-3 col-md-6 col-xs-12">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title">Keyboard</h4>
                            </div>
                            <div class="text-center">
                                <h1 style="font-size:4em;" class="card-title py-2" id="Keyboard">{{$count2}}</h1>
                            </div>
                        </div>
                    </div>

                    <div style="background-color: lightcoral; border-radius: 15px;"
                        class="card text-black my-3 col-lg-3 col-md-6 col-xs-12">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title">Mouse</h4>
                            </div>
                            <div class="text-center">
                                <h1 style="font-size:4em;" class="card-title py-2" id="Mouse">{{$count3}}</h1>
                            </div>
                        </div>
                    </div>

                    <div style="background-color: cyan; border-radius: 15px;"
                        class="card text-black my-3 mx-5 col-lg-3 col-md-6 col-xs-12">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title">MousePads</h4>
                            </div>
                            <div class="text-center">
                                <h1 style="font-size:4em;" class="card-title py-2" id="MousePads">{{$count4}}</h1>
                            </div>
                        </div>
                    </div>

                    <div style="background-color: #63acaf; border-radius: 15px;"
                        class="card text-black my-4 mx-4 col-lg-3 col-md-6 col-sm-12">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="card-title">Headsets</h4>
                            </div>
                            <div class="text-center">
                                <h1 style="font-size:4em;" class="card-title py-2" id="Headsets">{{$count1}}</h1>
                            </div>
                        </div>
                    </div>
            </div>
            <canvas class="container" id="myChart" style="width:100%;max-width: 800px;margin-bottom: 2%;"></canvas>
        </div>
        <p style="display:none" id="ty1">{{ $count1 }}</p>
        <p style="display:none" id="ty2">{{ $count2 }}</p>
        <p style="display:none" id="ty3">{{ $count3 }}</p>
        <p style="display:none" id="ty4">{{ $count4 }}</p>
    </div>
    </div>  
    <footer>
        @include('includes.footer')
    </footer> 
    <script>
        var Headsets = document.getElementById("ty1").innerText;
        var Keyboards = document.getElementById("ty2").innerText;
        var Mouse = document.getElementById("ty3").innerText;
        var Pad = document.getElementById("ty4").innerText;
        var xValues = ["Gaming Headsets", "Gaming Keyboards", "Gaming Mouse", "Mouse Pads"];
        var yValues = [Headsets, Keyboards, Mouse, Pad];

        var barColors = ["lightgreen", "lightcoral", "cyan", "#63acaf"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "Total Sale this Month"
                }
            }
        });
    </script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
crossorigin="anonymous"></script>

</body>

</html>
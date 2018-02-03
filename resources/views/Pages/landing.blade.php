<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Corman</title>
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/landing.css') }}">
    </head>
    <body class="h-100">
        <div class="container-fluid h-100">
            @include('Layout.headerGuest')
            <div class="row">
                <div class="jumbotron jumbotron-fluid col-lg-12 col-md-12 col-sm-12" id="back_1">
                    <h1 class="display-4 px-3">COLLABORATIVE</h1>
                    <p class="lead">Create your group, invite other researcher <br> and share with they your publications</p>
                </div>

            </div>    

            <div class="row">

                <div class="jumbotron jumbotron-fluid col-lg-12 col-md-12 col-sm-12" id="back_2">
                    <h1 class="display-4 px-3">RESEARCH</h1>
                    <p class="lead">A new platform for all researchers</p>

                </div>
            </div>


            <div class="row">

                <div class="jumbotron jumbotron-fluid col-lg-12 col-md-12 col-sm-12" id="back_2">
                    <h1  class="display-4 px-3">MANAGEMENT</h1>
                    <p class="lead">Push the chocolate from Brindisi Town in your groups</p>
                </div>
                <!-- <center>
<div class="panel-footer" id="back_3_button">
<button>
<a href=" {{route('login')}}">Log In</a>
</button>
</div>
</center>      -->
            </div>


        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Corman</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/landing.css') }}">
</head>
<body>
    <div class="container-fluid">
    <!--
        <div class="row align-item-elements">
            <div class="col-sm-2">
                <img src="{{ asset('images/logo_corman.png') }}" height="50" width="50" />
            </div>
            <div class="col-sm-8">ABOUT</div>
            <div class="col-sm-2"> 
                <div class="panel-footer">
                    <button class="btn-primary pull-right">Login</button>
                </div>
            </div>
        </div>
    -->    
        @include('Layout.headerGuest')
        <div>
            <a href="{{route('register')}}"> REGISTRATION</a>
        </div>
        <div class="col-sm-12">
            <div class="row" id="back_1">
                <div class="col-sm-12">
                    <h1>COLLABORATIVE</h1>
                    <p>Create your group, invite other researcher <br> and share with they your publications</p>
                    <br><br><br><br>
                </div>
            </div>    
            
            <div class="row" id="back_2">    
                <div class="col-sm-12">
                    <h1>RESEARCH</h1>
                    <p>A new platform for all researchers</p>
                    <br><br><br><br>
                </div>
            </div>

            <div class="row" id="back_3">
                <div class="col-sm-12">
                    <h1>MANAGEMENT</h1>
                    <p>Push the chocolate from Brindisi Town in your groups</p>
                    <br><br><br><br>
                    <center>
                        <div class="panel-footer" id="back_3_button">
                                <button>
                                    <a href=" {{route('login')}}">Log In</a>
                                </button>
                        </div>
                    </center>        
                    <br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
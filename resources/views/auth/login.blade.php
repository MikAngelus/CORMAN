<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CORMAN - Login</title>
        <link rel="stylesheet" href="{{ url('css/User/login.css') }}">
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row" id="logo">
                <div class="img-div col-lg-2"><img class="img-logo" src="{{ asset('images/logo_corman.png') }}" height="75" width="75"/></div>
                <div class="description col-lg-2">
                    <p class="lead">COLLABORATIVE</p>
                    <p class="lead">RESEARCH</p>
                    <p class="lead">MANAGEMENT</p>
                </div>
            </div>
            <!-- MultiStep Form -->
            <div class="row">
                <div id="loginBox" class="col-xl-5 col-lg-6 col-md-8 col-sm-12">
                    <form id="msform" action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                        {{ method_field('POST') }}
                        {{csrf_field()}}

                        <!-- fieldsets -->
                        <fieldset>
                            <h2 class="fs-title">LOGIN</h2>
                            <input type="email" name="email" placeholder="Your e-mail" required >
                            <input type="password" name="password" placeholder="Password" required>
                            <input class="mb-3" type="submit" name="login" value="Login">
                            <div class="checkbox">
                                <label>Remember me
                                    <input type="checkbox">
                                </label>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

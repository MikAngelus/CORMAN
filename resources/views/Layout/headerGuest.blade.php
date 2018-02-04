<link rel="stylesheet" href="{{ url('css/landing_header.css') }}">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="{{ asset('images/logo_corman.png') }}" height="50" width="50"/>
    <a class="navbar-brand ml-3" href="#">CORMAN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link text-center" href="#">How it works<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="#">Features</a>
            </li>
        </ul>
        <a href="{{ url('signUp') }}"><button class="btn btn-success">Join Us</button></a>
        <a href=" {{ url('login') }} ")><button class="btn btn-primary ml-2">Log In</button></a>
    </div>
</nav>

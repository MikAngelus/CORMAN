<nav class="navbar navbar-dark bg-white navbar-expand-lg navbar-expand-xl">
    <!-- Navbar content -->
    <a id="brand" class="navbar-brand order-1 order-xl-1 order-lg-1 order-md-1 order-sm-1 col-lg-4 col-md-3 col-sm-8 col-8 col-xl-4">CORMAN</a>
    <form class="form-inline order-lg-2 order-md-2 order-sm-3 order-3 my-2 my-lg-0 col-lg-6 col-md-7 col-sm-12 col-xl-6">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button id="searchBox" class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button id="buttonMenu" class="navbar-toggler order-sm-2 order-2" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="order-lg-3 order-md-3 order-sm-2 col-sm-4 collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a id="menuIcon" class="nav-item nav-link fa fa-user-circle fa-2x" href="{{ route('users.edit', ['id'=>Auth::user()->id]) }}"><span class="sr-only">(current)</span></a>
            <i id="menuIcon" class="nav-item nav-link fa fa-bell fa-2x" data-toggle="modal" data-target="#exampleModalLong"></i>
            <!-- Hack for laravel due to HTTP post type request-->
            <a id="menuIcon" class="nav-item nav-link fa fa-sign-out fa-2x" href="{{route('logout')}}"
            onclick = "event.preventDefault();
                        document.getElementById('logout-form').submit()"></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</nav>
<nav label="breadcrumb" class="col-lg-12">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
</nav>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLongTitle">Test Notifiche</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">  
          @include('Pages.notification')
        </div>
      </div>
    </div>
  </div>
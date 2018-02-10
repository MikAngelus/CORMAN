
 <nav id="header" class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 fixed-header navbar navbar-dark bg-white navbar-expand-lg navbar-expand-xl">
    <!-- Navbar content -->
     <div class="brand-div col-lg-4 col-md-4 col-sm-8 col-8 col-xl-4"><img src="{{ asset('images/logo_corman.png') }}" height="50" width="50"/><a id="brand"
       class="navbar-brand order-1 order-xl-1 order-lg-1 order-md-1 order-sm-1 col-lg-3 col-md-3 col-sm-8 col-8 col-xl-4">CORMAN</a></div>
   <form class="form-inline order-lg-2 order-md-2 order-sm-3 order-3 my-2 my-lg-0 col-lg-5 col-md-6 col-sm-12 col-xl-5">
        <input class="form-control mr-sm-2 col-xl-8 col-lg-8 col-md-6" type="search" placeholder="Search" aria-label="Search">
         <button id="searchBox" class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="button-div order-sm-2 order-2"><button id="buttonMenu" class="navbar-toggler order-sm-2 order-2" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button></div>
    <div class="col-xl-4 col-lg-3 order-lg-3 order-md-3 order-sm-2 col-sm-12 collapse navbar-collapse order-2" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <p>
                {{auth()->user()->first_name}}</p>
            @if (isset(auth()->user()->picture_path))
                <a id="menuIcon" href="{{ route('users.edit', ['id'=>Auth::user()->id]) }}">
                    <img src="{{url(auth()->user()->picture_path)}}" width="50" height="50" alt="User Picture">
                    <span class="sr-only">(current)</span>
                </a>
            @else
                <a id="menuIcon" class="nav-item nav-link fa fa-user-circle fa-2x"
                   href="{{ route('users.edit', ['id'=>Auth::user()->id]) }}">
                    <span class="sr-only">(current)</span>
                </a>
            @endif

            <a href="#" id="menuIcon" data-toggle="modal" data-target="#modalNotification"
               role="button"
               aria-expanded="false">
                <span class="nav-item nav-link fa fa-envelope fa-2x" style="padding: 8px 0px 8px 8px"></span>
                <span class="badge" style="border: 1px solid cornflowerblue; border-radius: 10px;">{{ count(auth()->user()->unreadNotifications) }}</span>
            </a>

            <!-- Hack for laravel due to HTTP post type request-->
            <a id="menuIcon" class="nav-item nav-link fa fa-sign-out fa-2x" href="{{route('logout')}}"
               onclick="event.preventDefault();
                          document.getElementById('logout-form').submit()"></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</nav>
<div class="breadcrumb order-sm-4 order-lg-4 order-4 col-lg-12">
    <li class="breadcrumb-item">
        <a href="{{route('users.index')}}">Dashboard</a>
    </li>
    @for($i = 1; $i <= count(Request::segments()); $i++)
    @if(Request::segment($i) != 'users' && !is_numeric(Request::segment($i)))
    <li class="breadcrumb-item">
         <a href="{{ URL::to( implode( '/', array_slice(Request::segments(), 0 ,$i, true)))}}">
            {{ucfirst(Request::segment($i))}}
         </a>
    </li>
    @endif
    @endfor
</div>


<!-- MODAL NOTIFICATIONS -->
<div class="modal fade" id="modalNotification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Notifications</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @forelse(auth()->user()->unreadNotifications as $notification)

                    @include('Layout.notification.groupNotification')
                    <hr>
                @empty
                    <a href="#">No unread notifications</a>
                @endforelse
            </div>
        </div>
    </div>
</div>


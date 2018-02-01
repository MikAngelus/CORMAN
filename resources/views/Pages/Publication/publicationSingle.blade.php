<link rel="stylesheet" href="{{ url('css/publications.css')}}">

<div class="row publication">
    <div id="1" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">{{$pub->title}}</div>
    <div id="2" class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">{{$pub->year}}</div>

    <div id="3" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="list-inline">
            @foreach($pub->topics as $topic)
                <li class="list-inline-item">{{$topic->name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>

    <div id="4" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">{{$pub->venue}}</div>

    <div id="5" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <ul class="list-inline">
            @foreach($pub->users as $author)
                <li class="list-inline-item">{{$author->first_name}} {{$author->last_name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>
    <div id="6" class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <i class="fa fa-pencil fa-2x" href="#"></i>
    </div>
</div>

<link rel="stylesheet" href="{{ url('css/publications.css')}}">

<div class="row publication">
    <div id="1" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">{{$publication->title}}</div>
    <div id="2" class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">{{$publication->year}}</div>

    <div id="3" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="list-inline">
            @foreach($publication->topics as $topic)
                <li class="list-inline-item">{{$topic->name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>

    <div id="4" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">{{$publication->venue}}</div>

    <div id="5" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <ul class="list-inline">
            @foreach($publication->users as $author)
                <li class="list-inline-item">{{$author->first_name}} {{$author->last_name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>
    <div id="6" class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <a href="{{route('publications.edit', ['id'=>$publication->id])}}"><i class="fa fa-pencil fa-2x"></i></a>
    </div>
</div>



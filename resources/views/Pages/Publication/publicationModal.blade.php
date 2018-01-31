<div class="container">
    <div class="col-sm-11">{{$pub->title}}</div>
    <div class="col-sm-1">{{$pub->details->year}}</div>

    <div class="col-sm-12">
        <ul class="list-inline">    
            @foreach($pub->topics as $topic)
                <li class="list-inline-item">{{$topic->name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>

    <div class="col-sm-12">{{$pub->venue}}</div>

    <div class="col-sm-11">
        <ul class="list-inline">
            @foreach($pub->users as $author)
                <li class="list-inline-item">{{$author->first_name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>    
    <div class="col-sm-1"><i class="fa fa-pencil fa-2x" href="#"></i></div>
</div>
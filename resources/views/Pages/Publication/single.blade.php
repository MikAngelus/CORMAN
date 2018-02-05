<div class="row col-lg-12" id="publication_row">
    <div id="title" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">{{$publication->title}}</div>
    <div id="year" class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">{{$publication->year}}</div>

    <div id="topics" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="list-inline">
            @foreach($publication->topics as $topic)
                <li class="list-inline-item">{{$topic->name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>

    <div id="venue" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">{{$publication->venue}}</div>

    <div id="authors" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <ul class="list-inline">
            @foreach($publication->users as $author)
                <li class="list-inline-item">{{$author->first_name}} {{$author->last_name}}</li>
            @endforeach
        </ul>
        <!--sistemare lo spazio che lascia dopo le liste-->
    </div>
    <div id="edit" class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2">
        <a href="{{route('publications.edit', ['id'=>$publication->id])}}"><i class="fa fa-pencil fa-2x"></i></a>
        <!-- aggiungere if sullo stato della visibilità -->
        <a href="#aggiungere#azione#visibilità"><i class="fa fa-lock fa-2x"></i></a>
        <a href="#aggiungere#azione#"><i class="fa fa-unlock fa-2x"></i></a>
    </div>
</div>
<div class="publication_item col-lg-12">
    <!-- first row -->
    <div class="col-lg-12">
        <div class="row justify-content-between">
            <div id="title">{{$publication->title}}</div>
            <div id="year">{{date('Y',strtotime($publication->year))}}</div>
        </div>
    </div>
    
    <!-- second row -->
    <div class="col-lg-12">
        <div id="authors" class="row">
            <ul class="list-inline">
                @foreach($publication->users as $author)
                    <li class="list-inline-item">{{$author->first_name}} {{$author->last_name}}</li>
                @endforeach
            </ul>
            <!--sistemare lo spazio che lascia dopo le liste-->
        </div>
    </div>

    <!-- third row -->
    <div class="col-lg-12">
        <div id="venue" class="row">{{$publication->venue}}</div>
    </div>

    <!-- fourth row -->
    <div class="col-lg-12">
        <div class="row justify-content-between">
            <div id="topics" class="">
                <ul class="list-inline">
                    @foreach($publication->topics as $topic)
                        <li class="list-inline-item">{{$topic->name}}</li>
                    @endforeach
                </ul>
                <!--sistemare lo spazio che lascia dopo le liste-->
            </div>    
            <div id="edit" class="">
                <a href="{{route('publications.edit', ['id'=>$publication->id])}}"><i class="fa fa-pencil fa-2x"></i></a>
                <!-- aggiungere if sullo stato della visibilità -->
                <a href="#aggiungere#azione#visibilità"><i class="fa fa-lock fa-2x"></i></a>
                <a href="#aggiungere#azione#"><i class="fa fa-unlock fa-2x"></i></a>
            </div>
        </div>
    </div>
</div>
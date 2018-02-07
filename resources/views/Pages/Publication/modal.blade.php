<div class="container-fluid">
<!-- common fields -->
    <div class="row">
        <label class="col-sm-12 col-md-3 col-lg-2">Title</label>
        <div id="uno" class="col-sm-12 col-md-9 col-lg-10">{{$publication->title}}</div>
    </div>
    <div class="row">
        <label class="col-sm-12 col-md-3 col-lg-2">Type</label>
        <div id="due" class="col-sm-12 col-md-9 col-lg-10">{{$publication->type}}</div>
    </div>
    <div class="row">
        <label class="col-sm-12 col-md-3 col-lg-2">Authors</label>
        <div id="mdauthors" class="col-sm-12 col-md-10 col-lg-10">
            <ul class="list-inline">
                @foreach($publication->users as $author)
                    <li class="list-inline-item">{{$author->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <label class="col-sm-12 col-md-3 col-lg-2">Venue</label>
        <div id="md_venue" class="col-sm-12 col-md-9 col-lg-10">{{$publication->venue}}</div>
    </div>
    <div class="row">
        <label class="col-sm-12 col-md-3 col-lg-2">Year</label>
        <div id="md_year" class="col-sm-12 col-md-9 col-lg-10">{{date('Y',strtotime($publication->year))}}</div>
    </div>
    <div class="row">
        <label class="col-sm-12 col-md-3 col-lg-2">Topics</label>
        <div id="md_topics" class="col-sm-12 col-md-9 col-lg-10">
            <ul class="list-inline">
                @foreach($publication->topics as $topic)
                    <li class="list-inline-item">{{$topic->name}}</li>
                @endforeach
            </ul>
            <!--sistemare lo spazio che lascia dopo le liste-->
        </div>
    </div>
    <!-- end common fields -->
     
    @switch($publication->type)
        @case('journal')
            @include('Pages.Publication.journalFields', ['publication'=>$publication])
        @break
        @case('conference')
            @include('Pages.Publication.conferenceFields', ['publication'=>$publication])
        @break
        @case('editorship')
            @include('Pages.Publication.editorshipFields', ['publication'=>$publication])
        @break
    @endswitch

    <hr>

    <!-- Media Carousel -->
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="https://i.ytimg.com/vi/-EzURpTF5c8/maxresdefault.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="https://i.ytimg.com/vi/-EzURpTF5c8/maxresdefault.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="https://i.ytimg.com/vi/-EzURpTF5c8/maxresdefault.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

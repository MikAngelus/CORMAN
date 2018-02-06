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
                    <li class="list-inline-item">{{$author->first_name}} {{$author->last_name}}</li>
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

    <div class="row">
        <center><h1>MEDIA</h1></center>
        <div class="col-lg-12">
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ url('css/publications.css')}}">

<div class="row">
<!-- common fields -->
    <div class="form-group">
        <label class="col-sm-12 col-md-3 col-lg-2">Title</label>
        <div id="1" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">{{$publication->title}}</div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 col-md-3 col-lg-2">Type</label>
        <div id="1" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">{{$publication->type}}</div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 col-md-3 col-lg-2">Authors</label>
        <div id="1" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <ul class="list-inline">
                @foreach($publication->users as $author)
                    <li class="list-inline-item">{{$author->first_name}} {{$author->last_name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 col-md-3 col-lg-2">Venue</label>
        <div id="1" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">{{$publication->venue}}</div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 col-md-3 col-lg-2">Year</label>
        <div id="1" class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10">{{$publication->year}}</div>
    </div>
    <div class="form-group">
        <label class="col-sm-12 col-md-3 col-lg-2">Topics</label>
        <div id="3" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
            @include('Pages.Publication.journalFields', ['publication'=>$publication]);
        @endcase
        @case('conference')
            @include('Pages.Publication.conferenceFields', ['publication'=>$publication]);
        @endcase
        @case('editorship')
            @include('Pages.Publication.editorshipFields', ['publication'=>$publication]);
    @endswitch

</div>
<div class="row">
    <center><h1>MEDIA</h1></center>
</div>

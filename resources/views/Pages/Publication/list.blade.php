@extends ('Layout.main')

@section('content')

<div class="container">
    <div class="row">
        <a href="{{route('publications.create')}}" id="btn-newgroup" class="btn btn-primary pull-right" role="button">New Publication</a>
        <i class="fa fa-filter fa-2x pull-right"></i>
        <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="diolebbroso">
            Popover
        </button>
    </div>
    <br>
    @foreach($publicationList as $publication)
            @include('Pages.Publication.single', ['publication'=>$publication])
    @endforeach
</div>

@endsection

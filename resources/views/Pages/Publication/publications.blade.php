@extends ('Layout.main')

@section('content')

<!--<script type="text/javascript" src="{{ url('js/publications.js')}}"></script>
<link rel="stylesheet" href="{{ url('css/publications.css')}}">-->

<div class="container">

    <div class="row">
        @foreach($publication_list as $publication)
            @include('Pages.Publication.publicationSingle', ['pub'=>$publication])
        @endforeach
    </div>
</div>
<div class="container">
    <button id="btn-newgroup" class="btn-primary">New Publication</button>
</div>
@endsection

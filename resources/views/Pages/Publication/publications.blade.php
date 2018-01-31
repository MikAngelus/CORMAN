@extends ('Layout.main')

@section('content')

<!--<script type="text/javascript" src="{{ url('js/publications.js')}}"></script>
<link rel="stylesheet" href="{{ url('css/publications.css')}}">-->

<div class="row">
    <button class="btn btn-sm btn-primary">New Publication</button>
</div>

<div class="container">
    @foreach($publication_list as $publication)
            @include('Pages.Publication.publicationSingle', ['pub'=>$publication])
            <br>
    @endforeach
</div>

@endsection

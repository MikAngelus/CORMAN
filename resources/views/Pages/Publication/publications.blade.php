@extends ('Layout.main')

@section('content')

<div class="container">
    <div class="row">
        @foreach($publication_list as $publication)
            @include('Pages.Publication.publication_single', ['pub'=>$publication])
        @endforeach
    </div>
</div>
 <div class="container">
     <button id="btn-newgroup" class="btn-primary">New Publication</button>
 </div>
@endsection
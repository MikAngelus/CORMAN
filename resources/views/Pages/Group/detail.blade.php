@extends ('Layout.main')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-10">
        @foreach($publicationList as $publication)
                        @include('Pages.Publication.single', ['publication'=>$publication])
                        <br>
                @endforeach
        </div>
        <div class="col-lg-4 col-md-2">

            @foreach($groupList as $group)
            <div class="col-lg-12">

                @include('Pages.Group.single', ['group'=>$group])
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

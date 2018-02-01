@extends ('Layout.main')

@section('content')

<!--<script type="text/javascript" src="{{ url('js/publications.js')}}"></script>
<link rel="stylesheet" href="{{ url('css/publications.css')}}">-->

<div class="container-fluid">
<div class="row">
    <div class="col-lg-8 col-md-10">
    @foreach($publ_list as $publication)
                    @include('Pages.Publication.publicationSingle', ['pub'=>$publication])
                    <br>
            @endforeach
    </div>
    <div class="col-lg-4 col-md-2">

        @foreach($gro_list as $group)
        <div class="col-lg-12">

            @include('Pages.Group.groupSingle', ['gro'=>$group])
            </div>
        @endforeach


    </div>
    </div>
</div>

@endsection

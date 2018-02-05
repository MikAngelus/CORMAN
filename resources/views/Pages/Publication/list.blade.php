@extends ('Layout.main')

@section('head')
    <link rel="stylesheet" href="{{ url('css/Publication/publications.css') }}">
@endsection


@section('content')
    <div class="container-fluid">
        <div id="navbar" class="row col-lg-12">
            <div class="col-lg-11">
                <a href="{{route('publications.create')}}" id="btn-newgroup" class="btn btn-primary" role="button">New Publication</a>
            </div>
            <div class="col-lg-1">
                <i class="fa fa-filter fa-2x pull-right" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="@include('Pages.filter')"></i>
            </div>
        </div>
        <div id="list_container" class="row col-lg-12">
            @foreach($publicationList as $publication)
                    @include('Pages.Publication.single', ['publication'=>$publication])
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle=popover]').popover();
        })
    </script>
@endsection

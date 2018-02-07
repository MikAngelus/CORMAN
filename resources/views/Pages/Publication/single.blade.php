<div class="publication_item col-lg-12">
    <!-- first row -->
    <div class="col-lg-12">
        <div class="row justify-content-between">
            <div id="title" style="cursor: pointer;" data-toggle="modal" data-target="#modalPublication">{{$publication->title}}</div>
            <div id="year">{{date('Y',strtotime($publication->year))}}</div>
        </div>
    </div>
    <hr>
    <!-- second row -->
    <div class="col-lg-12">
        <div id="authors" class="row">
            <ul class="list-inline">
                @foreach($publication->authors as $author)
                    <li class="list-inline-item">{{$author->name}}</li>
                @endforeach
            </ul>
            <!--sistemare lo spazio che lascia dopo le liste-->
        </div>
    </div>

    <!-- third row -->
    <div class="col-lg-12">
        <div id="venue" class="row">{{$publication->venue}}</div>
    </div>
    <hr>

    <!-- fourth row -->
    <div class="col-lg-12">
        <div class="row justify-content-between align-items-center">
            <div id="topics">
                <ul class="list-inline">
                    @foreach($publication->topics as $topic)
                        <li class="list-inline-item">{{$topic->name}}</li>
                    @endforeach
                </ul>
                <!--sistemare lo spazio che lascia dopo le liste-->
            </div>
            <div id="edit">
                <a href="{{route('publications.edit', ['id'=>$publication->id])}}"><i class="ion-edit"></i></a>
                @if($publication->public === 1)
                    <a href="#aggiungere#azione#"><i class="ion-eye"></i></a>
                @else
                    <a href="#aggiungere#azione#visibilità"><i class="ion-eye-disabled"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPublication" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalPublicationTitle">Publication' View</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('Pages.Publication.modal', ['publication'=>$publication])
            </div>
        </div>
    </div>
</div>

@extends('Layout.main')

@section('content')

  <h1 data-toggle="modal" data-target="#exampleModalLong">Click for modal</h1>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
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

@endsection
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tutorial</title>
        <base href="{{ URL::asset('/') }}" target="_blank">
        <script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>
        <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url('css/landing.css') }}">
    </head>
    <body>
        <div class="container">
            <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="@include('Pages.prova')">Click</button>
        </div>

        <br><br>







        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
  </button>

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

            @include('PagesController@publications', ['publication_list'=>$publication_list])

        </div>
        
      </div>
    </div>
  </div>







        <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
            <script>
            $(function () {
                $('[data-toggle=popover]').popover();
            })
        </script>
    </body>
</html>

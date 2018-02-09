@extends('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet"/>
    <link href="{{url('css/form.css')}}" rel="stylesheet" />
@endsection

@section('content')
        
    <!-- Errors Handling -->
    <div class="row" id="formErrors">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    
    <!-- Form -->
    <div id="formContainer" class="col-lg-10 col-md-10 col-sm-12">
        <form id="msform" action="{{route('publications.update',['id' => $publication->id])}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <fieldset class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="fs-title">General Info</h2>
                <h3 class="fs-subtitle">Modify general informations about the publication here</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3">Title</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="title" type="text" placeholder="{{$publication->title}}" value="{{$publication->title}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3">Authors</label>
                    <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="authorsDropdown" name="authors[]" multiple>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3">Date</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="pub_date" type="date" placeholder="{{$publication->year}}" value="{{$publication->year}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3">Venue</label>
                    <input class="col-sm-12 col-md-9 col-lg-8" name="venue" type="text" placeholder="{{$publication->venue}}" value="{{$publication->venue}}"/>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3">Edit Topics</label>
                    <select class="col-sm-12 col-md-9 col-lg-8" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                                <option value="{{$topic->id}}">{{$topic->name}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-3">Visibility</label>
                    @if($publication->public === 1)
                        <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="visibility" name="visibility">
                            <option selected value="public" >Public</option>
                            <option value="private" >Private</option>
                        </select>
                    @else
                        <select class="col-sm-12 col-md-9 col-lg-8 form-control" id="visibility" name="visibility">
                            <option value="public" >Public</option>
                            <option selected value="private" >Private</option>
                        </select>
                    @endif
                </div>
                <hr>
                @switch($publication->type)
                    @case('journal')
                        @include('Pages.Publication.editJournal', ['details'=>$publication->details])
                    @break
                    @case('conference')
                        @include('Pages.Publication.editConference', ['details'=>$publication->details])
                    @break
                    @case('editorship')
                        @include('Pages.Publication.editEditorship', ['details'=>$publication->details])
                    @break
                @endswitch
                <hr>
                <h2 class="fs-title">Media</h2>
                <h3 class="fs-subtitle">Add here some media about the publication</h3>
                <div class="form-group col">
                    <label class="col-sm-12 col-md-3 col-lg-4">Add PDF <i class="ion-document-text" aria-hidden="true"></i></label>
                    <input class="col-sm-12 col-md-9 col-lg-6" type="file" name="pdf_file" style="display: all;">
                </div> 
                <div class="form-group col">
                    <label class="col-sm-12 col-md-3 col-lg-4">Add Files <i class="ion-images" aria-hidden="true"></i></label>
                    <input class="col-sm-12 col-md-9 col-lg-6" type="file" name="media_file[]" multiple style="display: all;">
                </div> 
                <hr>
                <a href="#" id="btn-newgroup" class="btn btn-danger btn-sm" role="button">Delete Publication</a>
                <hr>
                <input type="submit" name="submit" class="submit action-button" value="Update"/>
            </fieldset>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/Publication/editPublication.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection



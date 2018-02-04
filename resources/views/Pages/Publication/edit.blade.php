@extends('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet"/>
    <link href="{{url('css/form.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div id="formContainer" class="col-lg-10 col-md-10 col-sm-12">
    <form id="msform" action="{{route('publications.update',['id' => $publication->id])}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <fieldset class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="fs-title">General Info</h2>
                <h3 class="fs-subtitle">Modify general informations about the publication here</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Title</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="title" type="text" placeholder="{{$publication->title}}" value="{{$publication->title}}"/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Authors</label>

                    <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="authorsDropdown" name="users[]" multiple>
                        @foreach($authors as $author)
                            <option value="{{$author->first_name}}">{{$author->last_name}} {{$author->first_name}}</option>
                        @endforeach
                    </select>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
        
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Date</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="pub_date" type="date" placeholder="{{$publication->year}}" value="{{$publication->year}}"/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Venue</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="venue" type="text" placeholder="{{$publication->venue}}" value="{{$publication->venue}}"/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>

                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Edit Topics</label>
                    <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="topicsDropdown" name="topics[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                                <option value="{{$topic->name}}">{{$topic->name}}</option>
                            @endforeach
                    </select>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group"> 
                    <label class="col-sm-12 col-md-3 col-lg-3" id="visibilityRadio" class="btn btn-default active">
                        <input type="radio" id="is_public" name="privacy-btn" checked="checked"/>Public
                    </label>
                    <label class="col-sm-12 col-md-3 col-lg-3" id="visibilityRadio" class="btn btn-default">
                        <input type="radio" id="is_public" name="privacy-btn"/>Private
                    </label>
                </div>
                <br> 
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
                <br>
                <h2 class="fs-title">Media</h2>
                <h3 class="fs-subtitle">Add here some media about the publication</h3>
                <label class="row btn btn-default btn-file">
                    Add PDF <input type="file" multiple style="display: none;">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                </label>
                <label class="row btn btn-default btn-file">
                    Add Media <input type="file" style="display: none;">
                    <i class="fa fa-upload" aria-hidden="true"></i>
                </label>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Create"/>
            </fieldset>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ url('js/Publication/editPublication.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ url('js/editFieldsForm.js') }}"></script>
@endsection



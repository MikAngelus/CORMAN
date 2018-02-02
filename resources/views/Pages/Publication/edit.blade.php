@extends('Layout.main')

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="{{public_path('css/edit_forms.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">General Info</li>
                <li>Journal/Articles Details</li>
                <li>Conference/Workshop Details</li>
                <li>Editorship</li>
                <li>Media</li>
            </ul>
            <!-- fieldsets -->
            <fieldset class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="fs-title">General Info</h2>
                <h3 class="fs-subtitle">Modify general informations about the publication here</h3>
                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Title</label>
                        <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="title" type="text" placeholder=""/>
                        <a class="edit col-lg-1">Edit</a>
                        <a class="button save hidden col-lg-1">Save</a>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Co-Authors</label>
                        <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="co_authors" type="text" placeholder=""/>
                        <a class="edit col-lg-1">Edit</a>
                        <a class="button save hidden col-lg-1">Save</a>
                    </div>
            
                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Date</label>
                        <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="pub_date" type="date" placeholder=""/>
                        <a class="edit col-lg-1">Edit</a>
                        <a class="button save hidden col-lg-1">Save</a>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Venue</label>
                        <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="venue" type="text" placeholder=""/>
                        <a class="edit col-lg-1">Edit</a>
                        <a class="button save hidden col-lg-1">Save</a>
                    </div>

                    <select class="form-control" id="pub-type">
                        <option>Journal/Article</option>
                        <option>Conference/Workshop</option>
                        <option>Editorship</option>
                    </select>
                    <input type="button" name="next" class="next action-button" value="Next"/>
                </div>
            </fieldset>
            <fieldset id="" class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="fs-title">Journal/Articles Details</h2>
                <h3 class="fs-subtitle">Modify here some info about Journal</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Abstract</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="abstract" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Volume</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="volume" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Number</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="number" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Pages</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="pages" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>    
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Key</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="key" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">DOI</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="doi" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">EE</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="ee" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">URL</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="url" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset id="" class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="fs-title">Conference/Workshop Details</h2>
                <h3 class="fs-subtitle">Modify here some info about Conference</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Abstract</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="abstract" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Pages</label><!--RANGE-->
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="pages" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Days</label><!--RANGE-->
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="days" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Key</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="key" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">DOI</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="doi" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">EE</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="ee" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">URL</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="url" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset id="" class="col-sm-12 col-md-12 col-lg-12">
                <h2 class="fs-title">Editorship</h2>
                <h3 class="fs-subtitle">Modify here some info about Editorship</h3>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Abstract</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="abstract" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Volume</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="volume" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Publisher</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="publisher" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">Key</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="key" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">DOI</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="doi" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">EE</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="ee" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-3 col-lg-2">URL</label>
                    <input class="col-sm-12 col-md-9 col-lg-6 editable-field" name="url" type="text" placeholder=""/>
                    <a class="edit col-lg-1">Edit</a>
                    <a class="button save hidden col-lg-1">Save</a>
                </div>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Media</h2>
                <h3 class="fs-subtitle">Add here some media about the publication</h3>
                <label class="btn btn-default btn-file row">
                    Add PDF <input type="file" style="display: none;">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                </label>
                <label class="btn btn-default btn-file row">
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
<script src="{{ public_path('js/jquery-ui.js') }}"></script>
<script src="{{ public_path('js/jqueryform.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{ public_path('js/editFieldsForm.js') }}"></script>
@endsection



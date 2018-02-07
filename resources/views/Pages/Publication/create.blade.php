@extends ('Layout.main')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="{{url('css/form.css')}}" rel="stylesheet" />
    <link href="{{url('css/edit_forms.css')}}" rel="stylesheet" />
@endsection


@section('content')
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

    <!-- MultiStep Form -->
    <div class="row">
        <div id="box" class="col-md-6 col-md-offset-3">
            <form id="msform" action="{{route('publications.store')}}" method="post">
                {{ csrf_field() }}
                <!-- progressbar -->
                <ul id="progressbar" class="pt-2">
                    <li class="active">General Info</li>
                    <li>Details</li>
                    <li>Media</li>
                </ul>
                <!-- fieldsets -->
                <fieldset id="primary">
                    <h2 class="fs-title">General Info</h2>
                    <h3 class="fs-subtitle">Insert general informations about the publication here</h3>
                    
                    <input type="text" name="title" placeholder="Title*"/>

                    <select class="form-control" id="authorsDropdown" name="authors[]" multiple>
                        <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                        @foreach($authorList as $author)
                            <option>{{$author->name}}</option>
                        @endforeach
                    </select>

                    <input type="date" name="publication_date" placeholder="Publication Date"/>
                    <input type="text" name="venue" placeholder="Venue"/>

                    <select class="form-control" id="topicsDropdown" name="topics[]" multiple>
                            <option value=""></option> <!-- needed for selct2.js library don't remove!-->
                            @foreach($topicList as $topic)
                            <option value="{{$topic->name}}">{{$topic->name}}</option>
                            @endforeach
                    </select>

                
                    <select class="form-control" id="pub-type" name="type">
                        <option value="" selected disabled>Select your publication category</option>
                        <option value="journal" >Journal/Article</option>
                        <option value="conference" >Conference/Workshop</option>
                        <option value="editorship" >Editorship</option>
                    </select>

                    <div class="form-group">
                        <label class="col-sm-12 col-md-3 col-lg-2">Visibility</label>
                        <select class="col-sm-12 col-md-9 col-lg-6 form-control" id="visibility" name="visibility">
                            <option selected value="public" >Public</option>
                            <option value="private" >Private</option>
                        </select>
                        <a class="edit col-lg-1">Edit</a>
                        <a class="button save hidden col-lg-1">Save</a>
                    </div>    

                    <input type="button" name="next" class="next action-button col-lg-" value="Next"/>
                </fieldset>
    
                <fieldset id="journalFieldset">
                    <h2 class="fs-title">Journal/Articles Details</h2>
                    <h3 class="fs-subtitle">Insert here some info about Journal</h3>
                    <input type="text" name="journal_abstract" placeholder="Abstract"/>
                    <input type="text" name="journal_volume" placeholder="Volume"/>
                    <input type="text" name="journal_number" placeholder="Number"/>
                    <input type="text" name="journal_pages" placeholder="Pages"/>
                    <input type="text" name="journal_key" placeholder="Key"/>
                    <input type="text" name="journal_doi" placeholder="DOI"/>
                    <input type="text" name="journal_ee" placeholder="EE"/>
                    <input type="text" name="journal_url" placeholder="URL"/>
                    
                    <a href='#' class="fake_btn" data-role='button'>previous</a>
                    <a href='#' class="fake_btn" data-role='button'>next</a>
                </fieldset>


                <fieldset id="conferenceFieldset">
                    <h2 class="fs-title">Conference/Workshop Details</h2>
                    <h3 class="fs-subtitle">Insert here some info about Conference</h3>
                    <input type="text" name="conference_abstract" placeholder="Abstract"/>
                    <input type="text" name="conference_pages" placeholder="Pages"/> 
                    <input type="text" name="conference_days" placeholder="Days"/>
                    <input type="text" name="conference_key" placeholder="Key"/>
                    <input type="text" name="conference_doi" placeholder="DOI"/>
                    <input type="text" name="conference_ee" placeholder="EE"/>
                    <input type="text" name="conference_url" placeholder="URL"/>
                    <a href='#' class="fake_btn" data-role='button'>previous</a>
                    <a href='#' class="fake_btn" data-role='button'>next</a>
                </fieldset>


                <fieldset id="editorshipFieldset">
                    <h2 class="fs-title">Editorship</h2>
                    <h3 class="fs-subtitle">Insert here some info about Editorship</h3>
                    <input type="text" name="editorship_abstract" placeholder="Abstract"/>
                    <input type="text" name="editorship_volume" placeholder="Volume"/>
                    <input type="text" name="editorship_publisher" placeholder="Publisher"/>
                    <input type="text" name="editorship_key" placeholder="Key"/>
                    <input type="text" name="editorship_doi" placeholder="DOI"/>
                    <input type="text" name="editorship_ee" placeholder="EE"/>
                    <input type="text" name="editorship_url" placeholder="URL"/>
                    
                    <a href='#' class="fake_btn" data-role='button'>previous</a>
                    <a href='#' class="fake_btn" data-role='button'>next</a>
                </fieldset>

                <fieldset id="media">
                    <h2 class="fs-title">Media</h2>
                    <h3 class="fs-subtitle">Add here some media about the publication</h3>
                    <label class="btn btn-default btn-file row">
                        Add PDF <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                        <input type="file" name="pdf_file" style="display: all;">
                    </label>
                    <label class="btn btn-default btn-file row">
                        Add Media <i class="fa fa-upload" aria-hidden="true"></i>
                        <input type="file" name="media_file[]" multiple style="display: all;">
                    </label>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                    <input type="submit" name="submit" class="submit action-button" value="Create"/>
                </fieldset>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jqueryformPublication.js') }}"></script>
    <script src="{{ url('js/Publication/createPublication.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection

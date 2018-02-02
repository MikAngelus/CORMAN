@extends('Layout.main')

@section('content')
<!-- MultiStep Form -->
<div class="row">
    <div id="box" class="col-md-6 col-md-offset-3">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar" class="pt-2">
                <li class="active">General Info</li>
                <li>Journal/Articles Details</li>
                <li>Conference/Workshop Details</li>
                <li>Editorship</li>
                <li>Media</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">General Info</h2>
                <h3 class="fs-subtitle">Insert general informations about the publication here</h3>
                <input type="text" name="title" placeholder="Title"/>
                <input type="text" name="co_authors" placeholder="Co-Authors"/>
                <input type="date" name="pub_date" placeholder="Publication Date"/>
                <input type="text" name="venue" placeholder="Venue"/>
                <select class="form-control" id="pub-type">
                    <option>Journal/Article</option>
                    <option>Conference/Workshop</option>
                    <option>Editorship</option>
                </select>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset id="">
                <h2 class="fs-title">Journal/Articles Details</h2>
                <h3 class="fs-subtitle">Insert here some info about Journal</h3>
                <input type="text" name="abstract" placeholder="Abstract"/>
                <input type="text" name="volume" placeholder="Volume"/>
                <input type="text" name="number" placeholder="Number"/>
                <input type="text" name="pages" placeholder="Pages"/>
                <input type="text" name="key" placeholder="Key"/>
                <input type="text" name="doi" placeholder="DOI"/>
                <input type="text" name="ee" placeholder="EE"/>
                <input type="text" name="url" placeholder="URL"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset id="">
                <h2 class="fs-title">Conference/Workshop Details</h2>
                <h3 class="fs-subtitle">Insert here some info about Conference</h3>
                <input type="text" name="abstract" placeholder="Abstract"/>
                <input type="text" name="pages" placeholder="Pages"/> <!--RANGE-->
                <input type="text" name="days" placeholder="Days"/>
                <input type="text" name="key" placeholder="Key"/>
                <input type="text" name="doi" placeholder="DOI"/>
                <input type="text" name="ee" placeholder="EE"/>
                <input type="text" name="url" placeholder="URL"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset id="">
                <h2 class="fs-title">Editorship</h2>
                <h3 class="fs-subtitle">Insert here some info about Editorship</h3>
                <input type="text" name="abstract" placeholder="Abstract"/>
                <input type="text" name="volume" placeholder="Volume"/>
                
                <input type="text" name="publisher" placeholder="Publisher"/>
                <input type="text" name="key" placeholder="Key"/>
                <input type="text" name="doi" placeholder="DOI"/>
                <input type="text" name="ee" placeholder="EE"/>
                <input type="text" name="url" placeholder="URL"/>
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
<!-- /.MultiStep Form -->
@endsection

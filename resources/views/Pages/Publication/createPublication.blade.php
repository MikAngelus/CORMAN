@extends('Layout.main')

@section('content')
<!--<div class="container">
   <form class="horizontal-form">

	<div class="form-group row">
		<label for="title" class="col-lg-2 control-label">Title</label>
		<div class="col-lg-8">
            <input type="text" class="form-control" name="title" placeholder="Enter the title of publication">
        </div>
	</div>	

	<div class="form-group row">
		<label for="co-authors" class="col-lg-2 control-label">Co-Authors</label>
		<div class="col-lg-8">
		    <input type="text" class="form-control" name="co-authors" placeholder="Enter the co-authors of the publication">
        </div>
	</div>					
							
	<div class="form-group row">
		<label for="description" class="col-lg-2 control-label">Description</label>
		<div class="col-lg-8">
		    <input type="text" class="form-control" name="description" placeholder="Enter a brief description of publication">
        </div>
	</div>	

	<div class="form-group row">
		<label for="pub-date" class="col-lg-2 control-label">Type</label>
		<div class="col-lg-8">
        <select name="pub-type" class="form-control col-lg-8">
           <option value="journal">Journal/Article</option>
           <option value="conference">Conference/Workshop</option>
           <option value="editorship">Editorship</option>
        </select>
        </div>
	</div>	
   	
    <div class="form-group row">
		<label for="venue" class="col-lg-2 control-label">Publication Date</label>
		<div class="col-lg-8">
		    <input type="date" class="form-control" name="pub-date">
		</div>
	</div>	               
                        														
							
	<div class="form-group row">
		<label for="state_id" class="col-lg-2 control-label">Topics</label>
		<div class="col-lg-8">
		    <input type="text" class="form-control"
		    name="pub-type" placeholder="Enter the topics of publication">
        </div>		
	</div>
	
	<div class="form-group row">
		<label for="state_id" class="col-lg-2 control-label"></label>
		<div class="col-lg-8">
		    <input type="text" class="form-control"
		    name="pub-type" placeholder="Enter the topics of publication">
        </div>		
	</div>
	
	<div class="form-group row">
		<label for="state_id" class="col-lg-2 control-label">Topic</label>
		<div class="col-lg-8">
		    <input type="text" class="form-control"
		    name="pub-type" placeholder="Enter the topics of publication">
        </div>		
	</div>
	
	<div class="form-group row">
		<label for="venue" class="col-lg-2 control-label">Venue</label>
		<div class="col-lg-8">
		    <input type="text" class="form-control" name="venue" placeholder="Enter the name here">
		</div>
	</div>		
	
	<div class="form-group row">
		<button type="submit" class="btn btn-primary">Create Publication</button>
	</div>     
	
</form>-->
<!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
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
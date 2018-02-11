<h2 class="fs-title">Conference/Workshop Details</h2>
<h3 class="fs-subtitle">Modify here some info about Conference</h3>
<div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3">Abstract</label>
    <textarea class="col-sm-12 col-md-9 col-lg-8" rows="4" name="abstract" >{{$details->abstract}}</textarea>
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3">Pages</label><!--RANGE-->
    <input class="col-sm-12 col-md-9 col-lg-8" name="pages" type="text"  value="{{$details->pages}}"/>
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3">Days</label><!--RANGE-->
    <input class="col-sm-12 col-md-9 col-lg-8" name="days" type="text" value="{{$details->days}}"/>
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3">Key</label>
    <input class="col-sm-12 col-md-9 col-lg-8" name="key" type="text" value="{{$details->key}}"/>
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3">DOI</label>
    <input class="col-sm-12 col-md-9 col-lg-8" name="doi" type="text" value="{{$details->doi}}"/>
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3">EE</label>
    <input class="col-sm-12 col-md-9 col-lg-8" name="ee" type="text" value="{{$details->ee}}"/>
</div>
<div class="form-group">
    <label class="col-sm-12 col-md-3 col-lg-3">URL</label>
    <input class="col-sm-12 col-md-9 col-lg-8" name="url" type="text" value="{{$details->url}}"/>
</div>


<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ utf8_decode(old('name', optional($bedCategory)->name)) }}" maxlength="100" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('desc') ? 'has-error' : '' }}">
    <label for="desc" class="col-md-2 control-label">Desc</label>
    <div class="col-md-10">
        <input class="form-control" name="desc" type="text" id="desc" value="{{ old('desc', optional($bedCategory)->desc) }}" maxlength="200" placeholder="Enter desc here...">
        {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($mohArea)->name) }}" maxlength="200" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('police') ? 'has-error' : '' }}">
    <label for="police" class="col-md-2 control-label">Police</label>
    <div class="col-md-10">
        <input class="form-control" name="police" type="text" id="police" value="{{ old('police', optional($mohArea)->police) }}" maxlength="200" placeholder="Enter police here...">
        {!! $errors->first('police', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gs') ? 'has-error' : '' }}">
    <label for="gs" class="col-md-2 control-label">GS</label>
    <div class="col-md-10">
        <input class="form-control" name="gs" type="text" id="gs" value="{{ old('gs', optional($mohArea)->gs) }}" maxlength="200" placeholder="Enter gs here...">
        {!! $errors->first('gs', '<p class="help-block">:message</p>') !!}
    </div>
</div> 

<div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
    <label for="destination" class="col-md-2 control-label">Destination</label>
    <div class="col-md-10">
        <input class="form-control" name="destination" type="text" id="destination" value="{{ old('destination', optional($mohArea)->destination) }}" maxlength="200" placeholder="Enter destination here...">
        {!! $errors->first('destination', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($mohArea)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('user_id', optional($mohArea)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->


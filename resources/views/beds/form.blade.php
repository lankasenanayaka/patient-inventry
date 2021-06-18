
<div class="form-group {{ $errors->has('bed_name') ? 'has-error' : '' }}">
    <label for="bed_name" class="col-md-2 control-label">Bed Name</label>
    <div class="col-md-10">
        <input class="form-control" name="bed_name" type="text" id="bed_name" value="{{ old('bed_name', optional($bed)->bed_name) }}" maxlength="100" placeholder="Enter bed name here...">
        {!! $errors->first('bed_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($bed)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('user_id', optional($bed)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->


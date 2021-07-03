
<div class="form-group {{ $errors->has('bed_name') ? 'has-error' : '' }}">
    <label for="bed_name" class="col-md-2 control-label">Bed Name</label>
    <div class="col-md-10">
        <input class="form-control" name="bed_name" type="text" id="bed_name" value="{{ old('bed_name', optional($bed)->bed_name) }}" maxlength="100" placeholder="Enter bed name here...">
        {!! $errors->first('bed_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bed_category') ? 'has-error' : '' }}">
    <label for="bed_category" class="col-md-2 control-label">Bed category</label>
    <div class="col-md-10">
        <select class="form-control" id="bed_category" name="bed_category">
        	    <option value=""  {{ old('bed_category', optional($bed)->bed_category ?: '') == '' ? 'selected' : '' }} >Select bed category</option>
        	@foreach ($BedCateories as $key => $BedCateory)
			    <option value="{{ $key }}" {{ old('bed_category', optional($bed)->bed_category) == $key ? 'selected' : '' }}>
			    	{{ utf8_decode($BedCateory) }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('bed_category', '<p class="help-block">:message</p>') !!}
    </div>
</div>


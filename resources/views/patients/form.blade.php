
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($patient)->name) }}" maxlength="200" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
    <label for="age" class="col-md-2 control-label">Age</label>
    <div class="col-md-10">
        <input class="form-control" name="age" type="number" id="age" value="{{ old('age', optional($patient)->age) }}" min="0" placeholder="Enter age here...">
        {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nic') ? 'has-error' : '' }}">
    <label for="nic" class="col-md-2 control-label">Nic</label>
    <div class="col-md-10">
        <input class="form-control" name="nic" type="text" id="nic" value="{{ old('nic', optional($patient)->nic) }}" min="0" placeholder="Enter nic here...">
        {!! $errors->first('nic', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
    <label for="contact_no" class="col-md-2 control-label">Contact No</label>
    <div class="col-md-10">
        <input class="form-control" name="contact_no" type="text" id="contact_no" value="{{ old('contact_no', optional($patient)->contact_no) }}" maxlength="50" placeholder="Enter contact no here...">
        {!! $errors->first('contact_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($patient)->address) }}" maxlength="200" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('positive_on') ? 'has-error' : '' }}">
    <label for="positive_on" class="col-md-2 control-label">Positive on</label>
    <div class="col-md-10">
        <input class="form-control" name="positive_on" type="date" id="positive_on" value="{{ old('positive_on', optional($patient)->positive_on) }}" placeholder="Enter positive date here...">
        {!! $errors->first('positive_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('admitted') ? 'has-error' : '' }}">
    <label for="admitted" class="col-md-2 control-label">Admitted</label>
    <div class="col-md-10">
        <input class="form-control" name="admitted" type="date" id="admitted" value="{{ old('admitted', optional($patient)->admitted) }}" placeholder="Enter admit date here...">
        {!! $errors->first('admitted', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discharged') ? 'has-error' : '' }}">
    <label for="discharged" class="col-md-2 control-label">Discharged</label>
    <div class="col-md-10">
        <input class="form-control" name="discharged" type="date" id="discharged" value="{{ old('discharged', optional($patient)->discharged) }}" placeholder="Enter discharge date here...">
        {!! $errors->first('discharged', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('moh_area_id') ? 'has-error' : '' }}">
    <label for="moh_area_id" class="col-md-2 control-label">Moh Area</label>
    <div class="col-md-10">
        <select class="form-control" id="moh_area_id" name="moh_area_id">
        	    <option value="" style="display: none;" {{ old('moh_area_id', optional($patient)->moh_area_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select moh area</option>
        	@foreach ($MohAreas as $key => $MohArea)
			    <option value="{{ $key }}" {{ old('moh_area_id', optional($patient)->moh_area_id) == $key ? 'selected' : '' }}>
			    	{{ $MohArea }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('moh_area_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bed_id') ? 'has-error' : '' }}">
    <label for="bed_id" class="col-md-2 control-label">Bed</label>
    <div class="col-md-10">
        <select class="form-control" id="bed_id" name="bed_id">
            <option value="" style="display: none;" {{ old('bed_id', optional($patient)->bed_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select bed</option>
            @foreach ($Beds as $key => $Bed)
                <option value="{{ $key }}" {{ old('bed_id', optional($patient)->bed_id) == $key ? 'selected' : '' }}>
                {{ $Bed }}
                </option>
            @endforeach
        </select>
        {!! $errors->first('bed_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('co_modibilities') ? 'has-error' : '' }}">
    <label for="co_modibilities" class="col-md-2 control-label">Co-modibilities</label>
    <div class="col-md-10">
        <input class="form-control" name="co_modibilities" type="text" id="co_modibilities" value="{{ old('co_modibilities', optional($patient)->co_modibilities) }}" placeholder="Enter co modibilities here...">
        {!! $errors->first('co_modibilities', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('other') ? 'has-error' : '' }}">
    <label for="other" class="col-md-2 control-label">Other (user)</label>
    <div class="col-md-10">
        <input class="form-control" name="other" type="text" id="other" value="{{ old('other', optional($patient)->other) }}" placeholder="Enter other data here...">
        {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($patient)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($Users as $key => $User)
			    <option value="{{ $key }}" {{ old('user_id', optional($patient)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $User }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->


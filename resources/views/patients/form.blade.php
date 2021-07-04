
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

<div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
    <label for="sex" class="col-md-2 control-label">Gender</label>
    <div class="col-md-10">
        <select class="form-control" id="sex" name="sex">
            <option value="" style="display: none;" {{ old('sex', optional($patient)->sex ?: '') == '' ? 'selected' : '' }} disabled selected>Please select</option>
            <option value="1" {{ old('sex', optional($patient)->sex) == 1 ? 'selected' : '' }}> Male </option>
            <option value="2" {{ old('sex', optional($patient)->sex) == 2 ? 'selected' : '' }}> Female </option>
        </select>
        {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bed_id') ? 'has-error' : '' }}">
    <label for="bed_id" class="col-md-2 control-label">Bed</label>
    <div class="col-md-10">
        <select class="form-control select2" id="bed_id" name="bed_id">
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

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($patient)->address) }}" maxlength="200" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
    <label for="contact_no" class="col-md-2 control-label">Contact No</label>
    <div class="col-md-10">
        <input class="form-control" name="contact_no" type="text" id="contact_no" value="{{ old('contact_no', optional($patient)->contact_no) }}" maxlength="50" placeholder="Enter contact no here...">
        {!! $errors->first('contact_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nic') ? 'has-error' : '' }}">
    <label for="nic" class="col-md-2 control-label">Id number (NIC)</label>
    <div class="col-md-10">
        <input class="form-control" name="nic" type="text" id="nic" value="{{ old('nic', optional($patient)->nic) }}" min="0" placeholder="Enter nic here...">
        {!! $errors->first('nic', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
    <label for="district" class="col-md-2 control-label">District</label>
    <div class="col-md-10">
        <input class="form-control" name="district" type="text" id="district" value="{{ old('district', optional($patient)->district) }}" min="0" placeholder="Enter district here...">
        {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('police_station') ? 'has-error' : '' }}">
    <label for="police_station" class="col-md-2 control-label">police station</label>
    <div class="col-md-10">
        <input class="form-control" name="police_station" type="text" id="police_station" value="{{ old('police_station', optional($patient)->police_station) }}" min="0" placeholder="Enter police_station here...">
        {!! $errors->first('police_station', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gs_division') ? 'has-error' : '' }}">
    <label for="gs_division" class="col-md-2 control-label">GS division</label>
    <div class="col-md-10">
        <input class="form-control" name="gs_division" type="text" id="gs_division" value="{{ old('gs_division', optional($patient)->gs_division) }}" min="0" placeholder="Enter gs_division here...">
        {!! $errors->first('gs_division', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('destination') ? 'has-error' : '' }}">
    <label for="destination" class="col-md-2 control-label">Destination</label>
    <div class="col-md-10">
        <input class="form-control" name="destination" type="text" id="destination" value="{{ old('destination', optional($patient)->destination) }}" min="0" placeholder="Enter destination here...">
        {!! $errors->first('destination', '<p class="help-block">:message</p>') !!}
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

<div class="form-group {{ $errors->has('positive_on') ? 'has-error' : '' }}">
    <label for="positive_on" class="col-md-2 control-label">Positive on</label>
    <div class="col-md-10">
        <input class="form-control" name="positive_on" type="date" id="positive_on" value="{{ old('positive_on', optional($patient)->positive_on) }}" placeholder="Enter positive date here...">
        {!! $errors->first('positive_on', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('icc_no') ? 'has-error' : '' }}">
    <label for="icc_no" class="col-md-2 control-label">Icc no</label>
    <div class="col-md-10">
        <input class="form-control" name="icc_no" type="text" id="icc_no" value="{{ old('icc_no', optional($patient)->icc_no) }}" min="0" placeholder="Enter icc_no here...">
        {!! $errors->first('icc_no', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('admitted') ? 'has-error' : '' }}">
    <label for="admitted" class="col-md-2 control-label">Admitted</label>
    <div class="col-md-6">
        <input class="form-control" name="admitted" type="date" id="admitted" value="{{ old('admitted', optional($patient)->admitted) }}" placeholder="Enter admit date here...">
        {!! $errors->first('admitted', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discharged') ? 'has-error' : '' }}">
    <label for="discharged" class="col-md-2 control-label">Discharged</label>
    <div class="col-md-6">
        <input class="form-control" name="discharged" type="date" id="discharged" value="{{ old('discharged', optional($patient)->discharged) }}" placeholder="Enter discharge date here...">
        {!! $errors->first('discharged', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label for="vaccine1_given" class="col-md-12 control-label">Discharge patient</label>
        <div class="col-md-10">
            <label class="radio-inline">
                <input type="radio" name="is_discharged" id="is_discharged1" value="1" {{ old('is_discharged', optional($patient)->is_discharged)==1?'checked':'' }} >&nbsp;&nbsp;Yes
            </label>&nbsp;&nbsp;
            <label class="radio-inline">
                <input type="radio" name="is_discharged" id="is_discharged2" value="2" {{ old('is_discharged', optional($patient)->is_discharged)==0?'checked':'' }} >&nbsp;&nbsp;No
            </label> 
        </div>       
    </div>
</div>

<div class="form-group {{ $errors->has('diagnosis') ? 'has-error' : '' }}">
    <label for="diagnosis" class="col-md-2 control-label">Diagnosis</label>
    <div class="col-md-10">
        <input class="form-control" name="diagnosis" type="text" id="diagnosis" value="{{ old('diagnosis', optional($patient)->diagnosis) }}" placeholder="Enter diagnosis date here...">
        {!! $errors->first('diagnosis', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('complications') ? 'has-error' : '' }}">
    <label for="complications" class="col-md-2 control-label">Complications</label>
    <div class="col-md-10">
        <input class="form-control" name="complications" type="text" id="complications" value="{{ old('complications', optional($patient)->complications) }}" placeholder="Enter complications here...">
        {!! $errors->first('complications', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="row">
<div class="form-group col-md-6">
    <label for="vaccine1_given" class="col-md-12 control-label">Covid19 vaccine 01'st dose given</label>
    <div class="col-md-10">
        <label class="radio-inline">
            <input type="radio" name="vaccine1_given" id="vaccine1_given1" value="1" {{ old('vaccine1_given', optional($patient)->vaccine1_given)==1?'checked':'' }} >&nbsp;&nbsp;Yes
        </label>&nbsp;&nbsp;
        <label class="radio-inline">
            <input type="radio" name="vaccine1_given" id="vaccine1_given2" value="2" {{ old('vaccine1_given', optional($patient)->vaccine1_given)==2?'checked':'' }} >&nbsp;&nbsp;No
        </label> 
    </div>       
</div>

<div class="form-group col-md-6">
    <label for="vaccine2_given" class="col-md-12 control-label">Covid19 vaccine 02'nd dose given</label>
    <div class="col-md-10">
        <label class="radio-inline">
            <input type="radio" name="vaccine2_given" id="vaccine2_given1" value="1" {{ old('vaccine2_given', optional($patient)->vaccine2_given)==1?'checked':'' }} >&nbsp;&nbsp;Yes
        </label>
        <label class="radio-inline">
            <input type="radio" name="vaccine2_given" id="vaccine2_given2" value="2" {{ old('vaccine2_given', optional($patient)->vaccine2_given)==2?'checked':'' }} >&nbsp;&nbsp;No
        </label>   
    </div> 
</div>

<div class="form-group col-md-6">
    <label for="type_of_vaccine" class="col-md-12 control-label">Type of vaccine</label>
    <div class="col-md-10">
        <label class="checkbox-inline">
            <input type="checkbox" name="sputnik" id="sputnik" value="1" {{ old('sputnik', optional($patient)->sputnik)==1?'checked':'' }} >&nbsp;&nbsp;Covishield
        </label> &nbsp;&nbsp;
        <label class="checkbox-inline">
            <input type="checkbox" name="sinopharm" id="sinopharm" value="1" {{ old('sinopharm', optional($patient)->sinopharm)==1?'checked':'' }} >&nbsp;&nbsp;Sputnik-V
        </label> &nbsp;&nbsp;
        <label class="checkbox-inline">
            <input type="checkbox" name="covishield" id="covishield" value="1" {{ old('covishield', optional($patient)->covishield)==1?'checked':'' }} >&nbsp;&nbsp;Sinopharm
        </label>
    </div>
</div>

<div class="form-group col-md-12">
    <label for="symptomatic" class="col-md-12 control-label">Symptomatic</label>
    <div class="col-md-10">
        <label class="radio-inline ">
            <input type="radio" name="symptomatic" id="symptomatic1" value="1" {{ old('symptomatic', optional($patient)->symptomatic)==1?'checked':'' }} >&nbsp;&nbsp;Yes
        </label>
        &nbsp;&nbsp;
        <label class="radio-inline">
            <input type="radio" name="symptomatic" id="symptomatic2" value="2" {{ old('symptomatic', optional($patient)->symptomatic)==2?'checked':'' }} >&nbsp;&nbsp;No
        </label>    
    </div>
</div>
</div>

<div class="form-group {{ $errors->has('symptoms') ? 'has-error' : '' }}">
    <label for="symptoms" class="col-md-12 control-label">If symptomatic please state symptoms</label>
    <div class="col-md-10">
        <input class="form-control" name="symptoms" type="text" id="symptoms" value="{{ old('symptoms', optional($patient)->symptoms) }}" placeholder="Enter symptoms here...">
        {!! $errors->first('symptoms', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('co_modibilities') ? 'has-error' : '' }}">
    <label for="co_modibilities" class="col-md-2 control-label">Co-modibilities</label>
    <div class="col-md-10">
        <input class="form-control" name="co_modibilities" type="text" id="co_modibilities" value="{{ old('co_modibilities', optional($patient)->co_modibilities) }}" placeholder="Enter co modibilities here...">
        {!! $errors->first('co_modibilities', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group ">
    <label for="" class="col-md-12 control-label">Examination (Vital parameters )</label>

    <div class="col-md-12 row" > 
        <div class="col-md-4" >Terms</div>    
        <div class="col-md-4" >On admission</div>
        <div class="col-md-4" >On discharge</div>
    </div> 
    <div class="col-md-12 row" >    
        <div class="col-md-4" style="margin-top: 31px;" >Tem (C)</div>      
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('tem1') ? 'has-error' : '' }}">
                <label for="tem1" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="tem1" type="text" id="tem1" value="{{ old('tem1', optional($patient)->tem1) }}" placeholder="Enter tem here...">
                    {!! $errors->first('tem1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('tem2') ? 'has-error' : '' }}">
                <label for="tem2" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="tem2" type="text" id="tem2" value="{{ old('tem2', optional($patient)->tem2) }}" placeholder="Enter tem here...">
                    {!! $errors->first('tem2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div> 
    <div class="col-md-12 row" >            
        <div class="col-md-4" style="margin-top: 31px;" >Res.Rate (C/min)</div> 
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('res1') ? 'has-error' : '' }}">
                <label for="res1" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="res1" type="text" id="res1" value="{{ old('res1', optional($patient)->res1) }}" placeholder="Enter res here...">
                    {!! $errors->first('res1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('res2') ? 'has-error' : '' }}">
                <label for="res2" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="res2" type="text" id="res2" value="{{ old('res2', optional($patient)->res2) }}" placeholder="Enter res here...">
                    {!! $errors->first('res2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div> 
    <div class="col-md-12 row" >            
        <div class="col-md-4" style="margin-top: 31px;" >PR (bpm)</div>       
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('pr1') ? 'has-error' : '' }}">
                <label for="pr1" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="pr1" type="text" id="pr1" value="{{ old('pr1', optional($patient)->pr1) }}" placeholder="Enter pr here...">
                    {!! $errors->first('pr1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('pr2') ? 'has-error' : '' }}">
                <label for="pr2" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="pr2" type="text" id="pr2" value="{{ old('pr2', optional($patient)->pr2) }}" placeholder="Enter pr here...">
                    {!! $errors->first('pr2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div> 
    <div class="col-md-12 row" >
        <div class="col-md-4" >BP (mmHg)</div>       
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('bp1') ? 'has-error' : '' }}">
                <label for="bp1" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="bp1" type="text" id="bp1" value="{{ old('bp1', optional($patient)->bp1) }}" placeholder="Enter bp here...">
                    {!! $errors->first('bp1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('bp2') ? 'has-error' : '' }}">
                <label for="bp2" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="bp2" type="text" id="bp2" value="{{ old('bp2', optional($patient)->bp2) }}" placeholder="Enter bp here...">
                    {!! $errors->first('bp2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div> 
    <div class="col-md-12 row" >
        <div class="col-md-4" >SPO2 (%)</div>     
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('sp1') ? 'has-error' : '' }}">
                <label for="sp1" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="sp1" type="text" id="sp1" value="{{ old('sp1', optional($patient)->sp1) }}" placeholder="Enter sp here...">
                    {!! $errors->first('sp1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4" >
            <div class="form-group {{ $errors->has('sp2') ? 'has-error' : '' }}">
                <label for="sp2" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="sp2" type="text" id="sp2" value="{{ old('sp2', optional($patient)->sp2) }}" placeholder="Enter sp here...">
                    {!! $errors->first('sp2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('other_findings') ? 'has-error' : '' }}">
    <label for="other_findings" class="col-md-12 control-label">Other examination findings</label>
    <div class="col-md-10">
        <textarea class="form-control" name="other_findings" type="text" id="other_findings" value="" placeholder="Enter other examination findings here...">{{ old('other_findings', optional($patient)->other_findings) }}</textarea>
        {!! $errors->first('other_findings', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group ">
    <label for="" class="col-md-12 control-label">Investigation RT-PCR</label>
</div>

<div class="form-group ">
    <div class="col-md-12 row">
        <table border="1px" class="table-responsive" style=" margin-left: auto; margin-right: auto; overflow:auto;">
        <tr>
            <td>Date</td>
            <td><input class="form-control" name="date1" type="date" id="date1" value="{{ old('date1', optional($patient)->date1) }}" placeholder="Enter date1 here..."></td>
            <td><input class="form-control" name="date2" type="date" id="date2" value="{{ old('date2', optional($patient)->date2) }}" placeholder="Enter date2 here..."></td>
            <td><input class="form-control" name="date3" type="date" id="date3" value="{{ old('date3', optional($patient)->date3) }}" placeholder="Enter date3 here..."></td>
            <td><input class="form-control" name="date4" type="date" id="date4" value="{{ old('date4', optional($patient)->date4) }}" placeholder="Enter date4 here..."></td>
            <td><input class="form-control" name="date5" type="date" id="date5" value="{{ old('date5', optional($patient)->date5) }}" placeholder="Enter date5 here..."></td>
            <td><input class="form-control" name="date6" type="date" id="date6" value="{{ old('date6', optional($patient)->date6) }}" placeholder="Enter date6 here..."></td>
            <td><input class="form-control" name="date7" type="date" id="date7" value="{{ old('date7', optional($patient)->date7) }}" placeholder="Enter date7 here..."></td>
        </tr>
        <tr>
            <td>PCR/RAT</td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat1" id="pcr_rat1" value="1" {{ old('pcr_rat1', optional($patient)->pcr_rat1)==1?'checked':'' }} >Yes
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat1" id="pcr_rat1" value="2" {{ old('pcr_rat1', optional($patient)->pcr_rat1)==2?'checked':'' }}>No
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat2" id="pcr_rat2" value="1" {{ old('pcr_rat2', optional($patient)->pcr_rat2)==1?'checked':'' }} >Yes
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat2" id="pcr_rat2" value="2" {{ old('pcr_rat2', optional($patient)->pcr_rat2)==2?'checked':'' }}>No
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat3" id="pcr_rat3" value="1" {{ old('pcr_rat3', optional($patient)->pcr_rat3)==1?'checked':'' }}>Yes
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat3" id="pcr_rat3" value="2" {{ old('pcr_rat3', optional($patient)->pcr_rat3)==2?'checked':'' }}>No
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat4" id="pcr_rat4" value="1" {{ old('pcr_rat4', optional($patient)->pcr_rat4)==1?'checked':'' }}>Yes
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat4" id="pcr_rat4" value="2" {{ old('pcr_rat4', optional($patient)->pcr_rat4)==2?'checked':'' }}>No
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat5" id="pcr_rat5" value="1" {{ old('pcr_rat5', optional($patient)->pcr_rat5)==1?'checked':'' }}>Yes
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat5" id="pcr_rat5" value="2" {{ old('pcr_rat5', optional($patient)->pcr_rat5)==2?'checked':'' }}>No
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat6" id="pcr_rat6" value="1" {{ old('pcr_rat6', optional($patient)->pcr_rat6)==1?'checked':'' }}>Yes
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat6" id="pcr_rat6" value="2" {{ old('pcr_rat6', optional($patient)->pcr_rat6)==2?'checked':'' }}>No
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat7" id="pcr_rat7" value="1" {{ old('pcr_rat7', optional($patient)->pcr_rat7)==1?'checked':'' }}>Yes
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat7" id="pcr_rat7" value="2" {{ old('pcr_rat7', optional($patient)->pcr_rat7)==2?'checked':'' }}>No
                    </label>    
                </div>
            </td>
        </tr>
        <tr>
            <td>Positive / Negative</td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res1" id="pcr_rat_res1" value="1" {{ old('pcr_rat_res1', optional($patient)->pcr_rat_res1)==1?'checked':'' }}>Positive
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res1" id="pcr_rat_res1" value="2" {{ old('pcr_rat_res1', optional($patient)->pcr_rat_res1)==2?'checked':'' }}>Negative
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res2" id="pcr_rat_res2" value="1" {{ old('pcr_rat_res2', optional($patient)->pcr_rat_res2)==1?'checked':'' }}>Positive
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res2" id="pcr_rat_res2" value="2" {{ old('pcr_rat_res2', optional($patient)->pcr_rat_res2)==2?'checked':'' }}>Negative
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res3" id="pcr_rat_res3" value="1" {{ old('pcr_rat_res3', optional($patient)->pcr_rat_res3)==1?'checked':'' }}>Positive
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res3" id="pcr_rat_res3" value="2" {{ old('pcr_rat_res3', optional($patient)->pcr_rat_res3)==2?'checked':'' }}>Negative
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res4" id="pcr_rat_res4" value="1" {{ old('pcr_rat_res4', optional($patient)->pcr_rat_res4)==1?'checked':'' }}>Positive
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res4" id="pcr_rat_res4" value="2" {{ old('pcr_rat_res4', optional($patient)->pcr_rat_res4)==2?'checked':'' }}>Negative
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res5" id="pcr_rat_res5" value="1" {{ old('pcr_rat_res5', optional($patient)->pcr_rat_res5)==1?'checked':'' }}>Positive
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res5" id="pcr_rat_res5" value="2" {{ old('pcr_rat_res5', optional($patient)->pcr_rat_res5)==2?'checked':'' }}>Negative
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res6" id="pcr_rat_res6" value="1" {{ old('pcr_rat_res6', optional($patient)->pcr_rat_res6)==1?'checked':'' }}>Positive
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res6" id="pcr_rat_res6" value="2" {{ old('pcr_rat_res6', optional($patient)->pcr_rat_res6)==2?'checked':'' }}>Negative
                    </label>    
                </div>
            </td>
            <td>
                <div class="form-group">
                    <label></label>
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res7" id="pcr_rat_res7" value="1" {{ old('pcr_rat_res7', optional($patient)->pcr_rat_res7)==1?'checked':'' }}>Positive
                    </label> &nbsp;
                    <label class="radio-inline">
                        <input type="radio" name="pcr_rat_res7" id="pcr_rat_res7" value="2" {{ old('pcr_rat_res7', optional($patient)->pcr_rat_res7)==2?'checked':'' }}>Negative
                    </label>    
                </div>
            </td>
        </tr>
        </table>
    </div>
</div>

<div class="form-group {{ $errors->has('treatment') ? 'has-error' : '' }}">
    <label for="treatment" class="col-md-12 control-label">Treatment</label>
    <div class="col-md-10">
        <textarea class="form-control" name="treatment" type="text" id="treatment" value="" placeholder="Enter treatment here...">{{ old('treatment', optional($patient)->treatment) }}</textarea>
        {!! $errors->first('treatment', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('discharge_plan') ? 'has-error' : '' }}">
    <label for="discharge_plan" class="col-md-12 control-label">Discharge plan</label>
    <div class="col-md-10">
        <textarea class="form-control" name="discharge_plan" type="text" id="discharge_plan" value="" placeholder="Enter discharge plan here...">{{ old('discharge_plan', optional($patient)->discharge_plan) }}</textarea>
        {!! $errors->first('discharge_plan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group ">
    <label for="" class="col-md-12 control-label">Home quarantine for 4 days</label>

    <div class="col-md-12 row" > 
        <div class="col-md-6" >From</div>    
        <div class="col-md-6" >To</div>
    </div> 
    <div class="col-md-12 row" >    
        <div class="col-md-6" >
            <div class="form-group {{ $errors->has('home_quarantine_from') ? 'has-error' : '' }}">
                <label for="home_quarantine_from" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="home_quarantine_from" type="date" id="home_quarantine_from" value="{{ old('home_quarantine_from', optional($patient)->home_quarantine_from) }}" placeholder="Enter home_quarantine_from here...">
                    {!! $errors->first('home_quarantine_from', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="form-group {{ $errors->has('home_quarantine_to') ? 'has-error' : '' }}">
                <label for="home_quarantine_to" class="col-md-2 control-label"></label>
                <div class="col-md-10">
                    <input class="form-control" name="home_quarantine_to" type="date" id="home_quarantine_to" value="{{ old('home_quarantine_to', optional($patient)->home_quarantine_to) }}" placeholder="Enter home_quarantine_to here...">
                    {!! $errors->first('home_quarantine_to', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('remark_investigations') ? 'has-error' : '' }}">
    <label for="remark_investigations" class="col-md-12 control-label">Remarks - if any investigations done state here</label>
    <div class="col-md-10">
        <textarea class="form-control" name="remark_investigations" type="text" id="remark_investigations" value="" placeholder="Enter remark investigations here...">{{ old('remark_investigations', optional($patient)->remark_investigations) }}</textarea>
        {!! $errors->first('remark_investigations', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mo_icc') ? 'has-error' : '' }}">
    <label for="mo_icc" class="col-md-12 control-label">MO-IC/ MO, ICC Affiliated to divisional hospital digana</label>
    <div class="col-md-10">
        <textarea class="form-control" name="mo_icc" type="text" id="mo_icc" value="" placeholder="Enter mo icc here...">{{ old('mo_icc', optional($patient)->mo_icc) }}</textarea>
        {!! $errors->first('mo_icc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="col-md-12 row" > 
    <div class="col-md-6" >Signature</div>    
    <div class="col-md-6" >Date</div>
</div> 
<div class="col-md-12 row" >  
    <div class="col-md-6" >
        <div class="form-group {{ $errors->has('signature') ? 'has-error' : '' }}">
            <div class="col-md-12">
                <textarea class="form-control" name="signature" type="text" id="signature" value="" placeholder="Enter signature here...">{{ old('signature', optional($patient)->signature) }}</textarea>
                {!! $errors->first('signature', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>  
    <div class="col-md-6" >
        <div class="form-group {{ $errors->has('sign_date') ? 'has-error' : '' }}"> 
            <div class="col-md-12">
                <input class="form-control" name="sign_date" type="date" id="sign_date" value="{{ old('sign_date', optional($patient)->sign_date) }}" placeholder="Enter sign_date here...">
                {!! $errors->first('sign_date', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    
</div>

<!-- 


<div class="form-group {{ $errors->has('other') ? 'has-error' : '' }}">
    <label for="other" class="col-md-2 control-label">Other (user)</label>
    <div class="col-md-10">
        <input class="form-control" name="other" type="text" id="other" value="{{ old('other', optional($patient)->other) }}" placeholder="Enter other data here...">
        {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->



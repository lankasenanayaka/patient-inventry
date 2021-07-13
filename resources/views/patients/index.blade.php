@extends('layouts.admin')

@section('main-content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Patients</h4>
            </div>

            <form class="form-inline">
                <div class="btn-group btn-group-sm pull-right" role="group">
                    <a href="{{ route('patients.patient.create') }}" class="btn btn-success" title="Create New Patient">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                </div>

                <div class="form-group mb-2">
                    
                </div>

                <div class="form-group  mx-sm-3 mb-2">
                    <label for="discharged" class="col-md-4 control-label">Discharged</label>
                    <div class="col-md-8">
                        <input readonly class="form-control datepicker" name="discharged" type="text" id="discharged" value="{{ ($discharged)?date('d M, Y', strtotime($discharged)):"" }}" placeholder="Discharge date">
                    </div>
                </div>

                <div class="form-group mx-sm-3 mb-2">
                    <label for="bed_id" class="col-md-4 control-label">Bed</label>
                    <div class="col-md-8">
                        <select class="form-control select" id="bed_id" name="bed_id">
                            <option value="" style="display: none;" {{ $bed_id == '' ? 'selected' : '' }} disabled selected>Select bed</option>
                            @foreach ($Beds as $key => $Bed)
                                <option value="{{ $key }}" {{ $bed_id == $key ? 'selected' : '' }}>
                                {{ $Bed }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group mx-sm-2 mb-2">
                    <label for="icc_no" class="col-md-2 control-label">BHT no</label>
                    <div class="col-md-8">
                        <input class="form-control" name="icc_no" type="text" id="icc_no" value="{{ $icc_no }}" min="0" placeholder="Enter bht no here...">
                    </div>
                </div>

                <!-- <div class="form-group mx-sm-3 mb-2">
                    <label for="bed_category" class="col-md-4 control-label">Bed category</label>
                    <div class="col-md-8"> 
                    <select class="form-control" id="bed_category" name="bed_category">
                        <option value=""  {{ $bed_category == '' ? 'selected' : '' }} >Select bed category</option>
                        @foreach ($BedCateories as $key => $BedCateory)
                            <option value="{{ $key }}" {{ $bed_category == $key ? 'selected' : '' }}>
                                {{ utf8_decode($BedCateory) }}
                            </option>
                        @endforeach
                    </select>        
                    </div>
                </div> -->
                
                @if($download_url!="")
                <a href="{{ url('patients/download?'.$download_url) }}">
                <button type="button" style="border: 1px solid #cbd5e0;" class="btn btn-default mb-2">                
                    <span class="fa fa-download" aria-hidden="true"></span>
                </button>
                </a>
                &nbsp;&nbsp;
                @endif
                <button type="submit" class="btn btn-primary mb-2">                
                <span class="fa fa-search" aria-hidden="true"></span>
                </button>
            </form>

        </div>
        
        @if(count($patients) == 0)
            <div class="panel-body text-center">
            <br/>
                <h4>No Patients Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">

       

            <div class="table-responsive">
            
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Discharge</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Date of discharge</th>
                            <th>TP NO</th>
                            <th>Moh Area</th>
                            <th>Bed</th>
                            <th>BHT</th>
                            <th>Destination</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td>
                                @if(!$patient->is_discharged)
                                <form method="POST" action="{!! route('patients.patient.discharge', $patient->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="POST" type="hidden">
                                    {{ csrf_field() }}
                                    <div class="btn-group btn-group-xs pull-right" role="group">                                        
                                        <button type="submit" class="btn btn-warning" title="Discharge Patient" onclick="return confirm(&quot;Click Ok to discharge Patient.&quot;)">
                                            <span class="fa fa-user-minus" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </form>   
                                @endif                             
                            </td>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->age }}</td>
                            <td>{{ $patient->discharged }}</td>
                            <td>{{ $patient->contact_no }}</td>
                            <td>{{ optional($patient->MohArea)->name }}</td>
                            <td>{{ optional($patient->Bed)->bed_name }}</td>
                            <td>{{ $patient->icc_no}}</td>
                            <td>{{ $patient->destination}}</td>

                            <td>

                                <form method="POST" action="{!! route('patients.patient.destroy', $patient->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <button type="button" style="border: 1px solid #cbd5e0;" onclick="printCertificate('{{ url('patients/generate-pdf/'.$patient->id ) }}');" class="btn btn-default" title="Print certificate">
                                            <span class="fa fa-print" aria-hidden="true"></span>
                                        </button>
                                        &nbsp;&nbsp;
                                        <a href="{{ route('patients.patient.show', $patient->id ) }}" class="btn btn-info" title="Show Patient">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('patients.patient.edit', $patient->id ) }}" class="btn btn-primary" title="Edit Patient">
                                            <span class="fa fa-edit" aria-hidden="true"></span>
                                        </a>
                                        
                                        <button type="submit" class="btn btn-danger" title="Delete Patient" onclick="return confirm(&quot;Click Ok to delete Patient.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $patients->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
@extends('layouts.admin')

@section('main-content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($patient->name) ? $patient->name : 'Patient' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('patients.patient.destroy', $patient->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('patients.patient.index') }}" class="btn btn-primary" title="Show All Patient">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('patients.patient.create') }}" class="btn btn-success" title="Create New Patient">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('patients.patient.edit', $patient->id ) }}" class="btn btn-primary" title="Edit Patient">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Patient" onclick="return confirm(&quot;Click Ok to delete Patient.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $patient->name }}</dd>
            <dt>Age</dt>
            <dd>{{ $patient->age }}</dd>
            <dt>Contact No</dt>
            <dd>{{ $patient->contact_no }}</dd>
            <dt>Address</dt>
            <dd>{{ $patient->address }}</dd>
            <dt>Moh Area</dt>
            <dd>{{ optional($patient->MohArea)->name }}</dd>
            <dt>Bed</dt>
            <dd>{{ optional($patient->Bed)->bed_name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $patient->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $patient->updated_at }}</dd>
            <dt>User</dt>
            <dd>{{ optional($patient->User)->name }}</dd>

        </dl>

    </div>
</div>

@endsection
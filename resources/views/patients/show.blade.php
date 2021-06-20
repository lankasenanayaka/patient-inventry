@extends('layouts.admin')

@section('main-content')
<style>
tr {
  text-align: center;
}
table { background-color:#e7e9eb; margin: 50px;width: 800px;height: 500px;}
}

@media print {
body {
    font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #4a5568;
    text-align: left;
}

tr {
  text-align: center;
}
th {
  text-align: center;
}
td {
  text-align: center;
}
td {
  padding-top: 50px;
}
table { background-color:#e7e9eb; margin: 50px;width: 800px;height: 500px;}
}
</style>

<script >
function printCertificate(){
    w=window.open();
    w.document.write('<html><head><title>Patient Certificate</title>');
    w.document.write('<link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}" type="text/css" />');

    w.document.write('<style>');
    w.document.write('body { font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";  font-size: .875rem; font-weight: 400; line-height: 1.5; color: #4a5568; text-align: left;} tr {  text-align: center;} th {   text-align: center; } td { text-align: center; } td { padding-top: 50px; } table { background-color:#e7e9eb; margin: 50px;width: 800px;height: 500px;} ');
    w.document.write('</style>');

    w.document.write('</head><body >');
    w.document.write(document.getElementById("print_patient").innerHTML);    
    w.document.write('</body></html>');
    w.print();
    w.close();
}
</script>
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

                    <!-- <a href="{{ route('patients.patient.create') }}" class="btn btn-success" title="Create New Patient">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('patients.patient.edit', $patient->id ) }}" class="btn btn-primary" title="Edit Patient">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a> -->
                    &nbsp;&nbsp;
                    <button type="button" onclick="printCertificate();" class="btn btn-success" >
                        PRINT
                    </button>
                </div>
            </form>

        </div>

    </div>

    <!-- <div class="panel-body">
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
    </div> -->
    
    <div id="print_patient" class="panel-body" style="margin:10px; "> 
        <table >
            <thead>
            <tr><th> CERTIFICATE OF COMPLETION OF QUARANTINE </th></tr>
            </thead>
            <tbody>
            <tr><th>Mr/Mrs/Miss/Rev : {{ $patient->name }} </th></tr>
            <tr><th>(SARS Cov - 2 RNA (PCR) was positive on : {{ $patient->positive_on }} )</th></tr>
            <tr><th> Has successfully completed 10 days of quarantine at COVID 19 Treatment center {{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</th></tr>
            <tr><th>DOA : {{ $patient->admitted }} DOD : {{ $patient->discharged }} </th></tr>
            <tr><th>Suggest 04 days of home quarantine </th></tr>
            <tr><th>&nbsp;&nbsp;</th></tr>
            <tr><th>Doctor in charge</th></tr>
            <tr><th>Covid19 treatment center {{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</th></tr>
            </tbody>
        </table>
        
    </div>
</div>

@endsection
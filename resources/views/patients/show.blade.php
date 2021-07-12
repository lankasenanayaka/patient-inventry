@extends('layouts.admin')

@section('main-content')
<style>
body {
-webkit-print-color-adjust:exact;
}
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

#tbl1 {background-color:#e7e9eb; }

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
    w.document.write('<style>body {    font-family: Nunito,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";    font-size: .875rem;    font-weight: 400;    line-height: 1.5;    color: #4a5568;    text-align: left;}#tbl1 {background-color:#e7e9eb; }tr {  text-align: center;}th {  text-align: center;}td {  text-align: center;}td {  padding-top: 50px;}table { background-color:#e7e9eb; margin: 50px;width: 800px;height: 500px;}</style>');

    w.document.write('</head><body >');
    w.document.write(document.getElementById("print_patient").innerHTML);    
    w.document.write('</body></html>');
    w.print();
    w.close();
}
</script>
<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <!-- <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($patient->name) ? $patient->name : 'Patient' }}</h4>
        </span> -->

        <div class="pull-right">

        <style>
        /* @font-face {
        font-family: 'Hermona';
        font-style: normal;
        font-weight: 400;
        src: local('Hermona'), url({{ storage_path('fonts/Hermona-vmXnA.woff') }}) format('woff');
        }

        @font-face {
        font-family: 'Harlow Solid Italic';  
        font-style: italic;
        font-weight: 400;
        src: local('Harlow Solid Italic'), url({{ storage_path('fonts/HARLOWSI_1.woff') }}) format('woff');
        } */
        body{margin: 0px; background-color: rgb(253, 247, 242);}main{max-width: 1024px; margin: 20px; padding: 50px; border: 4px dotted brown;}h1{margin-top: 0px; text-align: center; font-size: 4rem; font-family: "Hermona", sans-serif; font-weight: bolder; color: brown; -webkit-text-stroke: 0.01px white; text-shadow: 0px 3px 5px brown; letter-spacing: 0.075em;}p{text-align: center; font-size: 1.25rem; margin: 10px 0px; color: rgb(71, 71, 71); font-family: sans-serif; letter-spacing: 0.025em;}h4{font-family: "Hermona", sans-serif; text-align: center; color: rgb(3, 3, 129); font-weight: 400; font-size: 2rem; letter-spacing: 0.1rem; margin: 20px auto;}.bottom{width: 100%; margin: auto; background: brown; padding: 4px 0px; border-radius: 9999px;}.bottom p{font-size: 2rem !important; margin: 1px 0px !important; color: white !important; font-family: "Harlow Solid Italic", sans-serif !important;}
      /* body{margin: 0px; background-color: rgb(253, 247, 242);}main{max-width: 1024px; margin: 15px; padding: 30px; border: 4px dotted brown;}h3{margin-top: 0px; text-align: center; font-size: 4rem; font-family: "Hermona", sans-serif; font-weight: bolder; color: brown; -webkit-text-stroke: 0.01px white; text-shadow: 0px 3px 5px brown; letter-spacing: 0.075em;}p{text-align: center; font-size: 1.25rem; margin: 10px 0px; color: rgb(71, 71, 71); font-family: sans-serif; letter-spacing: 0.025em;}h4{font-family: "Hermona", sans-serif; text-align: center; color: rgb(3, 3, 129); font-weight: 400; font-size: 2rem; letter-spacing: 0.1rem; margin: 20px auto;}.bottom{width: 100%; margin: auto; background: brown; padding: 4px 0px; border-radius: 9999px;}.bottom p{font-size: 2rem !important; margin: 1px 0px !important; color: white !important; font-family: "Harlow Solid Italic", sans-serif !important;} */
      .title{
         margin-top: 0px; text-align: center; font-size: 2rem; font-family: "Hermona", sans-serif; font-weight: bolder; color: brown; -webkit-text-stroke: 0.01px white; text-shadow: 0px 3px 5px brown; letter-spacing: 0.075em;
      }
      .footer-text{font-size: 2rem !important; margin: 1px 0px !important; color: white !important; font-family: "Harlow Solid Italic", sans-serif !important;}
      </style>
            <form method="POST" action="{!! route('patients.patient.destroy', $patient->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('patients.patient.index') }}" class="btn btn-primary" title="Show All Patient">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    &nbsp;&nbsp;
                    <!-- <a href="/patients/generate-pdf/{{ $patient->id }}" target="__blank" >
                    <button type="button"  class="btn btn-success" >
                        PRINT
                    </button>
                    </a> -->
                    <!-- <button type="button" onclick="printCertificate();" class="btn btn-success" >
                        PRINT
                    </button> -->
                </div>
            </form>

        </div>

    </div>

    <table id="tbl1" align="center" height="400" >
            <thead>
            <tr><th class="title" > CERTIFICATE OF COMPLETION OF QUARANTINE </th></tr>
            </thead>
            <tbody>
            <tr><th>Mr/Mrs/Miss/Rev : {{ $patient->name }} </th></tr>
            <tr><th>(SARS Cov - 2 RNA (PCR/RAT) was positive on : {{ $patient->positive_on }} )</th></tr>
            <tr><th> Has successfully completed 10 days of quarantine at {{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</th></tr>
            <tr><th>DOA : {{ $patient->admitted }} DOD : {{ $patient->discharged }} </th></tr>
            <tr><th>Suggest 04 days of home quarantine (from {{ $patient->home_quarantine_from }} to {{ $patient->home_quarantine_to }}) </th></tr>
            <tr><th>&nbsp;&nbsp;</th></tr>
            <tr><th>Doctor in charge</th></tr>
            <tr><th class="footer-text" > {{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</th></tr>
            </tbody>
        </table>
    <!-- <div id="print_patient" class="panel-body" style="margin:10px; "> 
        <table id="tbl1" >
            <thead>
            <tr><th> CERTIFICATE OF COMPLETION OF QUARANTINE </th></tr>
            </thead>
            <tbody>
            <tr><th>Mr/Mrs/Miss/Rev : {{ $patient->name }} </th></tr>
            <tr><th>(SARS Cov - 2 RNA (PCR/RAT) was positive on : {{ $patient->positive_on }} )</th></tr>
            <tr><th> Has successfully completed 10 days of quarantine at {{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</th></tr>
            <tr><th>DOA : {{ $patient->admitted }} DOD : {{ $patient->discharged }} </th></tr>
            <tr><th>Suggest 04 days of home quarantine (from {{ $patient->home_quarantine_from }} to {{ $patient->home_quarantine_to }}) </th></tr>
            <tr><th>&nbsp;&nbsp;</th></tr>
            <tr><th>Doctor in charge</th></tr>
            <tr><th> {{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</th></tr>
            </tbody>
        </table>
        
    </div> -->

</div>

@endsection
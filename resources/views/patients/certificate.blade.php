<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Patient certificate</title>
      <link href="http://fonts.cdnfonts.com/css/hermona" rel="stylesheet"/>
      <link href="http://fonts.cdnfonts.com/css/harlow-solid-italic" rel="stylesheet"/>
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
   </head>
   <body>
      <main id="print_patient" >
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
         <!-- <h1>CERTIFICATE OF COMPLETION OF<br>QUARANTINE</h1>
         <p>Mr/Mrs/Miss/Rev. <strong>{{ $patient->name }} </strong></p>
         <p> (SARS Cov-2 RNA (PCR/RAT) was possitive on <strong>{{ $patient->positive_on }}</strong> ) </p>
         <p>has successfully completed 10 days of quarantine</p>
         <p>at</p>
         <h4>{{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</h4>
         <p> DOA <strong>{{ $patient->admitted }}</strong >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DOD <strong>{{ $patient->discharged }}</strong> </p>
         <p>suggests 04 days of home quarantine (from {{ $patient->home_quarantine_from }} to {{ $patient->home_quarantine_to }})</p>
         <p><strong><br/></strong></p>
         <p>Doctor incharge</p>
         <div class="bottom">
            <p>{{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }}</p>
         </div> -->
         
      </main>
      <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" >
      $(document).ready(function () {
         window.print();
      });
      </script>
   </body>
</html>

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
      /* body{margin: 0px; background-color: rgb(253, 247, 242);}main{max-width: 1024px; margin: 20px; padding: 50px; border: 4px dotted brown;}h1{margin-top: 0px; text-align: center; font-size: 4rem; font-family: "Hermona", sans-serif; font-weight: bolder; color: brown; -webkit-text-stroke: 0.01px white; text-shadow: 0px 3px 5px brown; letter-spacing: 0.075em;}p{text-align: center; font-size: 1.25rem; margin: 10px 0px; color: rgb(71, 71, 71); font-family: sans-serif; letter-spacing: 0.025em;}h4{font-family: "Hermona", sans-serif; text-align: center; color: rgb(3, 3, 129); font-weight: 400; font-size: 2rem; letter-spacing: 0.1rem; margin: 20px auto;}.bottom{width: 100%; margin: auto; background: brown; padding: 4px 0px; border-radius: 9999px;}.bottom p{font-size: 2rem !important; margin: 1px 0px !important; color: white !important; font-family: "Harlow Solid Italic", sans-serif !important;}
      .title{
         margin-top: 0px; text-align: center; font-size: 2rem; font-family: "Hermona", sans-serif; font-weight: bolder; color: brown; -webkit-text-stroke: 0.01px white; text-shadow: 0px 3px 5px brown; letter-spacing: 0.075em;
      }
      .footer-text{font-size: 2rem !important; margin: 1px 0px !important; color: white !important; font-family: "Harlow Solid Italic", sans-serif !important;}
      */
      #table1 tr td {
         border: 1px solid black;
         padding-top:8px;
      }
      #table2 tr td {
         border: 1px solid black;
         padding-top:8px;
      }
      #table3 tr td {
         border: 1px solid black;
         padding-top:2px;
      }
      table {
         border-collapse: collapse;
      }
      table td{
         padding-top:2px;
      }
      </style>
   </head>
   <body>
      <main id="print_patient" style="height:900px" >
         <table id="tbl1" align="center" height="400" >
            <thead>
            <tr><th colspan="3"> {{ ($patient->user && $patient->user->name)?$patient->user->name:"" }} <br/> {{ ($patient->user && $patient->user->last_name)?$patient->user->last_name:"" }} </th></tr>
            <!-- <tr>
               <th colspan="3"> 
                  TP : &nbsp;&nbsp; EMAIL : {{ ($patient->user && $patient->user->email)?$patient->user->email:"" }} 
               </th>
            </tr> -->
            </thead>
            <tbody>
            <tr><td colspan="3"> <h3>ADMISSION FORM</h3> </td></tr>
            <tr>
               <td colspan="1">
                  <table id="table1">
                     <tbody >                        
                        <tr>
                           <td>BHT</td><td>{{ ($patient->icc_no)?$patient->icc_no:"" }}</td>
                        </tr>
                        <tr>
                           <td>FLOW</td><td></td>
                        </tr>
                        <tr>
                           <td>RAW</td><td></td>
                        </tr>
                        <tr>
                           <td>BED</td><td>{{ optional($patient->Bed)->bed_name }}</td>
                        </tr>
                     </tbody>  
                  </table>
               </td>
               <td colspan="2">
                  <table id="table2">
                     <tbody>
                        <tr>
                           <td></td><td>ADMISSION</td><td>DISCHARGE</td><td>TRANSFER</td>
                        </tr>
                        <tr>
                           <td>DATE</td>
                           <td>{{ ($patient->admitted)?$patient->admitted:"" }}</td>
                           <td>{{ ($patient->discharged)?$patient->discharged:"" }}</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td>TIME</td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>  
                  </table>
               </td>
            </tr>
            <tr>
               <td>1. Full Name :‐ </td>
               <td> {{ ($patient->name)?$patient->name:"" }} </td>
            </tr>
            <tr>
               <td>2. AGE :‐ </td>
               <td> {{ ($patient->age)?$patient->age:"" }} </td>
            </tr>
            <tr>
               <td>3. GENDER :‐ </td>
               <td> {{ ($patient->sex)? (($patient->sex==1)?"Male":"Female"):"" }} </td>
            </tr>
            <tr>
               <td>4. ADDRESS :‐ </td>
               <td> {{ ($patient->address)?$patient->address:"" }} </td>
            </tr>
            <tr>
               <td>5. PCR/RAT DATE :‐ </td>
               <td >
                  <table id="table3" >
                     <tbody>
                        <tr>
                           <td></td><td>PCR/RAT</td><td>Date</td><td>Positive/Negative</td>
                        </tr>
                        @if($patient->pcr_rat1)
                        <tr>
                           <td>DATE</td>
                           <td>                           
                              {{ optional($patient)->pcr_rat1==1?'PCR':'' }}
                              {{ optional($patient)->pcr_rat1==2?'RAT':'' }}
                           </td>
                           <td> 
                              {{ ($patient->date1)?$patient->date1:"" }}
                           </td>
                           <td>
                              {{ optional($patient)->pcr_rat_res1==1?'Positive':'' }}
                              {{ optional($patient)->pcr_rat_res1==2?'Negative':'' }}
                           </td>
                        </tr>
                        @endif
                        @if($patient->pcr_rat2)
                        <tr>
                           <td>DATE</td>
                           <td>                           
                              {{ optional($patient)->pcr_rat2==1?'PCR':'' }}
                              {{ optional($patient)->pcr_rat2==2?'RAT':'' }}
                           </td>
                           <td> 
                              {{ ($patient->date1)?$patient->date2:"" }}
                           </td>
                           <td>
                              {{ optional($patient)->pcr_rat_res2==1?'Positive':'' }}
                              {{ optional($patient)->pcr_rat_res2==2?'Negative':'' }}
                           </td>
                        </tr>
                        @endif
                        @if($patient->pcr_rat3)
                        <tr>
                           <td>DATE</td>
                           <td>                           
                              {{ optional($patient)->pcr_rat3==1?'PCR':'' }}
                              {{ optional($patient)->pcr_rat3==2?'RAT':'' }}
                           </td>
                           <td> 
                              {{ ($patient->date1)?$patient->date3:"" }}
                           </td>
                           <td>
                              {{ optional($patient)->pcr_rat_res3==1?'Positive':'' }}
                              {{ optional($patient)->pcr_rat_res3==2?'Negative':'' }}
                           </td>
                        </tr>
                        @endif
                        @if($patient->pcr_rat4)
                        <tr>
                           <td>DATE</td>
                           <td>                           
                              {{ optional($patient)->pcr_rat4==1?'PCR':'' }}
                              {{ optional($patient)->pcr_rat4==2?'RAT':'' }}
                           </td>
                           <td> 
                              {{ ($patient->date1)?$patient->date4:"" }}
                           </td>
                           <td>
                              {{ optional($patient)->pcr_rat_res4==1?'Positive':'' }}
                              {{ optional($patient)->pcr_rat_res4==2?'Negative':'' }}
                           </td>
                        </tr>
                        @endif
                        @if($patient->pcr_rat5)
                        <tr>
                           <td>DATE</td>
                           <td>                           
                              {{ optional($patient)->pcr_rat5==1?'PCR':'' }}
                              {{ optional($patient)->pcr_rat5==2?'RAT':'' }}
                           </td>
                           <td> 
                              {{ ($patient->date1)?$patient->date5:"" }}
                           </td>
                           <td>
                              {{ optional($patient)->pcr_rat_res5==1?'Positive':'' }}
                              {{ optional($patient)->pcr_rat_res5==2?'Negative':'' }}
                           </td>
                        </tr>
                        @endif
                        @if($patient->pcr_rat6)
                        <tr>
                           <td>DATE</td>
                           <td>                           
                              {{ optional($patient)->pcr_rat6==1?'PCR':'' }}
                              {{ optional($patient)->pcr_rat6==2?'RAT':'' }}
                           </td>
                           <td> 
                              {{ ($patient->date1)?$patient->date6:"" }}
                           </td>
                           <td>
                              {{ optional($patient)->pcr_rat_res6==1?'Positive':'' }}
                              {{ optional($patient)->pcr_rat_res6==2?'Negative':'' }}
                           </td>
                        </tr>
                        @endif
                        @if($patient->pcr_rat7)
                        <tr>
                           <td>DATE</td>
                           <td>                           
                              {{ optional($patient)->pcr_rat7==1?'PCR':'' }}
                              {{ optional($patient)->pcr_rat7==2?'RAT':'' }}
                           </td>
                           <td> 
                              {{ ($patient->date1)?$patient->date7:"" }}
                           </td>
                           <td>
                              {{ optional($patient)->pcr_rat_res7==1?'Positive':'' }}
                              {{ optional($patient)->pcr_rat_res7==2?'Negative':'' }}
                           </td>
                        </tr>
                        @endif
                     </tbody>  
                  </table>
               </td>
            </tr>
            <tr>
               <td>6. TEL NO :‐ </td>
               <td> {{ ($patient->contact_no)?$patient->contact_no:"" }} </td>
            </tr>
            <tr>
               <td>7. ID NUMBER :‐ </td>
               <td> {{ ($patient->nic)?$patient->nic:"" }} </td>
            </tr>
            <tr>
               <td> 8. DISTRICT :‐ </td>
               <td> {{ ($patient->district)?$patient->district:"" }} </td>
            </tr>
            <tr>
               <td> 9. POLICE STATION :‐ </td>
               <td> {{ ($patient->police_station)?$patient->police_station:"" }} </td>
            </tr>
            <tr>
               <td> 10.GS DIVISION :‐ </td>
               <td> {{ ($patient->gs_division)?$patient->gs_division:"" }} </td>
            </tr>
            <tr>
               <td> 11.DESTINATION :‐ </td>
               <td> {{ ($patient->destination)?$patient->destination:"" }} </td>
            </tr>
            <tr>
               <td> 12.MOH AREA :‐ </td>
               <td> {{ optional($patient->MohArea)->name }} </td>
            </tr>
            <tr>
               <td> 13.DATE OF VACCINATION :‐ </td>
               <td> 1ST   2ND  </td>
            </tr>
            <tr>
               <td> 14.TYPE OF VACCINATION :‐ </td>
               <td> 
                  {{ ($patient->sputnik)? "Sputnik, ":"" }} 
                  {{ ($patient->sinopharm)?"Sinopharm, ":"" }} 
                  {{ ($patient->covishield)?"Covishield, ":"" }} 
                  {{ ($patient->moderna)?"Modernize, ":"" }} 
                  {{ ($patient->faizer)?"Pfizer, ":"" }} 
                  {{ ($patient->astrazenica)?"Astrazenica, ":"" }} 
               </td>
            </tr>
            <tr>
               <td colspan="3"> 
                  <h3>MEDICAL BACKGROUND</h3>
               </td>
            </tr>
            <tr>
               <td> 1. PATIENT’S COMPLAINTS :‐ </td>
               <td> <br/><br/><br/> </td>
            </tr>
            <tr>
               <td> 2. PAST MEDICAL HISTORY :‐ </td>
               <td> 
                  <label class="checkbox-inline">
                     IHD : <input type="checkbox"  {{ optional($patient)->ihd==1?'checked':'' }} >
                  </label> &nbsp;&nbsp;
                  <label class="checkbox-inline">
                     DM : <input type="checkbox"  {{ optional($patient)->dm==1?'checked':'' }} >
                  </label> &nbsp;&nbsp;
                  <label class="checkbox-inline">
                     HTN : <input type="checkbox"  {{ optional($patient)->htn==1?'checked':'' }} >
                  </label>
                  <label class="checkbox-inline">
                     DLD : <input type="checkbox"  {{ optional($patient)->dld==1?'checked':'' }} >
                  </label>
                  <label class="checkbox-inline">
                     BA : <input type="checkbox"  {{ optional($patient)->ba==1?'checked':'' }} >
                  </label>
                  <!-- IHD : &nbsp;&nbsp; DM : &nbsp;&nbsp; HTN : &nbsp;&nbsp; DLD : &nbsp;&nbsp; BA : &nbsp;&nbsp; -->
               </td>
            </tr>
            <tr>
               <td> 3. PAST SURGICAL HISTORY :‐ </td>
               <td> </td>
            </tr>
            <tr>
               <td> 4. ALLERGY :‐ </td>
               <td> 
                  <label class="checkbox-inline">
                  DRUGS : <input type="checkbox"  {{ optional($patient)->drugs==1?'checked':'' }} >
                  </label> &nbsp;&nbsp;
                  <label class="checkbox-inline">
                  FOODS : <input type="checkbox"  {{ optional($patient)->foods==1?'checked':'' }} >
                  </label> &nbsp;&nbsp;
                  <label class="checkbox-inline">
                  PLASTERS : <input type="checkbox"   {{ optional($patient)->plasters==1?'checked':'' }} >
                  </label>                  
               </td>
            </tr>
            <tr>
               <td> 5. MANAGEMENT :‐ </td>
               <td> QURANTINE FOR 14 DAYS FROM PCR/RAT DATE </td>
            </tr>
            <tr>
               <td> 6. DRUGS :‐ </td>
               <td> </td>
            </tr>
            <tr>
               <td colspan="3"> 
                  <h3>ON ADMISSION</h3>
               </td>
            </tr>
            <tr>
               <td colspan="3">
                  SPO2:‐ {{ ($patient->sp1)?$patient->sp1:"" }} % PR:‐ {{ ($patient->pr1)?$patient->pr1:"" }} bpm BP:‐ {{ ($patient->bp1)?$patient->bp1:"" }} mmhg RR:‐ {{ ($patient->res1)?$patient->res1:"" }} bpm Temp:‐ {{ ($patient->tem1)?$patient->tem1:"" }} c  
               </td>
            </tr>

            </tbody>
         </table>
      </main>
      <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
      <script type="text/javascript" >
      $(document).ready(function () {
         window.print();
      });
      </script>
   </body>
</html>

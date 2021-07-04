<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\MohArea;
use App\Models\Patient;
use App\User;
use Illuminate\Http\Request;
use Exception;
use App\Models\BedCategory;

class PatientsController extends Controller
{

    /**
     * Display a listing of the patients.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $bed_category = $request->get('bed_category');  
        $discharged = $request->get('discharged');
        $patients = Patient::where('user_id', auth()->user()->id)->with('moharea','bed', 'bed.category','user');
        if($bed_category){            
            $patients->whereHas('bed', function ($query) use ($bed_category) {
                return $query->where('bed_category', '=', $bed_category);
            });
        }
        if($discharged){
            $patients->where('discharged', $discharged);
        }

        $patients = $patients->paginate(25);
        $BedCateories = BedCategory::pluck('name','id')->all();
        
        return view('patients.index', compact('patients','BedCateories','bed_category','discharged'));
    }

    /**
     * Show the form for creating a new patient.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $MohAreas = MohArea::pluck('name','id')->all();
        $Beds = Bed::where('user_id', auth()->user()->id)->pluck('bed_name','id')->all();
        $Users = User::pluck('id','id')->all();
        
        return view('patients.create', compact('MohAreas','Beds','Users'));
    }

    /**
     * Store a new patient in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'contact_no' => 'required|unique:patients,contact_no',
            'nic' => 'required|unique:patients,nic',
        ]);

        try {
            
            $data = $this->getData($request);
            $data['user_id'] = auth()->user()->id;
            Patient::create($data);

            return redirect()->route('patients.patient.index')
                ->with('success_message', 'Patient was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified patient.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $patient = Patient::where('user_id', auth()->user()->id)->with('moharea','bed','user')->findOrFail($id);

        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified patient.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $patient = Patient::where('user_id', auth()->user()->id)->findOrFail($id);
        $MohAreas = MohArea::pluck('name','id')->all();
        $Beds = Bed::pluck('bed_name','id')->all();
        $Users = User::pluck('id','id')->all();

        return view('patients.edit', compact('patient','MohAreas','Beds','Users'));
    }

    /**
     * Update the specified patient in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'contact_no' => 'required|unique:patients,contact_no,'.$id,
            'nic' => 'required|unique:patients,nic,'.$id,
        ]);

        try {
            
            $data = $this->getData($request);
            $data['user_id'] = auth()->user()->id;
            $patient = Patient::where('user_id', auth()->user()->id)->findOrFail($id);
            // dd($data);
            $patient->update($data);

            return redirect()->route('patients.patient.index')
                ->with('success_message', 'Patient was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified patient from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $patient = Patient::where('user_id', auth()->user()->id)->findOrFail($id);
            $patient->delete();

            return redirect()->route('patients.patient.index')
                ->with('success_message', 'Patient was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:0|max:200',
            'age' => 'required|numeric|string|min:0',
            'contact_no' => 'nullable|string|min:0|max:50',
            'address' => 'nullable|string|min:0|max:200',
            'moh_area_id' => 'nullable',
            'bed_id' => 'nullable',
            'user_id' => 'nullable', 
            'nic' => 'required',
            'co_modibilities' => 'nullable',
            'other' => 'nullable',
            'admitted' => 'nullable',
            'discharged' => 'nullable',
            'sex' => 'nullable',
            'district' => 'nullable',
            'police_station' => 'nullable',
            'gs_division' => 'nullable',
            'destination' => 'nullable',
            'positive_on' => 'nullable',
            'icc_no' => 'nullable',
            'diagnosis' => 'nullable',
            'complications' => 'nullable',
            'vaccine1_given' => 'nullable',
            'vaccine2_given' => 'nullable',
            'sputnik' => 'nullable',
            'sinopharm' => 'nullable',
            'covishield' => 'nullable',
            'symptomatic' => 'nullable',
            'symptoms' => 'nullable',
            'tem1' => 'nullable',
            'tem2' => 'nullable',
            'res1' => 'nullable',
            'res2' => 'nullable',
            'pr1' => 'nullable',
            'pr2' => 'nullable',
            'bp1' => 'nullable',
            'bp2' => 'nullable',
            'sp1' => 'nullable',
            'sp2' => 'nullable',
            'other_findings' => 'nullable',
            'date1' => 'nullable',
            'date2' => 'nullable',
            'date3' => 'nullable',
            'date4' => 'nullable',
            'date5' => 'nullable',
            'date6' => 'nullable',
            'date7' => 'nullable',
            'pcr_rat1' => 'nullable',
            'pcr_rat2' => 'nullable',
            'pcr_rat3' => 'nullable',
            'pcr_rat4' => 'nullable',
            'pcr_rat5' => 'nullable',
            'pcr_rat6' => 'nullable',
            'pcr_rat7' => 'nullable',
            'pcr_rat_res1' => 'nullable',
            'pcr_rat_res2' => 'nullable',
            'pcr_rat_res3' => 'nullable',
            'pcr_rat_res4' => 'nullable',
            'pcr_rat_res5' => 'nullable',
            'pcr_rat_res6' => 'nullable',
            'pcr_rat_res7' => 'nullable',
            'treatment' => 'nullable',
            'discharge_plan' => 'nullable',
            'home_quarantine_from' => 'nullable',
            'home_quarantine_to' => 'nullable',
            'remark_investigations' => 'nullable',
            'mo_icc' => 'nullable',
            'sign_date' => 'nullable',
            'signature' => 'nullable',
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function searchPatient(Request $request){
        $search = $request->get('q'); 
        $patients = Patient::where('icc_no','LIKE','%'.$search.'%') 
                    ->orWhere('nic','LIKE','%'.$search.'%')
                    ->orWhere('name','LIKE','%'.$search.'%')
                    ->orWhere('contact_no','LIKE','%'.$search.'%')
                    ->select('id', 'icc_no', 'nic', 'name', 'contact_no')
                    ->limit(50)->get();

        $data = [];
        $patients = $patients->count()>0?$patients->toArray():"";
        if(count($patients)>0){
            foreach($patients as $patient){            
                $patient_lis = array_map("utf8_decode", $patient);
                $data_list['id'] = $patient_lis['id'];                    
                $data_list['text'] = $patient_lis['icc_no']." (nic : ".$patient_lis['nic']." name : ".$patient_lis['name']." contact_no : ".$patient_lis['contact_no'].") ";
                $data[] = $data_list;
            }
        }

        return response()->json(['success'=>true, 'results'=>$data]);
    }

     
    public function availableBeds()
    {
        $patient_details = $this->patientDetailsByCategory();
        $aval =1;
        return view('patients.available_beds', compact('patient_details', 'aval'));
    }

    public function occupiedBeds()
    {
        $patient_details = $this->patientDetailsByCategory();
        $aval =2;
        return view('patients.available_beds', compact('patient_details', 'aval'));
    }
}

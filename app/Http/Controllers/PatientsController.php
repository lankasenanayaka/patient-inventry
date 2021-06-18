<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\MohArea;
use App\Models\Patient;
use App\User;
use Illuminate\Http\Request;
use Exception;

class PatientsController extends Controller
{

    /**
     * Display a listing of the patients.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $patients = Patient::with('moharea','bed','user')->paginate(25);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new patient.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $MohAreas = MohArea::pluck('name','id')->all();
        $Beds = Bed::pluck('bed_name','id')->all();
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
        $patient = Patient::with('moharea','bed','user')->findOrFail($id);

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
        $patient = Patient::findOrFail($id);
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
            $patient = Patient::findOrFail($id);
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
            $patient = Patient::findOrFail($id);
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
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

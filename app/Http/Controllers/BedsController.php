<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\Patient;
use App\User;
use Illuminate\Http\Request;
use Exception;

class BedsController extends Controller
{

    /**
     * Display a listing of the beds.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $occupied_beds = Patient::where('is_discharged', 0)->get()->count();
        $beds_all = Bed::get()->count();

        $available_beds = $beds_all-$occupied_beds;
        $available_beds = ($available_beds >0)?$available_beds:0;

        $widget = [
            'occupied_beds' => $occupied_beds,
            'beds_all' => $beds_all,
            'available_beds' => $available_beds,
        ];

        $beds = Bed::with('user')->paginate(25);

        return view('beds.index', compact('beds', 'widget'));
    }

    /**
     * Show the form for creating a new bed.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('id','id')->all();
        
        return view('beds.create', compact('Users'));
    }

    /**
     * Store a new bed in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'bed_name' => 'required|unique:bed,bed_name',
        ]);

        try {
            
            $data = $this->getData($request);
            $data['user_id'] = auth()->user()->id;
            Bed::create($data);

            return redirect()->route('beds.bed.index')
                ->with('success_message', 'Bed was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified bed.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $bed = Bed::with('user')->findOrFail($id);

        return view('beds.show', compact('bed'));
    }

    /**
     * Show the form for editing the specified bed.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $bed = Bed::findOrFail($id);
        $Users = User::pluck('id','id')->all();

        return view('beds.edit', compact('bed','Users'));
    }

    /**
     * Update the specified bed in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $request->validate([
            'bed_name' => 'required|unique:bed,bed_name,'.$id,
        ]);

        try {
            
            $data = $this->getData($request);
            $data['user_id'] = auth()->user()->id;
            $bed = Bed::findOrFail($id);
            $bed->update($data);

            return redirect()->route('beds.bed.index')
                ->with('success_message', 'Bed was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified bed from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bed = Bed::findOrFail($id);
            $bed->delete();

            return redirect()->route('beds.bed.index')
                ->with('success_message', 'Bed was successfully deleted.');
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
                'bed_name' => 'nullable|string|min:0|max:100',
            'user_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MohArea;
use App\User;
use Illuminate\Http\Request;
use Exception;

class MohAreasController extends Controller
{

    /**
     * Display a listing of the moh areas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $mohAreas = MohArea::with('user')->paginate(25);

        return view('moh_areas.index', compact('mohAreas'));
    }

    /**
     * Show the form for creating a new moh area.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('name','id')->all();
        
        return view('moh_areas.create', compact('Users'));
    }

    /**
     * Store a new moh area in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:moh_area,name',
        ]);

        try {            
            $data = $this->getData($request);
            $data['user_id'] = auth()->user()->id;
            MohArea::create($data);

            return redirect()->route('moh_areas.moh_area.index')
                ->with('success_message', 'Moh Area was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified moh area.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $mohArea = MohArea::with('user')->findOrFail($id);

        return view('moh_areas.show', compact('mohArea'));
    }

    /**
     * Show the form for editing the specified moh area.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {        
        $mohArea = MohArea::findOrFail($id);
        $Users = User::pluck('id','id')->all();

        return view('moh_areas.edit', compact('mohArea','Users'));
    }

    /**
     * Update the specified moh area in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:moh_area,name,'.$id,
        ]);

        try {
            
            $data = $this->getData($request);
            
            $mohArea = MohArea::findOrFail($id);
            $mohArea->update($data);

            return redirect()->route('moh_areas.moh_area.index')
                ->with('success_message', 'Moh Area was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified moh area from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $mohArea = MohArea::findOrFail($id);
            $mohArea->delete();

            return redirect()->route('moh_areas.moh_area.index')
                ->with('success_message', 'Moh Area was successfully deleted.');
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
                'name' => 'nullable|string|min:0|max:200',
            'user_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

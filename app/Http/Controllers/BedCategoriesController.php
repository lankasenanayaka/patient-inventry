<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BedCategory;
use App\User;
use Illuminate\Http\Request;
use Exception;

class BedCategoriesController extends Controller
{

    /**
     * Display a listing of the bed categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $bedCategories = BedCategory::where('user_id', auth()->user()->id)->with('user')->paginate(25);

        return view('bed_categories.index', compact('bedCategories'));
    }

    /**
     * Show the form for creating a new bed category.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('bed_categories.create', compact('users'));
    }

    /**
     * Store a new bed category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $data['name'] = utf8_encode($data['name']);
            $data['user_id'] = auth()->user()->id;
            BedCategory::create($data);

            return redirect()->route('bed_categories.bed_category.index')
                ->with('success_message', 'Bed Category was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified bed category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $bedCategory = BedCategory::where('user_id', auth()->user()->id)->with('user')->findOrFail($id);

        return view('bed_categories.show', compact('bedCategory'));
    }

    /**
     * Show the form for editing the specified bed category.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $bedCategory = BedCategory::where('user_id', auth()->user()->id)->findOrFail($id);
        $users = User::pluck('id','id')->all();

        return view('bed_categories.edit', compact('bedCategory','users'));
    }

    /**
     * Update the specified bed category in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $data['user_id'] = auth()->user()->id;
            $data['name'] = utf8_encode($data['name']);
            $bedCategory = BedCategory::where('user_id', auth()->user()->id)->findOrFail($id);
            $bedCategory->update($data);

            return redirect()->route('bed_categories.bed_category.index')
                ->with('success_message', 'Bed Category was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified bed category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bedCategory = BedCategory::where('user_id', auth()->user()->id)->findOrFail($id);
            $bedCategory->delete();

            return redirect()->route('bed_categories.bed_category.index')
                ->with('success_message', 'Bed Category was successfully deleted.');
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
                'name' => 'required|string|min:0|max:100',
            'desc' => 'nullable|string|min:0|max:200',           
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

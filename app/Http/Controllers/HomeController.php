<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Bed;
use App\Models\MohArea;
use App\Models\Patient;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $patients_active = Patient::where('is_discharged', 0)->where('user_id', auth()->user()->id)->get()->count();
        $patients_all = Patient::where('user_id', auth()->user()->id)->get()->count();
        $beds_all = Bed::where('user_id', auth()->user()->id)->get()->count();

        $available_beds = $beds_all-$patients_active;
        $available_beds = ($available_beds >0)?$available_beds:0;
        $available_beds_percentage = ($available_beds>0 && $beds_all>0)?($available_beds/$beds_all)*100:0;
        $cured_patient_percentage = ($patients_active>0 && $patients_all>0)? ($patients_active/$patients_all)*100:0;

        $widget = [
            'patients_active' => $patients_active,
            'patients_all' => $patients_all,
            'beds_all' => $beds_all,
            'available_beds' => $available_beds,
            'available_beds_percentage' => (int)$available_beds_percentage,
            'cured_patient_percentage' => (int)$cured_patient_percentage,
        ];



        return view('home', compact('widget'));
    }
}

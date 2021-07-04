<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Bed;
use App\Models\MohArea;
use App\Models\Patient;
use App\Models\BedCategory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function patientDetailsByCategory(){
        $bed_categories = BedCategory::where('user_id', auth()->user()->id)->get();

        $data = [];
        foreach($bed_categories as $bed_category){
            $bed_category_id = $bed_category->id;
            $patients = Patient::where('user_id', auth()->user()->id);
            $patients = $patients->whereHas('bed', function ($query) use ($bed_category_id) {
                return $query->where('bed_category', '=', $bed_category_id);
            });
            //$patients_discharged = $patients->where('is_discharged', 1)->get()->count();
            $patients_active = $patients->where('is_discharged', 0)->get()->count();
            $all_beds = Bed::where('user_id', auth()->user()->id)->where('bed_category', '=', $bed_category_id)->get()->count();
            $available_beds = (int)$all_beds - (int)$patients_active;
            $data[] = ['name'=>$bed_category->name, 'active'=>(int)$patients_active, 'available'=>$available_beds];
        }
        return $data;
    }
}

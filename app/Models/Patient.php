<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'age',
        'contact_no',
        'address',
        'moh_area_id',
        'bed_id',
        'user_id', 
        'nic' => 'required',
        'co_modibilities',
        'other',
        'admitted',
        'discharged',
        'sex',
        'district',
        'police_station',
        'gs_division',
        'destination',
        'positive_on',
        'icc_no',
        'diagnosis',
        'complications',
        'vaccine1_given',
        'vaccine2_given',
        'sputnik',
        'sinopharm',
        'covishield',
        'symptomatic',
        'symptoms',
        'tem1',
        'tem2',
        'res1',
        'res2',
        'pr1',
        'pr2',
        'bp1',
        'bp2',
        'sp1',
        'sp2',
        'other_findings',
        'date1',
        'date2',
        'date3',
        'date4',
        'date5',
        'date6',
        'date7',
        'pcr_rat1',
        'pcr_rat2',
        'pcr_rat3',
        'pcr_rat4',
        'pcr_rat5',
        'pcr_rat6',
        'pcr_rat7',
        'pcr_rat_res1',
        'pcr_rat_res2',
        'pcr_rat_res3',
        'pcr_rat_res4',
        'pcr_rat_res5',
        'pcr_rat_res6',
        'pcr_rat_res7',
        'treatment',
        'discharge_plan',
        'home_quarantine_from',
        'home_quarantine_to',
        'remark_investigations',
        'mo_icc',
        'sign_date',
        'signature',
        'is_discharged',
            ]; 

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the MohArea for this model.
     *
     * @return App\Models\MohArea
     */
    public function MohArea()
    {
        return $this->belongsTo('App\Models\MohArea','moh_area_id','id');
    }

    /**
     * Get the Bed for this model.
     *
     * @return App\Models\Bed
     */
    public function Bed()
    {
        return $this->belongsTo('App\Models\Bed','bed_id','id');
    }

    /**
     * Get the User for this model.
     *
     * @return App\User
     */
    public function User()
    {
        return $this->belongsTo('App\User','user_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}

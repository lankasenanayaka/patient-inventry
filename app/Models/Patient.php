<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Patient extends Model
{
    use SoftDeletes;

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
        'nic',
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

    /*
    *modified as requested
    */
    public function setAdmittedAttribute($input)
    {
        $this->attributes['admitted'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getAdmittedAttribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):null;
    }

    public function setDischargedAttribute($input)
    {
        $this->attributes['discharged'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDischargedAttribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setPositiveOnAttribute($input)
    {
        $this->attributes['positive_on'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getPositiveOnAttribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setDate1Attribute($input)
    {
        $this->attributes['date1'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDate1Attribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setDate2Attribute($input)
    {
        $this->attributes['date2'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDate2Attribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setDate3Attribute($input)
    {
        $this->attributes['date3'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDate3Attribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setDate4Attribute($input)
    {
        $this->attributes['date4'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDate4Attribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setDate5Attribute($input)
    {
        $this->attributes['date5'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDate5Attribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setDate6Attribute($input)
    {
        $this->attributes['date6'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDate6Attribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setDate7Attribute($input)
    {
        $this->attributes['date7'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getDate7Attribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setHomeQuarantineFromAttribute($input)
    {
        $this->attributes['home_quarantine_from'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getHomeQuarantineFromAttribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }
    
    public function setHomeQuarantineToAttribute($input)
    {
        $this->attributes['home_quarantine_to'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getHomeQuarantineToAttribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

    public function setSignDateAttribute($input)
    {
        $this->attributes['sign_date'] = ($input)?Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d'):null;
    }

    public function getSignDateAttribute($input)
    {
        return ($input)?Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format')):"";
    }

}

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
                  'nic',
                  'user_id',
                  'admitted',
                  'discharged'
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

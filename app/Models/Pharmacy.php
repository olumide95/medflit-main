<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'address', 'city_id', 'state_id', 'country_id', 'business_name', 'licence_id', 'licence_expiry_date', 'affiliation', 'created_at', 'update_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}

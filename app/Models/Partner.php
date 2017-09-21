<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'contact_firstname', 'contact_lastname', 'contact_phone', 'contact_email', 'company_name', 'company_services', 'company_address', 'company_email', 'created_at', 'update_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}

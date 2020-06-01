<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'summary',
        'contact_number',
        'contact_email',
        'location',
        'address'
    ];
}

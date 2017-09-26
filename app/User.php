<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'firstname', 'lastname'
    ];

    // Hide data that is not relevant for the API (when json-ifying these values will not be taken into account)
    protected $hidden = [
        'updated_at'
    ];
}

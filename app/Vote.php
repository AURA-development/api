<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'from_id', 'positive'
    ];

    public function votes() {
        return $this->belongsTo('App\User');
    }
}

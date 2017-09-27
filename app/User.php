<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'firstname', 'lastname'
    ];

    // Appends these two attributes defined in the getAttributes functions
    protected $appends = [
        'upvotes', 'downvotes'
    ];

    // Hide data that is not relevant for the API (when json-ifying these values will not be taken into account)
    protected $hidden = [
        'updated_at', 'votes'
    ];

    public function votes() {
        return $this->hasMany('App\Vote');
    }

    public function getUpvotesAttribute() {
        return $this->votes()->where('positive', true)->count();
    }

    public function getDownvotesAttribute() {
        return $this->votes()->where('positive', false)->count();
    }
}

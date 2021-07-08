<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'users_details';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

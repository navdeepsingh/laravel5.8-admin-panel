<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redemption extends Model
{

    protected $table = 'redemption';

    /**
     * Get the signup that owns the redemption.
     */
    public function signup()
    {
        return $this->belongsTo('App\Signup');
    }

    /**
     * Get the signup that owns the redemption.
     */
    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }
}

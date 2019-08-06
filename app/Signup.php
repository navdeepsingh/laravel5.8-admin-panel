<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'beer', 'opt_in',
    ];

        /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the redemption record associated with the signup.
     */
    public function redemption()
    {
        return $this->hasOne('App\Redemption');
    }

     /**
     * Get the outlet record associated with the signup.
     */
    public function outlet()
    {
        return $this->hasOne('App\Outlet');
    }

}

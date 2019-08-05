<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['code'];
}

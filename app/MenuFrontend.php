<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuFrontend extends Model
{
    public function submenu()
    {
        return $this->hasMany('App\SubMenu');
    }
}

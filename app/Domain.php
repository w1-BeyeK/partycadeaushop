<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = "domain";

    public function menuItems() {
        return $this->hasMany("App\MenuItem", "domain_id", "domain_id")->orderBy("sequence")->get();
    }
}

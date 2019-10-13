<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = "menu_item";

    public function children() {
        return $this->hasMany(self::class, "parent_id", "menu_item_id")->orderBy("sequence")->get();
    }
}

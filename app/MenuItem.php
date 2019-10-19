<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $primaryKey = "menu_item_id";
    protected $table = "menu_item";

    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function children() {
        return $this->hasMany(self::class, "parent_id", "menu_item_id")->orderBy("sequence")->get();
    }
}

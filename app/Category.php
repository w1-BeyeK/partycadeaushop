<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    protected $table = "category";

    public function products() {
        return $this->hasMany("App\Product", "category_id", "id");
    }
}

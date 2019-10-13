<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = "portfolio_item";

    public function category() {
        return $this->hasOne("App\Category", "id", "category_id");
    }
}

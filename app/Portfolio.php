<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = "portfolio_item";

    public function category() {
        return $this->hasOne("App\Category", "id", "category_id")->first();
    }

    public static function getLatest($limit) {
        return Portfolio::orderByDesc("updated_at")->take($limit)->get();
    }

    public static function headers() {
        return Portfolio::where("header", 1)->orderByDesc("created_at")->get();
    }

    public static function overview() {
        return Portfolio::where("overview", 1)->orderByDesc("created_at")->take(12)->get();
    }
}

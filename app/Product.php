<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;
    protected $table = "product";

    public function images() {
        return $this->hasMany("App\ProductImage", "product_id", "id");
    }

    public function category() {
        return $this->hasOne("App\Category", "id", "category_id");
    }

    public function primaryImage() {
        $images = $this->images;

        foreach($images as $image) {
            if($image->is_primary)
                return $image;
        }
        return null;
    }
}

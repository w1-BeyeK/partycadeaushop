<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 7/9/2019
 * Time: 5:59 PM
 */

namespace App\Http\Controllers\Backend;

use App\Product;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{
    protected $model = "product";

    public function index() {
        $user = Auth::user();

        $products = Product::get();

        return view("$this->model.index", array("active" => $this->model, "user" => $user, "products" => $products));
    }

    public function detail($id) {
        $user = Auth::user();

        $product = Product::where("id", "=", $id)->get();

        if(count($product) > 0)
            $product = $product[0];
        else return redirect("/product");

        return view("$this->model.detail", array("active" => $this->model, "user" => $user, "product" => $product));
    }

    public function create() {
        $user = Auth::user();

        return view("$this->model.create", array("active" => $this->model, "user" => $user));
    }

    public function update() {
        $user = Auth::user();

        return view("$this->model.update", array("active" => $this->model, "user" => $user));
    }
}
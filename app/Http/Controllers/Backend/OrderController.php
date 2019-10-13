<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 7/9/2019
 * Time: 5:59 PM
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
{
    protected $model = "order";

    public function index() {
        $user = Auth::user();

        return view("$this->model.index", array("active" => $this->model, "user" => $user));
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
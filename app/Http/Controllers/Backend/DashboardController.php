<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 7/8/2019
 * Time: 12:53 PM
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
    protected $model = "dashboard";

    public function index() {
        $user = Auth::user();

        return view("dashboard.index", array("active" => $this->model, "user" => $user));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 10/4/2019
 * Time: 5:37 PM
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

abstract class BackendController extends BaseController
{
    protected $model;

    public function returnView($view, $params = null) {
        $status = session()->get("status");
        $user = Auth::user();

        $variables = array(
            "status" => $status,
            "user" => $user,
            "active" => "$this->model"
        );

        if(!empty($params)) {
            foreach ($params as $key => $value) {
                $variables[$key] = $value;
            }
        }

        return view("backend.$this->model.$view", $variables);
    }
}
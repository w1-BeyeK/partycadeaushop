<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 7/9/2019
 * Time: 9:39 PM
 */

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BaseController
{
    protected $model = "category";

    public function index() {
        $status = session()->get("status");
        $user = Auth::user();

        $categories = Category::all();

        return view("$this->model.index", array("active" => $this->model, "status" => $status, "user" => $user, "categories" => $categories));
    }

    public function create() {
        $user = Auth::user();

        return view("$this->model.create", array("active" => $this->model, "user" => $user));
    }

    public function createPost(Request $request) {
        $category = new Category();
        $category->value = $request->category;
        $category->portfolio = ($request->in_portfolio == "on") ? 1 : 0;

        $category->save();

        return redirect("/admin/category/")->with("status", array("type" => "success", "msg" => "Categorie succesvol toegevoegd!"));
    }

    public function update($id) {
        $user = Auth::user();
        $category = Category::where("id", "=", $id)->get();
        if(!$category->isEmpty())
            $category = $category->first();
        else return redirect("/category/");

        return view("$this->model.update", array("active" => $this->model, "user" => $user, "category" => $category));
    }

    public function updatePost($id, Request $request) {
        $category = Category::where("id", "=", $id)->get();

        if(!$category->isEmpty())
            $category = $category->first();
        else return redirect("/category/");

        $category->value = $request->category;
        $category->portfolio = ($request->in_portfolio == "on") ? 1 : 0;
        $category->save();

        return redirect("/admin/category/")->with("status", array("type" => "success", "msg" => "Categorie succesvol geüpdate!"));
    }

    public function delete($id) {
        Category::where("id", "=", $id)->delete();

        return redirect("/admin/category/")->with("status", array("type" => "success", "msg" => "Categorie succesvol verwijderd!"));
    }
}
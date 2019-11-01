<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 7/9/2019
 * Time: 9:39 PM
 */

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends BaseController
{
    protected $model = "portfolio";

    public function index() {
        $status = session()->get("status");
        $user = Auth::user();

        $portfolio_items = Portfolio::all();

        return view("$this->model.index", array("active" => $this->model, "status" => $status, "user" => $user, "portfolio_items" => $portfolio_items));
    }

    public function create() {
        $user = Auth::user();

        $categories = Category::where("portfolio", "=", 1)->get();

        return view("$this->model.create", array("active" => $this->model, "user" => $user, "categories" => $categories));
    }

    public function createPost(Request $request) {
        $portfolio = new Portfolio();

        $portfolio->title = $request->title;
        $portfolio->category_id = $request->category;
        $portfolio->url = $request->url;
        $portfolio->description = $request->description;
        $portfolio->size = $request->size;

        $imgName = $request->picture->getClientOriginalName();
        $portfolio->image = $imgName;
        $portfolio->keywords = $this->trimKeywords($request->keywords);

        $portfolio->save();
        $request->picture->storeAs("portfolio", $imgName);

        return redirect("/admin/portfolio/")->with("status", array("type" => "success", "msg" => "Portfolio item succesvol toegevoegd!"));
    }

    public function update($id) {
        $user = Auth::user();
        $portfolio = Portfolio::where("id", "=", $id)->get();
        if(!$portfolio->isEmpty())
            $portfolio = $portfolio->first();
        else return redirect("/portfolio/");

        $categories = Category::where("portfolio", "=", 1)->get();

        return view("$this->model.update", array("active" => $this->model, "user" => $user, "portfolio" => $portfolio, "categories" => $categories));
    }

    public function updatePost($id, Request $request) {
        $portfolio = Portfolio::where("id", "=", $id)->get();

        if(!$portfolio->isEmpty())
            $portfolio = $portfolio->first();
        else return redirect("/admin/category/");

        $portfolio->title = $request->title;
        $portfolio->category_id = $request->category;
        $portfolio->url = $request->url;
        $portfolio->description = $request->description;
        $portfolio->size = $request->size;

        if($request->picture) {
            $imgName = $request->picture->getClientOriginalName();
            if(!empty($imgName)) {
                $portfolio->image = $imgName;
                $request->picture->storeAs("portfolio", $imgName);
            }
        }
        $portfolio->keywords = $this->trimKeywords($request->keywords);

        $portfolio->save();

        return redirect("/admin/portfolio/")->with("status", array("type" => "success", "msg" => "Portfolio item succesvol geüpdate!"));
    }

    public function delete($id) {
        Portfolio::where("id", "=", $id)->delete();

        return redirect("/admin/portfolio/")->with("status", array("type" => "success", "msg" => "Portfolio item succesvol verwijderd!"));
    }

    private function trimKeywords($keywords) {
        return str_replace(" ", ",", trim($keywords));
    }
}
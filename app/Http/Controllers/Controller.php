<?php

namespace App\Http\Controllers;

use App\Category;
use App\MenuItem;
use App\Portfolio;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    protected $model = "portfolio.frontend";

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index($category) {
        $status = session()->get("status");
        $user = Auth::user();

        $category = Category::whereRaw("LOWER(value) = ?", strtolower($category))->where("portfolio", 1)->firstOrFail();
        $items = Portfolio::where("category_id", $category->id)->get();

        $data = new \stdClass();
        $data->category = $category;
        $data->portfolio_items = $items;

        $keywords = array();
        $total = 0;
        foreach($items as $item) {
            $item_keywords = explode(",", $item->keywords);
            foreach($item_keywords as $keyword) {
                if(empty($keywords[$keyword])) {
                    $keywords[$keyword] = 1;
                } else {
                    $keywords[$keyword]++;
                }
                $total++;
            }
        }
        ksort($keywords);
        $data->keywords = $keywords;
        $data->totalKeywords = $total;

        return view("$this->model.index", array("active" => $this->model, "status" => $status, "user" => $user, "data" => $data, "menu_items" => $this->getMenu()));
	}

	private function getMenu() {
        return MenuItem::where("domain_id", 1)->orderBy("sequence")->get();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 10/13/2019
 * Time: 1:10 PM
 */
namespace App\Http\Controllers\Ajax;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class MenuController extends BaseController
{
    public function byDomain($domain_id) {
        $menu = \App\MenuItem::where("domain_id", $domain_id)->orderBy("sequence")->get();

        $result = array();
        foreach($menu as $menu_item) {
            $item["title"] = $menu_item->title;
            $item["slug"] = $menu_item->slug;
            $item["url"] = $menu_item->url;
            $item["children"] = array();
            foreach ($menu_item->children() as $child) {
                $item2 = array();
                $item2["title"] = $child->title;
                $item2["slug"] = $child->slug;
                $item2["url"] = $child->url;

                foreach($child->children() as $child_item) {
                    $item3 = array();
                    $item3["title"] = $child_item->title;
                    $item3["slug"] = $child_item->slug;
                    $item3["url"] = $child_item->url;

                    $item2["children"][] = $item3;
                }
                $item["children"][] = $item2;
            }
            $result[] = $item;
        }

        echo json_encode($result);
    }

    public function store(Request $request) {
        $input = $request->all();
        var_dump($input);die;
    }

    public function update($id, Request $request) {
        $input = $request->all();
        var_dump($id, $input);die;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 10/13/2019
 * Time: 1:10 PM
 */
namespace App\Http\Controllers\Ajax;

use App\MenuItem;
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

    public function get($id) {
        $item = MenuItem::where("menu_item_id", $id)->first();

        if(!empty($item)) {
            echo json_encode($item);
        }
    }

    public function store(Request $request) {
        $input = $request->all();
        var_dump($input);die;
    }

    public function update($id, Request $request) {
        $input = $request->all();

        // Save menu
        $menu = $request->input("menu");
        $sequence1 = 0;
        foreach($menu as $menu_item) {
            $item = MenuItem::where("menu_item_id", $menu_item["id"])->first();

            if(!empty($item)) {
                $item->domain_id = $id;
                $item->parent_id = null;
                $item->sequence = ++$sequence1;
                $item->save();

                if(!empty($menu_item["children"])) {
                    $sequence2 = 0;
                    foreach ($menu_item["children"] as $child) {
                        $item = MenuItem::where("menu_item_id", $child["id"])->first();

                        if (!empty($item)) {
                            $item->domain_id = null;
                            $item->parent_id = $menu_item["id"];
                            $item->sequence = ++$sequence2;
                            $item->save();

                            if(!empty($child["children"])) {
                                $sequence3 = 0;
                                foreach ($child["children"] as $child_item) {
                                    $item = MenuItem::where("menu_item_id", $child_item["id"])->first();

                                    if (!empty($item)) {
                                        $item->domain_id = null;
                                        $item->parent_id = $child["id"];
                                        $item->sequence = ++$sequence3;
                                        $item->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function addMenuItem($domain_id) {
        $menuItem = MenuItem::where("domain_id", $domain_id)->orderByDesc("sequence")->first();

        $lastSequence = 0;
        if(!empty($menuItem)) {
            $lastSequence = $menuItem->sequence;
        }

        $newItem = new MenuItem();
        $newItem->domain_id = $domain_id;
        $newItem->title = "Nieuw item";
        $newItem->slug = "nieuw_item";
        $newItem->url = "/";
        $newItem->sequence = ++$lastSequence;
        $newItem->save();
    }

    public function updateMenuItem($menu_item_id, Request $request) {
        $menuItem = MenuItem::where("menu_item_id", $menu_item_id)->first();

        if(!empty($menuItem)) {
            $menuItem->title = $request->get("title");
            $menuItem->url = $request->get("url");
            $menuItem->slug = $this->trim($request->get("title"));

            $menuItem->save();
        }
    }

    public function deleteMenuItem($menu_item_id) {
        MenuItem::where("menu_item_id", $menu_item_id)->delete();
    }

    public function trim($string) {
        return trim(str_replace(" ", "_", $string));
    }
}
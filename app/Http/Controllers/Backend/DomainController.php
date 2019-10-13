<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 10/4/2019
 * Time: 5:26 PM
 */

namespace App\Http\Controllers\Backend;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DomainController extends BackendController
{
    public function __construct()
    {
        $this->model = "domain";
    }

    public function index() {
        $domains = Domain::orderBy("name")->get();

        return $this->returnView("index", array("domains" => $domains));
    }

    public function detail($domain_id) {
        $domain = Domain::where("domain_id", $domain_id)->first();

        return $this->returnView("detail", array("domain" => $domain));
    }

    public function create() {
        return $this->returnView("create");
    }

    public function createPost(Request $request) {
        $domain = new Domain();
        $domain->name = $request->name;
        $domain->base_url = $request->base_url;

        $domain->save();

        return redirect("/admin/domain/$domain->domain_id")->with("status", array("type" => "success", "msg" => "Domein succesvol toegevoegd!"));
    }

    public function update($domain_id) {
        $domain = Domain::where("domain_id", "=", $domain_id)->first();

        if(empty($domain))
            return redirect("/admin/domain/");

        return $this->returnView("update", array("domain" => $domain));
    }

    public function updatePost($domain_id, Request $request) {
        $domain = Domain::where("domain_id", "=", $domain_id)->first();

        if(empty($domain))
            return redirect("/domain/");

        $domain->name = $request->name;
        $domain->base_url = $request->base_url;

        $domain->save();

        return redirect("/admin/domain/")->with("status", array("type" => "success", "msg" => "Domein succesvol geüpdate!"));
    }

    public function delete($domain_id) {
        Domain::where("domain_id", "=", $domain_id)->delete();

        return redirect("/admin/domain/")->with("status", array("type" => "success", "msg" => "Domein succesvol verwijderd!"));
    }
}
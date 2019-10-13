<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**
 * Backend routes
 */
Route::get("/admin/dashboard/", "Backend\DashboardController@index");
Route::get("/admin/logout", "Auth\LoginController@logout")->name("logout");

Route::get("/admin/category/", "Backend\CategoryController@index")->middleware("auth")->name("categoryIndex");
Route::get("/admin/order/", "Backend\OrderController@index")->middleware("auth")->name("orderIndex");
Route::get("/admin/product/", "Backend\ProductController@index")->middleware("auth")->name("productIndex");
Route::get("/admin/portfolio/", "Backend\PortfolioController@index")->middleware("auth")->name("portfolioIndex");
Route::get("/admin/domain/", "Backend\domainController@index")->middleware("auth")->name("domainIndex");

Route::get("/admin/category/create", "Backend\CategoryController@create")->middleware("auth")->name("categoryCreate");
Route::get("/admin/order/create", "Backend\OrderController@create")->middleware("auth")->name("orderCreate");
Route::get("/admin/product/create", "Backend\ProductController@create")->middleware("auth")->name("productCreate");
Route::get("/admin/portfolio/create", "Backend\PortfolioController@create")->middleware("auth")->name("portfolioCreate");
Route::get("/admin/domain/create", "Backend\domainController@create")->middleware("auth")->name("domainCreate");

Route::post("/admin/category/create", "Backend\CategoryController@createPost")->middleware("auth")->name("categoryCreate");
Route::post("/admin/order/create", "Backend\OrderController@createPost")->middleware("auth")->name("orderCreate");
Route::post("/admin/product/create", "Backend\ProductController@createPost")->middleware("auth")->name("productCreate");
Route::post("/admin/portfolio/create", "Backend\PortfolioController@createPost")->middleware("auth")->name("portfolioCreate");
Route::post("/admin/domain/create", "Backend\domainController@createPost")->middleware("auth")->name("domainCreate");

Route::get("/admin/category/update/{id}", "Backend\CategoryController@update")->middleware("auth")->name("categoryUpdatePost");
Route::get("/admin/order/update/{id}", "Backend\OrderController@update")->middleware("auth")->name("orderUpdatePost");
Route::get("/admin/product/update/{id}", "Backend\ProductController@update")->middleware("auth")->name("productUpdatePost");
Route::get("/admin/portfolio/update/{id}", "Backend\PortfolioController@update")->middleware("auth")->name("portfolioUpdatePost");
Route::get("/admin/domain/update/{id}", "Backend\domainController@update")->middleware("auth")->name("domainUpdatePost");

Route::post("/admin/category/update/{id}", "Backend\CategoryController@updatePost")->middleware("auth")->name("categoryUpdatePost");
Route::post("/admin/order/update/{id}", "Backend\OrderController@updatePost")->middleware("auth")->name("orderUpdatePost");
Route::post("/admin/product/update/{id}", "Backend\ProductController@updatePost")->middleware("auth")->name("productUpdatePost");
Route::post("/admin/portfolio/update/{id}", "Backend\PortfolioController@updatePost")->middleware("auth")->name("portfolioUpdatePost");
Route::post("/admin/domain/update/{id}", "Backend\domainController@updatePost")->middleware("auth")->name("domainUpdatePost");

Route::get("/admin/category/{id}", "Backend\CategoryController@detail")->middleware("auth")->name("categoryDetail");
Route::get("/admin/order/{id}", "Backend\OrderController@detail")->middleware("auth")->name("orderDetail");
Route::get("/admin/product/{id}", "Backend\ProductController@detail")->middleware("auth")->name("productDetail");
Route::get("/admin/portfolio/{id}", "Backend\PortfolioController@detail")->middleware("auth")->name("portfolioDetail");
Route::get("/admin/domain/{id}", "Backend\domainController@detail")->middleware("auth")->name("domainDetail");

Route::get("/admin/category/delete/{id}", "Backend\CategoryController@delete")->middleware("auth")->name("categoryDelete");
Route::get("/admin/portfolio/delete/{id}", "Backend\PortfolioController@delete")->middleware("auth")->name("portfolioDelete");
Route::get("/admin/domain/delete/{id}", "Backend\domainController@delete")->middleware("auth")->name("domainDelete");



/**
 * Frontend routes
 */
Route::get("/{category}", "Controller@index");

/**
 * Ajax routes
 */
Route::get("/ajax/menu/{domain_id}", "Ajax\MenuController@byDomain")->middleware("auth");
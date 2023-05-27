<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PurchaseDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, PATCH, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization, X-Requested-With');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//auth
Route::post('/register', [AuthController::class, 'register']);

// product
Route::get('product/deleted-list', [ProductController::class, 'deletedListIndex'])->name('product.deleted_list');
Route::get('product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
Route::delete('product/force-delete/{id}', [ProductController::class, 'forceDelete'])->name('product.force_delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product/status', [ProductController::class, 'status'])->name('product.status');
Route::apiResource('product',ProductController::class);

//purchase Detail
Route::apiResource('purchase-detail',PurchaseDetailController::class);

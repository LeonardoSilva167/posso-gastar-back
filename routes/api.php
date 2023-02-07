<?php

use App\Exceptions\Message;
use App\Http\Controllers\v1\GroupController;
use App\Http\Controllers\v1\SubgroupController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/',function(){
    return response()->json(['api_name' => 'posso-gastar-back-end', 'api_version' => '1.0.0']);
});

Route::prefix('v1')->group(function() {

    //Groups
    Route::prefix('group')->controller(GroupController::class)->group(function() {
        Route::get('/','index');
        Route::post('/new','store');
        Route::get('{id}','show');
        Route::put('edit/{id}','update');
        Route::delete('delete/{id}','destroy');
    });

    //Subgroup
    Route::prefix('subgroup')->controller(SubgroupController::class)->group(function() {
        Route::get('/','index');
        Route::post('/new','store');
        Route::get('{id}','show');
        Route::put('edit/{id}','update');
        Route::delete('delete/{id}','destroy');
    });

});

Route::fallback(function(){
    return response()->json(['error' => true,'data'=> null,'state' => Message::ERRO,'Página não encontrada.'], 404);
});

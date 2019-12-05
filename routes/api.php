<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::namespace("Api")->group(function (){

    ///Route::post("auth", "");

    ///Phần xác thực qua token sẽ được xây dựng sao
    ///Middleware authencation
    ///....Update.....


        /** Quản lý lĩnh vực
         * 
         */
        Route::prefix('linh-vuc')->group(function (){
            Route::name('linh-vuc.')->group(function (){
                Route::get('/','LinhVucController@index');
            }); 
        });


        /** Quản lý goi credit
         * 
         */
        Route::prefix('goi-credit')->group(function (){
            Route::name('goi-credit.')->group(function (){
                Route::get('/','GoiCreditController@index');
            }); 
        });


        /** Quản lý câu hỏi
         * 
         */
        Route::prefix('cau-hoi')->group(function (){
            Route::name('cau-hoi.')->group(function (){
                Route::get('/','CauHoiController@index');
                Route::get('/{id}','CauHoiController@show');
            }); 
        });

        

        //// ......... Update

        Route::post('/login', function (Request $request) {
            if($request->user == "admin" && $request->pass == "admin"){
                 return response()->json([
                     "status" => true,
                     "message" => "Dang nhap thanh cong"
                 ]);
            }
            return response()->json([
                "status" => false,
                "message" => "Dang nhap thaats bai "
            ]);
        });




    ///....Update.....
    ///End middleware
});
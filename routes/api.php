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


    ///Phần xác thực qua token sẽ được xây dựng sao
    ///Middleware authencation
    ///....Update.....


        /**
         * LĨNH VỰC
         */
        Route::prefix('linh-vuc')->group(function (){
            Route::name('linh-vuc.')->group(function (){

                /**
                 * API lấy danh sách lĩnh vực
                 */
                Route::get('/','LinhVucController@index');
            }); 
        });


        /**
         * GÓI CREDIT
         */
        Route::prefix('goi-credit')->group(function (){
            Route::name('goi-credit.')->group(function (){

                /**
                 * API lấy danh sách gói credit
                 */
                Route::get('/','GoiCreditController@index');
            }); 
        });



        /**
         * CÂU HỎI
         */
        Route::prefix('cau-hoi')->group(function (){
            Route::name('cau-hoi.')->group(function (){

                // Route::get('/','CauHoiController@index');
                // Route::get('/{id}','CauHoiController@show');

            }); 
        });


        /**
         * CẤU HÌNH
         */
        Route::prefix('cau-hinh')->group(function (){
            Route::name('cau-hinh.')->group(function (){
                
                /**
                 * API lấy câu hình điểm câu hỏi
                 */
                Route::get('/','CauHinhController@index');

            }); 
        });



        //// ......... Update

    ///....Update.....
    ///End middleware
});

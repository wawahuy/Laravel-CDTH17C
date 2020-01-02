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
    Route::name("api.")->group(function (){

    /// Error auth
    Route::any('unauthenticated', 'NguoiChoiController@unauthenticated')->name('unauthenticated');
    
    /// JWT Login
    Route::post('login', 'NguoiChoiController@login')->name('login');

    /// Register
    Route::post('register', 'NguoiChoiController@register')->name('register');

    

    /// JWT Auth
    Route::middleware("auth:api")->group(function (){

        /// Check Auth
        Route::prefix('user')->group(function (){
            Route::name('user.')->group(function (){
                Route::any('/', 'NguoiChoiController@get_info')->name('get-info');
                Route::any('/re_password', 'NguoiChoiController@re_password')->name('re-password');
            });
        });

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
                Route::get('/lay-qua-linh-vuc/{id}','CauHoiController@lay_qua_linh_vuc');
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


        /**
         * LƯỢT CHƠI
         */
        Route::prefix('luot-choi')->group(function (){
            Route::name('luot-choi.')->group(function (){
                
                /**
                 * API lấy danh sách lượt chơi của tài khoản đang đăng nhập
                 */
                Route::get('/','LuotChoiController@index');

                /**
                 * API lấy danh sách lượt chơi của tk khoản khác
                 */
                Route::get('/{id}', 'LuotChoiController@show');

                /**
                 * API Lưu lịch sử lược chơi
                 */
                Route::post('/new', 'LuotChoiController@store');

            }); 
        });


    /// End Authenticate
    });



    /**
     * Test API
     * Support project YUH Android Library
     * 
     */
    Route::prefix('test')->group(function(){

        Route::post('/post_data', function (Request $request){
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => $request->input()
            ]);
        });

        Route::post('/post_file', function (Request $request){
            // extension=php_fileinfo.dll
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => [
                    $request->input(),
                    $request->file('TestFile')->getSize(),
                    Storage::url($request->file('TestFile')->store('upload'))
                ]
            ]);
        });

        Route::get('/get', function (){
            return response()->json([
                "status" => true,
                "message" => "",
                "data" => [
                ]
            ]);
        });

    });



    ///....Update.....
    ///End middleware
    });
});

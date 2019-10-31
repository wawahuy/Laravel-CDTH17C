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

Route::namespace('Web')->group(function (){

    Route::get('/', function (){
        return redirect()->route('cau-hoi.');
    });

    /** Đăng nhập 
     * 
     */
    Route::prefix('/dang-nhap')->group(function (){
        Route::name('dang-nhap.')->group(function (){
            Route::get('/',  'QuanTriVienController@dangnhap');
            Route::post('/', 'QuanTriVienController@xu_ly_dang_nhap')->name('xu-ly');
        });
    });


    /** Đăng xuất 
     * 
     */
    Route::get('/dang-xuat', 'QuanTriVienController@xu_ly_dang_xuat')->name('dang-xuat');


    /** Xác thực
     * 
     */
    Route::middleware('auth')->group(function (){
        
        /** Quản lý câu hỏi
         * 
         */
        Route::prefix('cau-hoi')->group(function (){
            Route::name('cau-hoi.')->group(function (){
                Route::get('/','CauHoiController@danh_sach');
                Route::get('/them','CauHoiController@them_moi')->name('them-moi');
                Route::post('/them','CauHoiController@xu_ly_them_moi')->name('xu-ly-them-moi');
                Route::get('/xoa/{id}','CauHoiController@xoa')->name('xoa');
                Route::get('/sua/{id}','CauHoiController@sua')->name('sua');
                Route::post('/sua/{id}','CauHoiController@xu_ly_sua')->name('xu-ly-sua');
            }); 
        });

        /** Quản lý lĩnh vực
         * 
         */
        Route::prefix('linh-vuc')->group(function (){
            Route::name('linh-vuc.')->group(function (){
                Route::get('/','LinhVucController@danh_sach');
                Route::get('/them','LinhVucController@them_moi')->name('them-moi');
                Route::post('/them','LinhVucController@xu_ly_them_moi')->name('xu-ly-them-moi');
                Route::get('/xoa/{id}','LinhVucController@xoa')->name('xoa');
                Route::get('/sua/{id}','LinhVucController@sua')->name('sua');
                Route::post('/sua/{id}','LinhVucController@xu_ly_sua')->name('xu-ly-sua');
            }); 
        });

    });

});
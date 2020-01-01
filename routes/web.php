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
    Route::middleware('auth:web')->group(function (){
        
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
                Route::get('/thung-rac', 'CauHoiController@thung_rac')->name('thung-rac');
                Route::get('/thung-rac/{id}', 'CauHoiController@xu_ly_thung_rac')->name('xu-ly-thung-rac');
                });
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
                Route::get('/thung-rac', 'LinhVucController@thung_rac')->name('thung-rac');
                Route::get('/thung-rac/{id}', 'LinhVucController@xu_ly_thung_rac')->name('xu-ly-thung-rac');
            }); 
        });


        /** Quản lý người dùng
         * 
         */
        Route::prefix('nguoi-choi')->group(function (){
            Route::name('nguoi-choi.')->group(function (){
                Route::get('/','NguoiChoiController@danh_sach');
                Route::get('/them','NguoiChoiController@them_moi')->name('them-moi');
                Route::post('/them','NguoiChoiController@xu_ly_them_moi')->name('xu-ly-them-moi');
                Route::get('/xoa/{id}','NguoiChoiController@xoa')->name('xoa');
                Route::get('/sua/{id}','NguoiChoiController@sua')->name('sua');
                Route::post('/sua/{id}','NguoiChoiController@xu_ly_sua')->name('xu-ly-sua');
                Route::get('/avatar/{id}','NguoiChoiController@them_avatar')->name('them-avatar');
                Route::post('/avatar/{id}','NguoiChoiController@xu_ly_them_avatar')->name('xu-ly-them-avatar');
                Route::get('/thung-rac', 'NguoiChoiController@thung_rac')->name('thung-rac');
                Route::get('/thung-rac/{id}', 'NguoiChoiController@xu_ly_thung_rac')->name('xu-ly-thung-rac');
            }); 
        });

        
        /** Quản lý gói credit
         * 
         */
        Route::prefix('goi-credit')->group(function (){
            Route::name('goi-credit.')->group(function (){
                Route::get('/','GoiCreditController@danh_sach');
                Route::get('/them','GoiCreditController@them_moi')->name('them-moi');
                Route::post('/them','GoiCreditController@xu_ly_them_moi')->name('xu-ly-them-moi');
                Route::get('/xoa/{id}','GoiCreditController@xoa')->name('xoa');
                Route::get('/sua/{id}','GoiCreditController@sua')->name('sua');
                Route::post('/sua/{id}','GoiCreditController@xu_ly_sua')->name('xu-ly-sua');
                Route::get('/thung-rac', 'GoiCreditController@thung_rac')->name('thung-rac');
                Route::get('/thung-rac/{id}', 'GoiCreditController@xu_ly_thung_rac')->name('xu-ly-thung-rac');
            }); 
        });

        /** Quản lý gói quản trị viên
         * 
         */
        Route::prefix('quan-tri-vien')->group(function (){
            Route::name('quan-tri-vien.')->group(function (){
                Route::get('/','QuanTriVienController@danh_sach');
                Route::get('/them','QuanTriVienController@them_moi')->name('them-moi');
                Route::post('/them','QuanTriVienController@xu_ly_them_moi')->name('xu-ly-them-moi');
                Route::get('/xoa/{id}','QuanTriVienController@xoa')->name('xoa');
                Route::get('/sua/{id}','QuanTriVienController@sua')->name('sua');
                Route::post('/sua/{id}','QuanTriVienController@xu_ly_sua')->name('xu-ly-sua');
                Route::get('/thung-rac', 'QuanTriVienController@thung_rac')->name('thung-rac');
                Route::get('/thung-rac/{id}', 'QuanTriVienController@xu_ly_thung_rac')->name('xu-ly-thung-rac');
            }); 
        });

        /** Quản lý lượt chơi
         * 
         */
        Route::prefix('luot-choi')->group(function (){
            Route::name('luot-choi.')->group(function (){
                Route::get('/','LuotChoiController@danh_sach');
                Route::get('/xoa/{id}','LuotChoiController@xoa')->name('xoa');
            }); 
        });

        /** Quản lý chi tiết lượt chơi
         * 
         */
        Route::prefix('chi-tiet-luot-choi')->group(function (){
            Route::name('chi-tiet-luot-choi.')->group(function (){
                Route::get('/xoa/{id}','ChiTietLuotChoiController@xoa')->name('xoa');
                Route::get('/','ChiTietLuotChoiController@danh_sach');
            }); 
        });
    });
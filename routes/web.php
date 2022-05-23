<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VendorController;

use App\Http\Controllers\Admin\SectionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




require __DIR__.'/auth.php';



Route::prefix('admin')->group(function () 
{
    
    Route::get('/login',[AdminController::class,'login']);
    Route::post('/signin',[AdminController::class,'signin']);
    // Route::get('/logout',[AdminController::class,'logout']);
    
    
    Route::group(['middleware'=>['admin']],function () 
    {
        
        Route::get('/dashboard',[AdminController::class,'dashboard']);
        
        Route::match(['get', 'post'],'/profile',[AdminController::class,'profile']);
        
        Route::match(['get', 'post'], '/setting',[AdminController::class,'setting']);  

        // check current password of admin

        Route::post('/check-current-password',[AdminController::class,'checkAdminPassword']);

        // Update Vendor Details
        Route::match(['get', 'post'], '/update-vendor-details/{slug}',[VendorController::class,'update']);  
        
        // View Admins / Subadmins / Vendors

        Route::get('admins/{type?}',[AdminController::class,'admins']);

        // View Vendor Details
        Route::get('view-vendor-details/{id}',[VendorController::class,'view_vendor_details']); 
        
        // Update Admin / Vendor Status

        Route::post('update-admin-status',[AdminController::class,'update_admin_status']); 
        
        // Admin Logout
        Route::get('/logout',[AdminController::class,'logout']);

        
        // Catalogue Management

        // Section Details
        Route::get('/sections',[SectionController::class,'sections']);

        // Update Section Status

        Route::post('update-section-status',[SectionController::class,'update_section_status']);
        Route::get('delete-section/{id}',[SectionController::class,'delete_section']) ;
        
        // Add Edit Section

        Route::match(['get', 'post'],'add-edit-section/{id?}',[SectionController::class,'addEdit_section']) ;
        
        
        
        
        
        
        
    });
    
});

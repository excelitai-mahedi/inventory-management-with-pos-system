<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Auth;
 use App\Http\Controllers\DashboardController;
 use App\Http\Controllers\AdminController;
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\CategoryController;
 use App\Http\Controllers\PurchaseController;
 
 use App\Http\Controllers\ProductController;
 use App\Http\Controllers\PdfController;
 use App\Http\Controllers\Auth\LoginController as Userlogin ;
 use App\Events\MyEvent;
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
// Route::get('/', function () {
// return view('login.index');
// });

// auth route for both
// Route::group(['middleware'=>['auth']], function(){
// Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// });

Auth::routes();

// Route::get('/', [HomeController::class, 'index'])->name('home');


 Route::group(['middleware'=>'guest'],function(){
    Route::get('/',[ UserController::class,'loginview'])->name('user.login');
    Route::post('login',[ UserController::class,'loginverify'])->name('user.verify');

});


Route::group(['middleware'=>['auth']],function(){
  Route::post('logout',[UserController::class,'logout'])->name('user.logout');
});


Route::middleware(['auth'])->group(function(){
    Route::get('home',[UserController::class,'Dashboard'])->name('dashboard');

// super admin
Route::get('/add/admin', [UserController::class, 'AddAdmin'])->name('add.admin');
Route::get('/admin/list', [UserController::class, 'AdminList'])->name('admin.list');
Route::get('/edit/admin/{id}', [UserController::class, 'EditAdmin'])->name('EditAdmin');
Route::post('/update/admin/{id}', [UserController::class, 'UpdateAdmin'])->name('UpdateAdmin');
Route::get('/delete/admin/{id}', [UserController::class, 'DeleteAdmin'])->name('DeleteAdmin');
Route::post('/add/admin', [UserController::class, 'StoreAdmin'])->name('StoreAdmin');



///// Category start///
Route::get('/add/category',  [CategoryController::class, 'AddCategory'])->name('add.category');
Route::post('/add/category',  [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/category/list', [CategoryController::class, 'CategoryList'])->name('category.list');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');
/////Category end///

///// product start///
Route::get('/add/product',   [ProductController::class,   'AddProduct'])->name('add.product');
Route::get('/show/product',   [ProductController::class,   'showProduct'])->name('show.product');
Route::post('/add/product',  [ProductController::class, 'StoreProduct'])->name('store.product');
Route::get('/edit/product/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
Route::post('/update/product/{id}', [ProductController::class, 'UpdateProduct'])->name('update.product');
Route::get('/delete/product/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');
///// product end///


/// manager start ////
Route::get('/add/manager', [UserController::class, 'ManagerView'])->name('add.manager');
Route::get('/show', [UserController::class, 'Managershow'])->name('show.manager');
Route::post('/store', [UserController::class, 'ManagerStore'])->name('manager.store');
Route::get('/edit/{id}', [UserController::class, 'ManagerEdit'])->name('manager.edit');
Route::post('/edit/{id}', [UserController::class, 'ManagerUpdate'])->name('ManagerUpdate');
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('manager.delete');
/// manager end////

//pdf start//
Route::get('/pdf', [PdfController::class, 'CreatePdf'])->name('create.pdf');
Route::get('/downloadpdf', [PdfController::class, 'download'])->name('download');
//pdf end//

//password change
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('superadmin.admin_change_password');
////Admin update password
Route::post('/update/change/password/', [AdminController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
Route::get('/notifications',[UserController::class,'Notification'])->name('notification');

});


///// purchase start///
Route::get('/add/purchase',   [PurchaseController::class,   'AddPurchase'])->name('add.purchase');
Route::get('/show/purchase',   [PurchaseController::class,   'showPurchase'])->name('show.purchase');
Route::post('/add/purchase',  [PurchaseController::class, 'StorePurchase'])->name('store.purchase');
Route::get('/edit/purchase/{id}', [PurchaseController::class, 'EditPurchase'])->name('edit.purchase');
Route::post('/update/purchase/{id}', [PurchaseController::class, 'UpdatePurchase'])->name('update.purchase');
Route::get('/delete/purchase/{id}', [PurchaseController::class, 'DeletePurchase'])->name('delete.purchase');
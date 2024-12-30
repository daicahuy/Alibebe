<?php
use App\Http\Controllers\Web\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return '<h2>@Copyright by Huy + Anh + Manh + Hiep + Quan + Tung + Bao</h2>';
});



/*--------------ADMIN--------------*/

Route::prefix('/admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::get('/Attributes', function () {
            return view('admin.pages.Attributes.listAttribute');
        })->name('Attributes');
        Route::get('/Attributes/add', function () {
            // return view('admin.pages.Attributes.listAttribute');
        })->name('Attributes.add');
        
        Route::get('/Attributes/edit/{id}', function () {
            // return view('admin.pages.Attributes.listAttribute');
        })->name('Attributes.edit');

        Route::get('/Attributes/delete/{id}', function () {
            // return view('admin.pages.Attributes.listAttribute');
        })->name('Attributes.delete');

        Route::get('/Attributes/Value',  function ()  {
            return view('admin.pages.Attributes.AttributeValue');
        })->name('Attributes.Value');
        
    });
<?php

use App\Http\Controllers\AuthContraller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jaimeinsertar;
use App\Http\Controllers\ProductController;

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
    return view('welcome');
});

Route::post('/store', [jaimeinsertar::class, 'store'])->name('store');

Route::get('/formulario', function () {
    return view('formulario'); // La vista 'formulario.blade.php' debe estar en 'resources/views'
});

//Route::get('/usuario/creado',[UsuarioControlador::class, 'create']);
//Route::post('/usuario/creado', [UsuarioControlador::class, 'create'])->name('create');

Route::get('/usuario/creado', function () {
    return view('create'); // La vista 'formulario.blade.php' debe estar en 'resources/views'
});

Route::get('login', [AuthContraller::class, 'showLogin']);
Route::post('login', [AuthContraller::class, 'login'])->name('login');
//Route::get('home', [AuthContraller::class, 'home'])->name('home');
Route::get('/home',function(){
    return view('home');
})->name('home'); 



//PRODUCTOS INSERTAR
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('products', [ProductController::class, 'index'])->name('products.index');
//PRODUCTOS ACTUALIZAR
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
//PRODUCTOS ELIMINAR
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
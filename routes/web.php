<?php

use App\Http\Controllers\AuthContraller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jaimeinsertar;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RopaController;
use App\Http\Controllers\Usuario2Controller;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RequestLogController;
use App\Http\Middleware\isAuthenticated;

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
    return view('formulario'); 
});

//Route::get('/usuario/creado',[UsuarioControlador::class, 'create']);
//Route::post('/usuario/creado', [UsuarioControlador::class, 'create'])->name('create');

Route::get('/usuario/creado', function () {
    return view('create');
});

/*Route::get('login', [AuthContraller::class, 'showLogin']);
Route::post('login', [AuthContraller::class, 'login'])->name('login');
//Route::get('home', [AuthContraller::class, 'home'])->name('home');
Route::get('/home',function(){
    return view('home');
})->name('home'); */



//PRODUCTOS INSERTAR
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('products', [ProductController::class, 'index'])->name('products.index');
//PRODUCTOS ACTUALIZAR
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
//PRODUCTOS ELIMINAR
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



Route::get('CRUDS_proy/ropa/create', [RopaController::class, 'create'])->name('ropa.create');
Route::post('CRUDS_proy/ropa/store', [RopaController::class, 'store'])->name('ropa.store');
Route::get('CRUDS_proy/ropa', [RopaController::class, 'index'])->name('ropa.index');
Route::get('CRUDS_proy/ropa/{id}/edit', [RopaController::class, 'edit'])->name('ropa.edit');
Route::put('CRUDS_proy/ropa/{id}', [RopaController::class, 'update'])->name('ropa.update');
Route::delete('CRUDS_proy/ropa/{id}', [RopaController::class, 'destroy'])->name('ropa.destroy');

Route::get('CRUDS_proy/usuarios', [Usuario2Controller::class, 'index'])->name('usuarios.index');
Route::get('CRUDS_proy/usuarios/create', [Usuario2Controller::class, 'create'])->name('usuarios.create');
Route::post('CRUDS_proy/usuarios', [Usuario2Controller::class, 'store'])->name('usuarios.store');
Route::get('CRUDS_proy/usuarios/{id}/edit', [Usuario2Controller::class, 'edit'])->name('usuarios.edit');
Route::put('CRUDS_proy/usuarios/{id}', [Usuario2Controller::class, 'update'])->name('usuarios.update');
Route::delete('CRUDS_proy/usuarios/{id}', [Usuario2Controller::class, 'destroy'])->name('usuarios.destroy');

Route::get('CRUDS_proy/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('CRUDS_proy/pedidos/store', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('CRUDS_proy/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('CRUDS_proy/pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('CRUDS_proy/pedidos/{id}', [PedidoController::class, 'update'])->name('pedidos.update');
Route::delete('CRUDS_proy/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

Route::get('CRUDS_proy/pagos/create', [PagoController::class, 'create'])->name('pagos.create');
Route::post('CRUDS_proy/pagos/store', [PagoController::class, 'store'])->name('pagos.store');
Route::get('CRUDS_proy/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::get('CRUDS_proy/pagos/{id}/edit', [PagoController::class, 'edit'])->name('pagos.edit');
Route::put('CRUDS_proy/pagos/{id}', [PagoController::class, 'update'])->name('pagos.update');
Route::delete('CRUDS_proy/pagos/{id}', [PagoController::class, 'destroy'])->name('pagos.destroy');

Route::get('auth/login', [AuthContraller::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [AuthContraller::class, 'login'])->name('login.submit');
Route::post('logout', [AuthContraller::class, 'logout'])->name('logout');

Route::get('auth/listamenu', [MenuController::class, 'index'])->name('listamenu');





Route::middleware('log.request')->group(function () {
    Route::get('CRUDS_proy/ropa/create', [RopaController::class, 'create'])->name('ropa.create');
    Route::post('CRUDS_proy/ropa/store', [RopaController::class, 'store'])->name('ropa.store');
    Route::get('CRUDS_proy/ropa', [RopaController::class, 'index'])->name('ropa.index');
    Route::get('CRUDS_proy/ropa/{id}/edit', [RopaController::class, 'edit'])->name('ropa.edit');
    Route::put('CRUDS_proy/ropa/{id}', [RopaController::class, 'update'])->name('ropa.update');
    Route::delete('CRUDS_proy/ropa/{id}', [RopaController::class, 'destroy'])->name('ropa.destroy');
    Route::get('CRUDS_proy/usuarios', [Usuario2Controller::class, 'index'])->name('usuarios.index');
    Route::get('CRUDS_proy/usuarios/create', [Usuario2Controller::class, 'create'])->name('usuarios.create');
    Route::post('CRUDS_proy/usuarios', [Usuario2Controller::class, 'store'])->name('usuarios.store');
    Route::get('CRUDS_proy/usuarios/{id}/edit', [Usuario2Controller::class, 'edit'])->name('usuarios.edit');
    Route::put('CRUDS_proy/usuarios/{id}', [Usuario2Controller::class, 'update'])->name('usuarios.update');
    Route::delete('CRUDS_proy/usuarios/{id}', [Usuario2Controller::class, 'destroy'])->name('usuarios.destroy');
    Route::get('CRUDS_proy/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post('CRUDS_proy/pedidos/store', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('CRUDS_proy/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('CRUDS_proy/pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::put('CRUDS_proy/pedidos/{id}', [PedidoController::class, 'update'])->name('pedidos.update');
    Route::delete('CRUDS_proy/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
    Route::get('CRUDS_proy/pagos/create', [PagoController::class, 'create'])->name('pagos.create');
    Route::post('CRUDS_proy/pagos/store', [PagoController::class, 'store'])->name('pagos.store');
    Route::get('CRUDS_proy/pagos', [PagoController::class, 'index'])->name('pagos.index');
    Route::get('CRUDS_proy/pagos/{id}/edit', [PagoController::class, 'edit'])->name('pagos.edit');
    Route::put('CRUDS_proy/pagos/{id}', [PagoController::class, 'update'])->name('pagos.update');
    Route::delete('CRUDS_proy/pagos/{id}', [PagoController::class, 'destroy'])->name('pagos.destroy');
    Route::get('auth/login', [AuthContraller::class, 'showLoginForm'])->name('login');
    Route::post('auth/login', [AuthContraller::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthContraller::class, 'logout'])->name('logout');
    Route::get('auth/listamenu', [MenuController::class, 'index'])->name('listamenu');
});

Route::get('/request_logs', [RequestLogController::class, 'index'])->name('request.logs');

Route::middleware([isAuthenticated::class])->group(callback: function(){
    Route::get('CRUDS_proy/ropa/create', [RopaController::class, 'create'])->name('ropa.create');
    Route::post('CRUDS_proy/ropa/store', [RopaController::class, 'store'])->name('ropa.store');
    Route::get('CRUDS_proy/ropa', [RopaController::class, 'index'])->name('ropa.index');
    Route::get('CRUDS_proy/ropa/{id}/edit', [RopaController::class, 'edit'])->name('ropa.edit');
    Route::put('CRUDS_proy/ropa/{id}', [RopaController::class, 'update'])->name('ropa.update');
    Route::delete('CRUDS_proy/ropa/{id}', [RopaController::class, 'destroy'])->name('ropa.destroy');
    Route::get('CRUDS_proy/usuarios', [Usuario2Controller::class, 'index'])->name('usuarios.index');
    Route::get('CRUDS_proy/usuarios/create', [Usuario2Controller::class, 'create'])->name('usuarios.create');
    Route::post('CRUDS_proy/usuarios', [Usuario2Controller::class, 'store'])->name('usuarios.store');
    Route::get('CRUDS_proy/usuarios/{id}/edit', [Usuario2Controller::class, 'edit'])->name('usuarios.edit');
    Route::put('CRUDS_proy/usuarios/{id}', [Usuario2Controller::class, 'update'])->name('usuarios.update');
    Route::delete('CRUDS_proy/usuarios/{id}', [Usuario2Controller::class, 'destroy'])->name('usuarios.destroy');
    Route::get('CRUDS_proy/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post('CRUDS_proy/pedidos/store', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('CRUDS_proy/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('CRUDS_proy/pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::put('CRUDS_proy/pedidos/{id}', [PedidoController::class, 'update'])->name('pedidos.update');
    Route::delete('CRUDS_proy/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
    Route::get('CRUDS_proy/pagos/create', [PagoController::class, 'create'])->name('pagos.create');
    Route::post('CRUDS_proy/pagos/store', [PagoController::class, 'store'])->name('pagos.store');
    Route::get('CRUDS_proy/pagos', [PagoController::class, 'index'])->name('pagos.index');
    Route::get('CRUDS_proy/pagos/{id}/edit', [PagoController::class, 'edit'])->name('pagos.edit');
    Route::put('CRUDS_proy/pagos/{id}', [PagoController::class, 'update'])->name('pagos.update');
    Route::delete('CRUDS_proy/pagos/{id}', [PagoController::class, 'destroy'])->name('pagos.destroy');
    Route::get('auth/listamenu', [MenuController::class, 'index'])->name('listamenu');
});
/*Route::get('dashboard', function () {
    return view('usuarios.index');
})->middleware('auth')->name('dashboard');
Route::middleware(['auth', 'log.activity'])->group(function () {
    Route::get('CRUDS_proy/usuarios/create', [UserProfileController::class, 'show']);
    Route::get('CRUDS_proy/usuarios/{id}/edit', [UserProfileController::class, 'settings']);
});*/
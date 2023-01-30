<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactoController;
use App\Models\Articles;
use Illuminate\Support\Facades\Route;

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
    $articles = Articles::with('user')->orderBy('id' , 'desc')->paginate(5);
    return view('welcome' , compact('articles'));
        //lO QUE HACEMOS ES QUE NOS MANDE A DASHBOARD TODOS LOS ARTICULOS 

})->name('inicio');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [ArticlesController::class , 'index2'])->name('dashboard'); //Me he creado esta ruta para poder hacer en dasboard que aparezcan todos los articulos de todos los proveedores y asi practicar
    Route::get('/MisArticulos', [ArticlesController::class , 'index'])->name('MisArticulos');
    Route::resource('articles' , ArticlesController::class);
    //eL RESORCE HACE LA RUTA PARA TODOS LOS METODOS (INCLUIDO LOS QUE CREES NUEVOS TU )



        //Rutas para el formulario de contacto

Route::get('/Contacto' , [ContactoController::class , 'pintarFormulario'])->name('contacto.pintar');

Route::post('/Contacto' , [ContactoController::class , 'procesarFormulario'])->name('contacto.procesar');



});

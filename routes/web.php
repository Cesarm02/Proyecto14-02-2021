<?php

use App\Modelos\ControlCambios;
use App\User;
use App\Modelos\Role;
use App\Modelos\Permiso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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


Auth::routes(['reset' =>false]);

Route::get('/', 'HomeController@index')->name('home');

//Role view
Route::resource('/role', 'RoleController')->names('role');

//User view
Route::resource('/user', 'UserController', [
    'except' => [
        'create', 'store'
    ]
])->names('user');

//PAGINA PRINCIPAL, QUE ES, view
Route::get('/diabetes', 'PageController@posts')->name('diabetes');
Route::get('/diabetes/create', 'PageController@crear')->name('diabetes.create');
Route::post('/diabetes', 'PageController@store')->name('diabetes.store');
Route::get('/diabetes/{id}/edit', 'PageController@edit')->name('diabetes.edit');
Route::put('/diabetes/{id}', 'PageController@update')->name('diabetes.update');
Route::delete('/diabetes/{id}', 'PageController@destroy')->name('diabetes.destroy');

// Perfil view  // VISTA CREADA MAS NO IMPLEMENTADA; RECOMENDADA COMO "Historia clinica" o resumen clinico
Route::get('/perfil/{perfil}', 'InformacionUserController@show')->name('perfiles.show');

//RUTAS PARA REFERENCIAS A ARTICULOS
Route::get('/articulo', 'ArticuloController@articulo')->name('articulo');
Route::get('/articulo/medicamentos', 'ArticuloController@medicamentos')->name('medicamentos');
Route::get('/articulo/glucometrias', 'ArticuloController@glucometrias')->name('glucometrias');
Route::get('/articulo/ejercicio', 'ArticuloController@ejercicio')->name('ejercicio');
Route::get('/articulo/comidas', 'ArticuloController@comidas')->name('comidas');

Route::get('/blog/{post}', 'ArticuloController@articulos')->name('articulos');

//RUTAS PARA PUBLICACIONES
Route::resource('/publicaciones', 'PublicacionesController')->names('publicaciones');

//RUTA PARA HOME Y GUIA ICONOS
Route::get('/inicio',function(){
    return view('dashboard.general');
})->name('inicio');

// POliticas de privacidad
Route::get('/politica', function(){
    return view('privacidad.tratamiento');
})->name('politica');

// Route::get('/medicamentos', function(){
//     $users = User::all();
//     return view('medicamentos.index', compact('users'));
// });

//RUTA DE MEDICAMENTOS
Route::resource('/medicamentos', 'MedicamentoController')->names('medicamentos');

Route::resource('eventos', 'CitasMedicasController')->names('eventos');

//RUTA DE GLUCOMETRIAS
Route::resource('/glucometrias', 'GlucometriaController')->names('glucometrias');

//RUTA DE PESO 
Route::resource('/peso', 'PesoPacienteController',[
    'except' =>[
        'create'
    ]
])->names('peso');

//RUTA DE ALIMENTOS
Route::resource('/alimentos', 'AlimentosController')->names('alimentos');
//Ruta de Ejercicios
Route::resource('/ejercicio', 'EjercicioController')->names('ejercicio');
//Ruta antescedentes
Route::resource('/antecedentes', 'AntescedentesController')->names('antecedentes');
// RUta insulinas
Route::resource('/insulinas', 'InsulinasController')->names('insulinas');
//Ruta historial
Route::resource('/historial', 'HistorialController')->names('historial');

//Ruta de reportes
Route::resource('/reportes', 'ReportesController')->names('reportes');

//RUTAS DE GRAFICAS
Route::post('/graficas', 'ReportesController@peso');
Route::get('/graficaPeso', 'ReportesController@graficaPeso')->name('grafica_peso');

Route::post('/grafica_ejercicio', 'ReportesController@ejercicio');
Route::get('/graficaEjercicio', 'ReportesController@graficaEjercicio')->name('grafica_ejercicio');

Route::post('/grafica_glucometria', 'ReportesController@glucometria');
Route::get('/graficaGlucometria', 'ReportesController@graficaGlucometria')->name('grafica_glucometria');

Route::get('/graficaPeso/imprimir', 'ReportesController@imprimirPeso');
Route::get('/graficaEjercicio/imprimir', 'ReportesController@imprimirEjercicio');
Route::get('/graficaGlucometria/imprimir', 'ReportesController@imprimirGlucometria');

//RUTA DE PERFILES
Route::resource('/perfil', 'PerfilController')->names('perfil');
Route::resource('/user/resumen', 'ResumenMedicoController')->names('resumen');
// Route::get('storage-link', function(){
//     Artisan::call('storage:link');
// });

//RUTAS DE HOME
Route::get('/soporte', function(){
    return view('privacidad.soporte');
})->name('soporte');

//RUTAS DE AUDITORIA
Route::get('/tablas', function(){
    return view('Auditoria.tablas');
})->name('tablas');

Route::get('/auditoria', function(){
    $datos = ControlCambios::all();
    return view('Auditoria.auditoria', compact('datos'));
})->name('auditoria');

Route::get('/manuales', function(){
    return view('privacidad.manuales');
})->name('manuales');

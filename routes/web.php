<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Frontend\Login\LoginController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\Controles\ControlController;
use App\Http\Controllers\Backend\Roles\RolesController;
use App\Http\Controllers\Backend\Roles\PermisoController;
use App\Http\Controllers\Backend\Perfil\PerfilController;
use App\Http\Controllers\Backend\Configuracion\ConfiguracionController;
use App\Http\Controllers\Backend\Registro\RegistroController;

//soap controller
use App\Http\Controllers\SoapController;
//
use App\Http\Controllers\Backend\Dashboard\DashboardController;


// --- LOGIN ---

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// --- CONTROL WEB ---

Route::get('/panel', [ControlController::class, 'indexRedireccionamiento'])->name('admin.panel');

// --- ROLES ---

Route::get('/admin/roles/index', [RolesController::class, 'index'])->name('admin.roles.index');
Route::get('/admin/roles/tabla', [RolesController::class, 'tablaRoles']);
Route::get('/admin/roles/lista/permisos/{id}', [RolesController::class, 'vistaPermisos']);
Route::get('/admin/roles/permisos/tabla/{id}', [RolesController::class, 'tablaRolesPermisos']);
Route::post('/admin/roles/permiso/borrar', [RolesController::class, 'borrarPermiso']);
Route::post('/admin/roles/permiso/agregar', [RolesController::class, 'agregarPermiso']);
Route::get('/admin/roles/permisos/lista', [RolesController::class, 'listaTodosPermisos']);
Route::get('/admin/roles/permisos-todos/tabla', [RolesController::class, 'tablaTodosPermisos']);
Route::post('/admin/roles/borrar-global', [RolesController::class, 'borrarRolGlobal']);

// --- PERMISOS A USUARIOS ---

Route::get('/admin/permisos/index', [PermisoController::class, 'index'])->name('admin.permisos.index');
Route::get('/admin/permisos/tabla', [PermisoController::class, 'tablaUsuarios']);
Route::post('/admin/permisos/nuevo-usuario', [PermisoController::class, 'nuevoUsuario']);
Route::post('/admin/permisos/info-usuario', [PermisoController::class, 'infoUsuario']);
Route::post('/admin/permisos/editar-usuario', [PermisoController::class, 'editarUsuario']);
Route::post('/admin/permisos/nuevo-rol', [PermisoController::class, 'nuevoRol']);
Route::post('/admin/permisos/extra-nuevo', [PermisoController::class, 'nuevoPermisoExtra']);
Route::post('/admin/permisos/extra-borrar', [PermisoController::class, 'borrarPermisoGlobal']);

// --- PERFIL DE USUARIO ---
Route::get('/admin/editar-perfil/index', [PerfilController::class, 'indexEditarPerfil'])->name('admin.perfil');
Route::post('/admin/editar-perfil/actualizar', [PerfilController::class, 'editarUsuario']);

// --- SIN PERMISOS VISTA 403 ---
Route::get('sin-permisos', [ControlController::class, 'indexSinPermiso'])->name('no.permisos.index');

Route::get('/admin/dashboard', [DashboardController::class, 'vistaDashboard'])->name('admin.dashboard.index');

//vista vista donde el usuario pueda sumar o multiplicar dos números.
//Route::get('/operaciones', [SoapController::class, 'index'])
//   ->name('operaciones.index');

//Route::post('/operar', [SoapController::class, 'operar'])
//  ->name('operar');

// --- OPERACIONES (solo para usuarios logueados) ---
Route::middleware(['auth'])->group(function () {
    Route::get('/operaciones', [SoapController::class, 'index'])->name('operaciones.index');
    Route::post('/operar', [SoapController::class, 'operar'])->name('operar');
});

// --- TEST XML

Route::get('/xml-to-json', function () {
    $xmlPath = storage_path('xml/libros.xml');
    if (!file_exists($xmlPath)) {
        return response()->json(['error' => 'Archivo XML no encontrado'], 404);
    }

    $xmlContent = file_get_contents($xmlPath);
    $xml = simplexml_load_string($xmlContent, "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json, true);

    //return response()->json($array);
    return view('frontend.preferencias', ['libros' => $array['libro']]);



});

Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');

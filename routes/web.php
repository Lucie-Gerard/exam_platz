<?php

use App\Http\Controllers\ResourcesController;
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

// 9. DEFAULT ROUTE
// 19. I indicate the controller in the brackets with the index class
Route::get('/', [ResourcesController::class, 'index'])
        ->name('home');
    // 16a. I cut the return view and paste it in the index controller



// 30. FORM TO ADD
Route::get('/resources/create', [ResourcesController::class, 'create']);



// 33. STORE RESOURCE DATA
Route::post('/resources', [ResourcesController::class, 'store']);



// 36. SHOW EDIT FORM
Route::get('/resources/{id}/edit', [ResourcesController::class, 'edit']);


// 39. UPDATE RESOURCE
Route::put('/resources/{resource}', [ResourcesController::class, 'update']);



// 41. DELETE RESOURCE
Route::delete('/resources/{resource}', [ResourcesController::class, 'destroy'])
        ->name('resources.destroy');


// 10. DETAIL ROUTE
// 20. I indicate the controller in the brackets with the show class
Route::get('/resources/{id}/{slug}', [ResourcesController::class, 'show'])
        ->whereNumber('id')
        ->name('resources.show');
// 17a. I cut the return view and paste it in the show controller



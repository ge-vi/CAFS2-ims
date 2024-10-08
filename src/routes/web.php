<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\OwnersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    // src/resources/js/Pages/Welcome.vue
    return Inertia::render('Welcome', [
        // component props
        'canLogin' => Route::has('login'),
        //'canRegister' => Route::has('register'),
        'canRegister' => false,
    ]);
});

Route::post('/demand', [DemandController::class, 'store'])
    ->name('demand.store');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/types', TypesController::class)
        ->only([
            'index',
            'store',
            'update',
            'destroy',
        ]);

    Route::resource('/items', ItemsController::class)
        ->only([
            'index',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
        ]);

    Route::resource('/owners', OwnersController::class)
        ->only([
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy',
        ]);
});

require __DIR__.'/auth.php';

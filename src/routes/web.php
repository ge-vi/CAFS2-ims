<?php

use App\Http\Controllers\DemandController;
use App\Http\Controllers\FaultController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypesController;
use Illuminate\Foundation\Application;
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
        'canRegister' => false, //Route::has('register'),
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/types', TypesController::class)
        ->only([
            'index',
            'store',
            'update',
            'destroy',
        ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/items', ItemsController::class)
        ->only([
            'index',
            'create',
            'store',
            'edit',
            'update',
            'destroy',
        ]);
});

Route::post('/demand', [DemandController::class, 'store'])
    ->name('demand.store');

Route::post('/repair', [FaultController::class, 'store'])
    ->name('repair.store');

require __DIR__.'/auth.php';

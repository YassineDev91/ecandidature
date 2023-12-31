<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/submission',[SubmissionController::class,'create'])->name('submission.create.personalInformation');
    Route::post('/personalInformations',[SubmissionController::class, 'store_personal_information'])->name('submission.personal_information');
    Route::post('/diplomasInformation',[SubmissionController::class, 'store_diplomas_information'])->name('submission.diplomas_information');
    // Route::post('/scoresInformation',[SubmissionController::class, 'store_scores_information'])->name('submission.scores_information');

});

require __DIR__.'/auth.php';

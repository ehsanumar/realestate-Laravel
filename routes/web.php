<?php

use App\Http\Controllers\EstatesController;
use App\Http\Controllers\ProfileController;
use App\Models\Estates;
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
    //Latest Estates
    $LastEstates=Estates::with(
        'City:id,city_name',
        'Type:id,estate_type',
        'Status:id,estate_status'
    )->latest()
    ->take(9)->get();
    $images = [];

    $LastEstates->each(function ($estate) use (&$images) {
        $images[$estate->id] = $estate->getMedia('estate_image');
    });

    return view('welcome',compact(['LastEstates', 'images']));
})->name('index');

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//agent route to create, edit and delete estates (Manage estates)
Route::resource('estate' ,EstatesController::class)->middleware(['auth', 'role:agent'])->except('show');





//services
Route::view('/services','services')->name('services');

//About
Route::view('/about','about')->name('about');

//contactus
Route::view('/contactus','contactus')->name('contactus');

require __DIR__.'/auth.php';


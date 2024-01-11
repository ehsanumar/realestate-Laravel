<?php

use App\Http\Controllers\EstatesController;
use App\Http\Controllers\FavuriteController;
use App\Http\Controllers\FilterEstateController;
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
    $LastEstates = Estates::with(['City:id,city_name', 'Type:id,estate_type', 'Status:id,estate_status', 'media' => function ($query) {
        $query->where('collection_name', 'estate_image');
    }])
        ->latest()
        ->take(9)
        ->get();
    return view('welcome', compact(['LastEstates']));
})->name('index');

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // favourite Route
    Route::resource('favourite', FavuriteController::class)->only('destroy', 'index', 'store');
});
//agent route to create, edit and delete estates (Manage estates)
Route::resource('estate', EstatesController::class)->middleware(['auth', 'role:agent'])->except('show');

Route::get('/all', [FilterEstateController::class, 'allEstate'])->name('all');

//buy estates filter
Route::get('/buy', [FilterEstateController::class, 'buyEstate'])->name('buy');

//rent estates filter
Route::get('/rent', [FilterEstateController::class, 'rentEstate'])->name('rent');

//rent estates filter
Route::get('/single/{id}', function ($id) {

    $singleEstates = Estates::with(['City:id,city_name', 'User:id,name,email', 'Type:id,estate_type', 'Status:id,estate_status', 'media' => function ($query) {
        $query->where('collection_name', 'estate_image');
    }])->where('id', $id)
        ->get();

    return view('estate.single-estate', compact(['singleEstates']));
})->name('single.estate');


//services
Route::view('/services', 'services')->name('services');

//About
Route::view('/about', 'about')->name('about');

//contactus
Route::view('/contactus', 'contactus')->name('contactus');

require __DIR__ . '/auth.php';

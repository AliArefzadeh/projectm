
<?php

use App\Http\Controllers\AlarmsController;
use App\Http\Controllers\HumidityController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Mail\TopicCreated;
use App\Models\User;
use App\Services\Notification\Notification;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/test', function () {
    return view('layout');
} );

Route::get('/humidity/create',[HumidityController::class,'create'])->name('humidity.create');
Route::post('/store',[HumidityController::class,'store'])->name('humidity.store');
Route::get('/form',[HumidityController::class,'form'])->name('humidity.form');
//روت بالا برای دستکاه سیم 800 عه


Route::get('/alarm/construction', [AlarmsController::class, 'store'])->name('alarm.store');


Route::get('/email', function () {
    /*$notification = new Notification();*/
    //وقتی یه کلاس دستی خودت ساختی از resolve استفاده کن
    //اگر تعدادشون زیاد بود باید یه کرای توی appServiceProvider انجام بدی
    //برای اطلاعات بیشتر ویدیو "طراحی سیستم بخش اول " ببین

    $notification = resolve(Notification::class);
    $notification->sendEmail(User::find(1),new TopicCreated());
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



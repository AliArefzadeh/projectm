
<?php

use App\Http\Controllers\IndexController;
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

Route::get('/form', function () {
    return view('form.form');
});

Route::get('/email', function () {
    /*$notification = new Notification();*/
    //وقتی یه کلاس دستی خودت ساختی از resolve استفاده کن
    //اگر تعدادشون زیاد بود باید یه کرای توی appServiceProvider انجام بدی
    //برای اطلاعات بیشتر ویدیو "طراحی سیستم بخش اول " ببین

    $notification = resolve(Notification::class);
    $notification->sendEmail(User::find(1),new TopicCreated());
});

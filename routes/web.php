<?php

use Illuminate\Support\Facades\Route;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EmailController;

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
    return view('welcome');
});

// Route::get("/Welcome", function() {
//     Mail::To("hasanzusamah@gmail.com")->send(new WelcomeEmail());
//     return new WelcomeEmail();
// });

Route::get("/email",[EmailController::class,"email"]);

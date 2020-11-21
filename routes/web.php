<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Members; //Load class Members

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
    return view('welcome');
});

Route::get('/sendmail', function () {
    \Mail::to('16523137@students.uii.ac.id')
        ->send(new \App\Mail\PostMail('Mengirim Email Menggunakan Gmail SMTP Laravel 8', 'Arie Arifin'));
    return 'Terkirim';
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('member', Members::class)->name('member'); //Tambahkan routing ini
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;

// Mengarahkan ke Controller (Struktur MVC)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Statis Lainnya (Opsional: Bisa lewat Controller atau tetap Route::view)
Route::view('/tentang-kami', 'pages.tentang-kami')->name('about');
Route::view('/legalitas', 'pages.legalitas')->name('legality');
Route::view('/karier', 'pages.karier')->name('careers');
Route::view('/magang', 'pages.magang')->name('internship');
Route::get('/berita', [NewsController::class, 'index'])->name('news');
Route::view('/kontak', 'pages.kontak')->name('contact');
Route::view('/registrasi', 'pages.registrasi')->name('registration');
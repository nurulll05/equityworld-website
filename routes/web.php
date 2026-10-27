
<?php

use Illuminate\Support\Facades\Route;

// Halaman Beranda
Route::view('/', 'home')->name('home');

// Halaman Tentang Kami
Route::view('/tentang-kami', 'pages.tentang-kami')->name('about');

// Halaman Legalitas
Route::view('/legalitas', 'pages.legalitas')->name('legality');

// Halaman Karier
Route::view('/karier', 'pages.karier')->name('careers');

// Halaman Berita
Route::view('/berita', 'pages.berita')->name('news');

// Halaman Kontak
Route::view('/kontak', 'pages.kontak')->name('contact');

// Halaman Registrasi
Route::view('/registrasi', 'pages.registrasi')->name('registration');

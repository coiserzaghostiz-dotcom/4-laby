<?php

use Illuminate\Support\Facades\Route;

$news = [
    ['heading' => 'В библиотеке сделали место для занятий', 'category' => 'Учёба', 'text' => 'На втором этаже поставили столы и добавили розетки. Место работает по расписанию библиотеки.'],
    ['heading' => 'Открылась запись в команду по волейболу', 'category' => 'Спорт', 'text' => 'Записаться можно у преподавателя физкультуры после пары.'],
    ['heading' => 'Первокурсники показали свои первые сайты', 'category' => 'Учёба', 'text' => 'На паре по веб-разработке ребята представили небольшие сайты на HTML и CSS.'],
];

Route::get('/', function () use ($news) {
    return view('feed', ['title' => 'Все новости', 'news' => $news]);
})->name('home');

Route::get('/category', function () use ($news) {
    $studyNews = array_filter($news, fn ($item) => $item['category'] === 'Учёба');

    return view('feed', ['title' => 'Учёба', 'news' => $studyNews]);
})->name('category');

Route::view('/journalist', 'journalist')->name('journalist');

Route::get('/admin', function () use ($news) {
    return view('admin', ['news' => $news]);
})->name('admin');

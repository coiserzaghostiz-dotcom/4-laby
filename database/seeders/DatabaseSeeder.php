<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $study = Category::firstOrCreate(['name' => 'Учёба']);
        $sport = Category::firstOrCreate(['name' => 'Спорт']);

        $reporter = User::firstOrCreate(
            ['login' => 'reporter'],
            ['password' => Hash::make('reporter123')]
        );

        $news = [
            ['Тренировка по баскетболу пройдёт в пятницу', 'Спортзал будет открыт с четырёх часов. С собой нужно взять сменную обувь.', $sport->id],
            ['В библиотеку привезли учебники по программированию', 'На полке у входа появились книги по HTML, CSS и базам данных. Их можно взять домой на две недели.', $study->id],
            ['В колледже прошёл турнир по настольному теннису', 'В турнире участвовали студенты трёх групп. Следующую встречу проведут в конце месяца.', $sport->id],
            ['Кабинет информатики открыт после пар', 'По вторникам и четвергам в кабинете 203 можно остаться и доделать лабораторные. Кабинет закрывается в пять вечера.', $study->id],
            ['Первокурсники показали свои первые сайты', 'На паре по веб-разработке ребята представили небольшие сайты на HTML и CSS. Каждый выбрал свою тему и показал, как устроена навигация.', $study->id],
            ['Открылась запись в команду по волейболу', 'Записаться можно у преподавателя физкультуры после пары. Первая тренировка пройдёт в большом спортзале.', $sport->id],
            ['В библиотеке сделали место для занятий', 'На втором этаже поставили столы и добавили розетки. Здесь можно поработать с ноутбуком или подготовиться к паре. Место открыто по расписанию библиотеки.', $study->id],
        ];

        foreach ($news as $index => [$heading, $text, $categoryId]) {
            $article = $reporter->texts()->firstOrNew(['heading' => $heading]);

            if (! $article->exists) {
                $article->text = $text;
                $article->category_id = $categoryId;
                $article->created_at = now()->subDays(count($news) - $index);
                $article->updated_at = $article->created_at;
                $article->save();
            }
        }
    }
}

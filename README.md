# Новости колледжа

Лабораторная №2. Лента и категории из базы, регистрация, вход и выход, создание и редактирование своих статей. Админка пока показывает вёрстку.

## Запуск

Нужны PHP 8.2 или новее с PDO SQLite и Composer. В PowerShell из папки проекта:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan migrate --seed --force
php artisan serve
```

Открой http://127.0.0.1:8000 и войди как `reporter` с паролем `reporter123`.

В меню «Категория» сначала открывается «Учёба». Над лентой можно выбрать «Учёбу» или «Спорт». Список категорий берётся из базы данных.

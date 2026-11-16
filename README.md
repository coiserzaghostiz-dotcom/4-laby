# Новости колледжа

Лабораторная №1. Статическая вёрстка четырёх разделов.

## Запуск

Нужны PHP 8.2 или новее и Composer. В PowerShell из папки проекта:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
php artisan serve
```

Открой http://127.0.0.1:8000. Формы журналиста и админа на этом этапе показывают вёрстку. Шапка и подвал находятся в `resources/views/components`.

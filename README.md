# TodoTask

### Про проєкт
TodoTask - сервіс для керування завданнями.

### Інструменти для запуску проєкту
Для того, щоб запустити проєкт, вам знадобиться:
1. PHP **7.4.2**
2. Composer **2.3.7**
3. MySQL Server

### Як запустити проєкт?
Для того, щоб запустити проєкт, вам потрібно:
1. Клонувати репозиторій:
   `git clone https://github.com/shavlenkov/todotask.git`
2. Запустити MySQL-сервер і під'єднатися до нього.
3. Створити базу даних.
4. З файлу .env.example зробити файл .env
5. Внести необхідні зміни конфігурації до файлу .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
6. Перейти до папки todotask:
   `cd todotask`
7. Встановити всі залежності за допомогою Composer:
   `composer install`
8. Згенерувати App Key:
   `php artisan key:generate`
9. Запустити міграції та фабрики:
   `php artisan migrate --seed`
10. Запустити сервер:
    `php artisan serve`
11. Відкрити браузер та перейти за адресою:
    [http://localhost:8000/](http://localhost:8000/ "http://localhost:8000/")

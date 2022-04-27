# Инструкция по развертыванию проекта


Я использую опенсервер поэтому объясню как развертывать на нем

Скачиваем зип файл исходника из репозитория

Извлекаем в папку domains которая находится в папке с установленной опенсервер

Запускаем опенсервер, жмем правой кнопкой на значке: "дополнительно->консоль"

В консоли переходим к папке с проектом(cd domains/amedia)

Выполняем команды:

composer install

npm install

Правой кнопкой на значке опенсервера: "дополнительно->phpMyAdmin"

Создаем новый БД 

В папке с проектом находится файл .env.example, копируем его в эту же папку с названием .env, открываем в редакторе скопированный файл и правим:

 DB_DATABASE=(название созданного БД)
 
DB_USERNAME=root

DB_PASSWORD=root

APP_URL=http://127.0.0.1:8000

FILESYSTEM_DRIVER=public

Дальше выполняем команды на консоли:

php artisan key:generate

php artisan storage:link

php artisan migrate

php artisan db:seed

php artisan serve

Переходим к по ссылке
 
Для роли manager:

Логин:  manager@example.com

Пароль:  manager

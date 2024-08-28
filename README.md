# Информатика и Сервис

## Установка и запуск через OpenSever

1. Склонировать репозиторий:<br>
   `git clone https://github.com/CapFrostyMug/informatics-service.git`

2. Перейти в корень проекта

3. Создать свой файл `.env`:<br>
   `cp .env.example .env`

4. Установить Composer-зависимости:<br>
   `composer install`

5. Сгенерировать `APP_KEY`:<br>
   `php artisan key:generate`

6. Установить npm-пакеты:<br>
   `npm i`

7. Выполнить сборку front-части проекта:<br>
   `npm run build`

8. Создать локальную базу данных (имя базы данных — `informatics_service`)

9. Выполнить команды `migrate` и `seed`:<br>
   `php artisan migrate && php artisan db:seed`

10. В настройках OpenServer во вкладке Домены указать домен (любой) и путь до папки `public` проекта. 


## Установка и запуск через Docker

1. Склонировать репозиторий:<br>
   `git clone https://github.com/CapFrostyMug/informatics-service.git`

2. Перейти в корень проекта

3. Создать свой файл `.env`:<br>
   `cp .env.example .env`

4. Поднять Docker:<br>
   `docker-compose up -d`
   
5. Установить Composer-зависимости:<br>
   `docker exec -it informatics-service-app composer install`
   
6. Опустить Docker:<br>
   `docker-compose down`
   
7. Запустить Laravel Sail (в фоновом режиме):<br>
   `./vendor/bin/sail up -d`
   
8. Сгенерировать `APP_KEY`:<br>
   `./vendor/bin/sail artisan key:generate`
   
9. Установить npm-пакеты:<br>
   `./vendor/bin/sail npm install`

10. Выполнить сборку front-части проекта:<br>
    `./vendor/bin/sail npm run build`

11. В файле `.env` прописать параметры для подключения к базе данных:<br>
* `DB_CONNECTION=mysql`
* `DB_HOST=host.docker.internal`
* `DB_PORT=3306`
* `DB_DATABASE=informatics_service`
* `DB_USERNAME=sail`
* `DB_PASSWORD=password`

12. Выполнить команды `migrate` и `seed`:<br>
   `./vendor/bin/sail artisan migrate && ./vendor/bin/sail artisan db:seed`
   
13. Для открытия проекта в браузере, набрать в адресной строке:<br>
    http://localhost/

При возникновении ошибки типа **"Failed to open stream: Permission denied"**, скорее всего, необходимо дать права для работы с файлом **laravel.log** Для этого, находясь в папке с проектом, требуется выполнить команду: `sudo chmod 777 -R ./`

# Информатика и Сервис

## Установка и запуск через OpenSever

1. Склонировать репозиторий:<br>
   `git clone https://github.com/CapFrostyMug/informatics-service.git`

2. Перейти в корень проекта

3. Создать свой файл `.env`:<br>
   `cp .env.example .env`

4. Сгенерировать `APP_KEY`:<br>
   `php artisan key:generate`

5. Установить Composer-зависимости:<br>
   `composer install`

6. Установить npm-пакеты:<br>
   `npm i`

7. Выполнить сборку front-части проекта:<br>
   `npm run build`

8. Создать локальную базу данных (имя базы данных — `informatics_service`)

9. Выполнить команды `migrate` и `seed`:<br>
   `php artisan migrate && php artisan db:seed`

10. В настройках OpenServer во вкладке Домены указать домен (любой) и путь до папки `public` проекта. 


#### Следующие действия необходимо выполнять, находясь в корне проекта

3. Поднять докер:<br>
   `docker-compose up -d`
   
4. Установить папку vendor:<br>
   `docker exec -it tigratika composer install`
   
5. Опустить докер:<br>
   `docker-compose down`
   
6. Поднять докер (в фоновом режиме):<br>
   `./vendor/bin/sail up -d`
   
7. Сгенерировать APP_KEY:<br>
   `./vendor/bin/sail artisan key:generate`
   
8. Запустить миграции БД:<br>
   `./vendor/bin/sail artisan migrate`
   
9. Установить npm-зависимости:<br>
   `./vendor/bin/sail npm install`
   
10. Выполнить сборку фронт-части проекта:<br>
   `./vendor/bin/sail npm run build`
   
11. Запуск worker-а (очереди) в фоновом режиме:<br>
   `./vendor/bin/sail artisan queue:work &`
   
12. Дополнительно: Остановка worker-а (очереди), работающего в фоновом режиме:<br>
   `./vendor/bin/sail artisan queue:restart`
   
13. Для открытия проекта в браузере, набрать в адресной строке:<br>
    http://localhost/
   

При возникновении ошибки типа **"Failed to open stream: Permission denied"**, скорее всего, необходимо дать права для работы с файлом **laravel.log** Для этого, находясь в папке с проектом, требуется выполнить команду: `sudo chmod 777 -R ./`

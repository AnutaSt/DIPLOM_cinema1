# Netology-Project
Developed on Laravel 10 in conjunction with livewire, using the moonshine admin panel

### Requirements
* **php >= 8.1**
* **composer > 2**
* **mySQL >= 5.6.0**

### Installation
 * Run the command in the terminal: **composer create-project anna-stupina38/cinema-project**
 * Create a mySQL database on your local or remote server and edit the **.env** file in the project root directory, assigning values ​​to the constants, where:<br />
**APP_URL:** your domain<br />
**DB_HOST:** mySQL server address<br />
**DB_PORT:** connection port<br />
**DB_DATABASE:** database name<br />
**DB_USERNAME:** username to connect to the database<br />
**DB_PASSWORD:** password to connect to the database<br />

### Create storage link
* **php artisan storage:link**

### Run migrations
 * **php artisan migrate**

### Creating an administrator
* **php artisan moonshine:user**

### Resources
* **The admin panel resources are located in the folder:** App\MoonShine\Resources
* **Route to enter the admin panel:** /lk

### Как подготовить проект к работе:
1. Выполните команду в терминале: composer create-project anna-stupina38/cinema-project

2. Создайте базу данных MySQL на локальном или удаленном сервере и отредактируйте файл .env в корневом каталоге проекта, присвоив значения константам, где:
APP_URL: ваш домен
DB_HOST: адрес сервера MySQL
DB_PORT: порт подключения
DB_DATABASE: имя базы данных
DB_USERNAME: имя пользователя для подключения к базе данных
DB_PASSWORD: пароль для подключения к базе данных

3. Создайте ссылку на хранилище, выполнив команду в терминале: php artisan storage:link

4. Выполните миграцию: php artisan migrate

5. Создайте администратора: php artisan moonshine:user

### - Как запустить:
Локально:
В терминале, находясь в корневой папке проекта, выполните команду: php artisan serve
Проект будет доступен по адресу: http://localhost:8000

### - Какие endpoint'ы для админки:

Аутентификация в админ панели: http://localhost:8000/lk

### - Почему выбрали именно такую архитектуру приложения:

Я считаю, что Laravel – лучший выбор для создания современных полнофункциональных веб-приложений.
Ларавел - мощный, современный фреймворк, придерживающийся схемы разделения данных приложения и управляющей логики на три отдельных компонента: модель, представление и контроллер - Model-View-Controller (MVC).
Laravel невероятно масштабируем. Благодаря удобному для масштабирования характеру PHP и встроенной поддержке быстрых распределенных систем кеширования, таких как Redis, горизонтальное масштабирование с Laravel очень просто. Фактически, приложения Laravel легко масштабируются для обработки сотен миллионов запросов в месяц.
Ларавел объединяет лучшие пакеты в экосистеме PHP, чтобы предложить наиболее надежный и удобный для разработчиков фреймворк.
Laravel — это популярный PHP-фреймворк, который обеспечивает высокую безопасность создаваемых приложений и предоставляет разработчикам инструменты для работы с аутентификацией, маршрутизацией, сеансами и кэшированием.

Вот еще несколько причин, почему проект создан на Ларавел:

- высокий уровень безопасности
- высокая производительность
- интегрированная система авторизации
- открытый исходный код и мощное сообщество
- шаблоны Blade
- миграция баз данных
- архитектура MVC
- объектно-ориентированные библиотеки
- простота тестирования
- приложения, готовые к работе в будущем.:
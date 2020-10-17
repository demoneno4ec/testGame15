### Пятнашки

Стек технологий
================
|name           |version |description                                  |
|:---------     |:------:|-----------                                  |
|**php**        | 7.4    | personal home page                          |
|**Laravel**    | 8.0    | Framework для разработки приложений на php. |
|**PostgreSql** | 10.14  | реляционная база данных                     |

### Just do it
```shell script
composer install
composer dump-autoload
cp .env.example .env
php artisan key:generate
php artisan cache:clear
php artisan config:cache
php artisan storage:link
```

![#f03c15](https://via.placeholder.com/15/f03c15/000000?text=+) `Не забудь внести изменения для подключения к бд, в .env`

Накатываем таблицы бд.
```shell script
php artisan migrate:refresh --seed
```

## API

### POST
1. /api/game
2. /api/game/{id}/solve

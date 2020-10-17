# Тестовое задание
Привет, $username !
Твоя задача написать API для игры в [пятнашки](https://ru.wikipedia.org/wiki/%D0%98%D0%B3%D1%80%D0%B0_%D0%B2_15). 

## Функционал сервиса:
* Хранение пользователей (подойдёт коробочное от laravel)
* Создание и хранение игр, для упрощения мы не будем оперировать картинками, только символами
* Решение созданных пользователями игр
##### P.S в игру может играть только пользователь, от имени которого игра создавалась

Для реализации функционала сервиса предлагается реализовать несколько API методов:
## Запрос вида POST /api/game
В запрос МОЖЕТ передаваться строка из 15 символов, считать, что эта последовательность является отсортированной корректно.
Если строка не передана, она должна сгенерироваться на сервере случайно.
В результате пользователю приходит в ответ перетасованное поле и id созданной игры
P.S Анонимно игру создать нельзя, только залогинившись

## Запрос вида POST /api/game/id/solve
##### В запрос присылается последовательность ходов ( придумать формат )
При обработке проверять решения пользователя на валидность: после последовательности перемещений пятнашки действительно соберутся корректно.
##### Высчитывать и сохранять время прохождения
Это время между вызовом запроса на создание игры и запросом на ее решение.


## Особенности создания игры:
* Используется квадратное поле (при создании игры это нужно проверять)
* Для каждой игры загружается квадратная картинка, которая впоследствии разрезается на кусочки и распределяется между игровыми тайлами.

## Стэк:
* Laravel
* PostgreSQL
* Redis
## ДОПОЛНИТЕЛЬНЫЕ ЗАДАНИЯ для senior
Если ты middle и тоже хочешь попробовать, то милости просим. Для senior данный блок обязательный.
* Написать интерфейс и реализацию условного решателя пятнашек, который выдаст последовательность ходов для успешного решения игры.
* Доказать оптимальность придуманного алгоритма
* Контейнеризация приложения (Docker, docker-compose).

## ДОПОЛНИТЕЛЬНЫЕ ЗАДАНИЯ на fullstack
Необходимо написать фронт для игры. дизайн произвольный, функционал: анимированное перемещение ячеек, кнопка сброс, таймер который должен менять значение во время игры.
### Стек
* NuxtJS
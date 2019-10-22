SYMFONY Products API END POINTS
===============================

This is test symfony api applications build using API-Platform which implemnets CRUD functionality and integrated Admin Component.

Requirements
------------

  * PHP 7.1.3 or higher;
  * MYSQL PHP extension enabled;
  * and the [usual Symfony application requirements][2].

Installation
------------
Download the repository and its contains all the source code including dependencies, if you got any error run
```bash
composer install 
```
Add migrations and schema
-------------------------
set database name in .env file
```bash
php bin/console make:migrations
```bash
php bin/console make:migrations:migrate
```
Run project directory start server
-----------------------------------
```bash
symfony server start
```
http://localhost:8000/api will give you interface for CRUD

Running Admin Component
-----------------------

got to projectdir/my-admin and run
```
yarn start
```
it will start the admin panel where you can see listed products you can serach by name , price  sort by different fields.


Creating user and requesting API token for CRUD
-----------------------------------------------
```bash
curl -X POST -H "Content-Type: application/json" http://localhost:8000/register -d "{\"email\":\"test2@mail.com\",\"password\":\"test2\"}"
(it will register new user)
```bash
curl -X POST -H "Content-Type: application/json" http://localhost:8000/login -d "{\"email\":\"test2@mail.com\",\"password\":\"test2\"}"
(it will login user and give api token)
this token you can use to authorize and use api tokens.
```bash
curl -X GET -H "Content-Type: application/json" "http://localhost:8000/api" -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NzE2MzUxODEsImV4cCI6MTU3MTYzODc4MSwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoidGVzdDJAbWFpbC5jb20ifQ.X7KtcOAF_IJsQVHfJMvB7rK6D38uLwEhN0apkcVoUvdaf-qpsr7-n8eJcJMr4BXqQkrF9JkO5FGgLBwIDX_wgO01n9x4yid-gmHXlJuoemt8TlJqFNyUe-kRan0UzFU28bOtZTTGID7so0bgZyXvGgWETtZcy1Y9-IAU1RDsZnQcN3HN_Q1zFhvPfBxgehLQ_F_djMpPiPEbLv5Ov1J7ko7xOOrWCaUBqcFoGHfFUhVU4UiuT1LDDbqINYyifI3kFAxFE01J5hAYzjy8l05nJ8-XVrfGLHvzhDhH50POVDmxzYz3VYxvSFl9gdNZsWxcepM6JgdtClMMBeEvgM5tCUwsvvnKZ6ACiUPZTcZBvRMOtzY4JwPUI5ve8B0farLDF6TG8MglvZKYc3KlRmbWUBaVV8abIRExH_3mpOgIUBzMBgtmJCTiBF3lMscja6XGosnXqfLwXgZyBSP_TWWavLZJd4zzqYgQTyFNi8apb1L5kGnMxX7duOU4qJREPZaEKCjyHE2vBCWJe0KZDTc8tiFe6Q0ut6xa2Bh_0b-jNHYm-ieG4XYFJ2GQCPZEpbMLYssDB_4EopxU8x88f-OUxBmirVPERuN15WPGOo0dQRpmG2JPOGuZUAUwrZsQxyEPBHG-8ZZkw_M_esfCEV2hVzaoNSOo_YYKf6CICQKPCm4





##Installation
Download the repository and its contains all the source code including dependencies, if you got any error run
composer install 

##add migrations and schema
php bin/console make:migrations
php bin/console make:migrations:migrate

in project directory start server
symfony server start
http://localhost:8000/api will give you interface for CRUD
now in new command prompt
got to projectdir/my-admin and run
yarn start
it will start the admin panel where you can see listed products you can serach by name , price  sort by different fields.

Here are api end points to register user and get api token by username and email\

curl -X POST -H "Content-Type: application/json" http://localhost:8000/register -d "{\"email\":\"test2@mail.com\",\"password\":\"test2\"}"
(it will register new user)

curl -X POST -H "Content-Type: application/json" http://localhost:8000/login -d "{\"email\":\"test2@mail.com\",\"password\":\"test2\"}"
(it will login user and give api token)
this token you can use to authorize and use api tokens.

##CRUD api end points

To see listed products
http://localhost:8000/api

On React admin:
http://localhost:3000/


## Welcome to FiguredTest

To run this test just do the following:

**You need to have docker and docker-compose installed to run this app**

1. Clone this repo
1. `cd ./figuredtest`
1. `docker-compose up -d`
1. `docker-compose exec --user=1000:www-data phpfpm ./composer.phar install`
1. `cp .env.example .env`
1. `docker-compose exec --user=1000:www-data phpfpm ./artisan migrate:fresh --seed`
1. `docker-compose exec phpfpm chown -R 1000:www-data ./storage ./bootstrap/cache`
1. `docker-compose exec phpfpm chmod -R 775 ./storage ./bootstrap/cache`
1. You're good to go! open your browser on http://localhost

Please feel free to raise any issues you encounter.

***

## Unit Testing

Once you've done setting up the project (docker containers up, app running, etc.) execute the following command:

`docker-compose exec phpfpm ./vendor/bin/phpunit`

## Welcome to FiguredTest

To run this test just do the following:

**You need to have docker and docker-compose installed to run this app**

1. clone this repo
2. cd into dir
3. `docker-compose up -d`
4. `docker-compose exec --user=1000:www-data phpfpm ./composer.phar install`
5. `docker-compose exec --user=1000:www-data phpfpm ./artisan migrate:fresh --seed`
6. you're good to go!

Please feel free to raise any issues you encounter.

***

## Unit Testing

Once you've done setting up the project (docker containers up, app running, etc.) execute the following command:

`docker-compose exec phpfpm ./vendor/bin/phpunit`

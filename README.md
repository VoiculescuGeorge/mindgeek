## Background

You will need to write a program that downloads all the items in https://mgtechtest.blob.core.windows.net/files/showcase.json  and cache images within each asset. To make it efficient, it is desired to only call the URLs in the JSON file only once. Demonstrate, by using a framework of your choice, your software architectural skills. How you use the framework will be highly important in the evaluation.
 
How you display the feed and how many layers/pages you use is up to you, but please ensure that we can see the complete list and the details of every item. You will likely hit some road blocks and errors along the way, please use your own initiative to deal with these issues, it’s part of the test.
Please ensure all code is tested before sending it back, it would be good to also see unit tests too. Ideally, alongside supplying the code base and all packages/libraries required to deploy, you will also have to supply deployment instructions too.'
 
The test is not limited in the sense that you do not have a timer or anything once you open the link. Also, the link itself does not expire once you sent it.

## The Task
- Using Laravel 6.14.0
- Using Redis
- Using mysql:5.7
- Using php:7.2-fpm
- 1 Unit test.
- Caching is done only for images that have a header with content type image/"extension", the ones that are giving errors are left on the source URL
- 5 commands: see setup below
- The project can be improved, decoupled more as it goes on but as a first draft it respects SOLID and CLEAN principles.
- Code review is usually required but non was done.
- Acces using any browser http://localhost:8099 to see the showcase.

## Run the project
### Setup
- Copy env.example and save it as .env
- `docker-compose up -d`
-  wait for all containers to create and composer install to finish
- `docker exec mindgeek_mindgeek-app_1 php artisan key:generate`
- `docker exec mindgeek_mindgeek-app_1 php artisan migrate --seed`
- `docker exec mindgeek_mindgeek-app_1 php artisan scan:url https://mgtechtest.blob.core.windows.net/files/showcase.json` (Json is scanned and added to database and images are added to cache. May take a while. Meanwhile you can access  http://localhost:8099 too see how many movies already in db.)
-  access using any browser http://localhost:8099


## Tests
- `docker exec mindgeek_mindgeek-app_1 php vendor/bin/phpunit` (execute php unit tests)

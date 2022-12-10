# Bugloos Challange

To run this project you can use `Docker Compose` then you should run these commands in your container:
(you can also use `Laravel Sail`)

- composer install
- php artisan migrate

## The Console Command

I have created a console command called `log:import` which can be used to import a log file.

The Command assumes that the log file is located in `/logs-to-import` directory. By adding  `LOGS_PATH_TO_IMPORT` env variable you can specify where the log file is located.

## The Count Endpoint

A GET endpoint `/logs/count` is defined, which return the count of logs located in the logs table. The result is filterable by adding query parameters `?serviceNames=ord&statusCode=201&startDate=2022-01-01&endDate=2022-09-29`

`serviceNames` parameter is used to filter the service name.

`statusCode` parameter is used to filter the http status code.

`startDate` parameter is used to filter the stating date. example: `2022-09-29`

`endDate` parameter is used to filter the stating date. example: `2022-09-29`

There are two tests defined within this project.

### More Details are provided in the video file.

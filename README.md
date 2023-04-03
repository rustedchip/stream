# stream

> *A simple personal micro blog application built with Laravel 8, envolving Docker and Google App Run.*

[![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/docs/8.x/readme)
[![Google Cloud](https://img.shields.io/badge/GoogleCloud-%234285F4.svg?style=for-the-badge&logo=google-cloud&logoColor=white)](https://cloud.google.com/run/docs)
[![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)](https://docs.docker.com/compose/)


It works with build-in webserver of php/laravel as regular laravel app, it works with docker compose check the `docker-compose.yml` <br />
to set all variables coming from `.env` file, and it also works with Google Cloud Run, using `google-run` file as Dockerfile, check <br />
`stream-google-run/.env.google-run` file to set all enviroment variables.

### *Google Cloud Run*
App requires to have a mysql instance, essential to set `DB_SOCKET` with `/cloudsql/project:region:instance`, for uploading files it uses <br />
google bucket that will require bucket name on  `GOOGLE_BUCKET` and json application credentials secret on `GOOGLE_APPLICATION_CREDENTIALS`. <br />

The file `stream-google-run/stream.sql` has the dump that you have to restore in your mysql-instance, upload it first in your private bucket, <br />
you can set your own user and password, or you can leave as adminisrator and change the defaul password `password` later inside the app.

### *Things to Know*
App is simple, two controllers and all controllers, models and views using default laravel structure, app is using simple boostrap 5, google <br />
material icons and TinyMCE as post editor, everything by default. <br />

It uses only one user, because it is personal, login page is the default laravel route `login`, it has an unnecessary files page, the purpose is <br />
to share text only and get images by url from somewhere else, but is there as complete example about dealing with Google Cloud Run Databases  <br />
and Files.

[![Licence](https://img.shields.io/github/license/rustedchip/stream?style=for-the-badge)](./LICENSE.md)


# Sigo
+




## Set up environment

- copy env.example to .env
- docker-compose up -d
- docker exec -it sigo-web composer install
- docker exec -it sigo-web php artisan key:generate
- docker exec -it sigo-web php artisan config:cache
- docker exec -it sigo-web php artisan migrate
- docker exec -it sigo-web php artisan db:seed


## How to run

- docker-compose up -d
- docker exec -it sigo-web php artisan serve --host 0

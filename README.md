# Web-Travel

Travel agency web app

## How to deploy

### Clone the repository

   ```shell
   git clone https://github.com/Lesart501/web-travel.git --config core.autocrlf=input
   ```

   ```shell
    cp .env.example .env
   ```

### Build and launch containers

   ```shell
    docker-compose up -d
   ```

### Inside the php-fpm container

   ```shell
    composer install
   ```

   ```shell
    php artisan key:generate
   ```

   ```shell
    php artisan migrate --seed
   ```

   ```shell
    php artisan storage:link
   ```
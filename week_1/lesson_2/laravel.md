# Set up Laravel #

## Step ##

1. Clone project from github
   ```
    git clone https://github.com/laravel/laravel.git laravel
   ```
   cd to project
2. Install composer by Docker's composer image
    ```
    docker run --rm -v $(pwd):/app composer install
    ```
3. Add permission for project 
   ```
    sudo chown -R $USER:$USER 
   ```
4. Create a docker-compose file
   ```
   touch docker-compose.yml
   ```
   add content
   ```
    version: '2.0'
    services:

      #PHP Service
      app:
        build:
          context: .
          dockerfile: Dockerfile
        image: cloudsigma.com/php
        container_name: app
        restart: unless-stopped
        tty: true
        environment:
          SERVICE_NAME: app
          SERVICE_TAGS: dev
        working_dir: /var/www/html/
        volumes:
          - ./:/var/www/html/
          - ./php/laravel.ini:/usr/local/etc/php/conf.d/laravel.ini
        networks:
          - app-network

      #Nginx Service
      webserver:
        image: nginx:alpine
        container_name: webserver
        restart: unless-stopped
        tty: true
        ports:
          - "80:80"
          - "443:443"
        volumes:
          - ./:/var/www/html/
          - ./nginx/conf.d/:/etc/nginx/conf.d/
        networks:
          - app-network

      #MySQL Service
      db:
        image: mysql:5.7.32
        container_name: db
        restart: unless-stopped
        tty: true
        ports:
          - "3306:3306"
        environment:
          MYSQL_DATABASE: laravel_web
          MYSQL_ROOT_PASSWORD: replace_mysql_root_password
          SERVICE_TAGS: dev
          SERVICE_NAME: mysql
        volumes:
          - dbdata:/var/lib/mysql/
          - ./mysql/my.cnf:/etc/mysql/my.cnf
        networks:
          - app-network

    #Docker Networks
    networks:
      app-network:
        driver: bridge
    #Volumes
    volumes:
      dbdata:
        driver: local
   ```
5. Create Dockerfile for PHP
   ```
    FROM php:7.4-fpm

    # Copy composer.lock and composer.json into the working directory
    COPY composer.lock composer.json /var/www/html/

    # Set working directory
    WORKDIR /var/www/html/

    # Install dependencies for the operating system software
    RUN apt-get update && apt-get install -y \
        build-essential \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        locales \
        zip \
        jpegoptim optipng pngquant gifsicle \
        vim \
        libzip-dev \
        unzip \
        git \
        libonig-dev \
        curl

    # Clear cache
    RUN apt-get clean && rm -rf /var/lib/apt/lists/*

    # Install extensions for php
    RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
    RUN docker-php-ext-configure gd --with-freetype --with-jpeg
    RUN docker-php-ext-install gd

    # Install composer (php package manager)
    RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

    # Copy existing application directory contents to the working directory
    COPY . /var/www/html

    # Assign permissions of the working directory to the www-data user
    RUN chown -R www-data:www-data \
            /var/www/html/storage \
            /var/www/html/bootstrap/cache

    # Expose port 9000 and start php-fpm server (for FastCGI Process Manager)
    EXPOSE 9000
    CMD ["php-fpm"]
   ```
5. Config php
   ```
    mkdir php
    touch php/laravel.ini
    ```
    Add some configure here
    ```
    
    upload_max_filesize=80M
    post_max_size=80M
   ```
6. Configure nginx
    ```
    mkdir nginx
    touch nginx/conf.d/app.conf
    ```
    Add this content
    ```
    server {
    listen 80;
        index index.php index.html;
        error_log  /var/log/nginx/error.log;
        access_log /var/log/nginx/access.log;
        root /var/www/html/public;
        location ~ \.php$ {
    try_files $uri =404;
            fastcgi_split_path_info ^(.+\.php)(/.+)$;
            fastcgi_pass app:9000;
            fastcgi_index index.php;
            include fastcgi_params;
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_param PATH_INFO $fastcgi_path_info;
        }
    location / {
    try_files $uri $uri/ /index.php?$query_string;
            gzip_static on;
        }
    }
    ```
7. Configure MYSQL
   ```
   mkdir mysql
   touch mysql/my.cnf
   ```
   Add this content
   ```
   [mysqld]
    general_log = 1
    general_log_file = /var/lib/mysql/general.log
    ```
8. Set env
   ```
    cp .env.example .env
   ```
    Add this config
    ```
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=laravel_web
    DB_USERNAME=laraveldocker
    DB_PASSWORD=laraveldocker123

    ```
9. Generate key
    Access in app container
    ```
    docker-compose exec app bash

    php artisan key:generate

    php artisan config:cache
    ```
10. Start
    ```
    http://localhost
    ```

    ![alt text](assets/Screenshot%20from%202022-12-14%2021-37-04.png)

## Issus ##
there is no existing directory at "/var/www/html/storage/logs" and it could not be created: permission denied
Fix
```
docker exec -it app sh
php artisan config:clear
php artisan cache:clear

```
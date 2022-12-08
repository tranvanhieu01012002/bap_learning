# Image for PHP only #

## Step ##

1. Create folder for source
    ```
    mkdir src
    ```
2. Create a Dockerfile
   ```
   touch Dockerfile
   ```
   Insert content
   ```
    FROM php:8.1-fpm

    COPY /src /var/www/html
    EXPOSE 3000

    CMD ["php","-S","0.0.0.0:3000"]
   ```
3. Build image
   ```
    docker build -t php_bap:1.0 .
   ```
4. Start container 
   ```
   docker run -p 3000:3000 php_bap:1.0
   ```

## Result ##
1. check with curl
   ```
   curl localhost:3000
    ```
    result
    ```
    aaaa
    ```

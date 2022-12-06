# Install composer #

1. Step 
   
   i. Update system
   ```
    sudo apt update
   ```
    ii. Install required packages
    ```
    sudo apt install php-cli unzip
    ```
    iii. Download PHP Composer setup file

    ```
    curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
    ```

    ```
    HASH=`curl -sS https://composer.github.io/installer.sig`
    ```

    Validate

    ```
    php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    ```
    iv. Install PHP composer

    ```
    sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
    ```
    v. Test Composer
    ```
    composer
    ```
    Result:
    ![alt text](assets/Screenshot%20from%202022-12-06%2016-14-28.png)
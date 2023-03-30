# Set up environment for PHP #

## Mindset ##

* Cài web server: thì nên chọn NGINX, mạnh với dễ cài đặt
* Cài PHP để chạy trên web server
* Cài database thì dùng mysql
  
## Step ##

### Install NGINX

1. install via snap
```
sudo apt update
sudo apt install nginx
```
<p>Note: Update before install everything</p>

2. Check firewall

```
sudo ufw app list
```
Output
```
Available applications:
  CUPS
  Nginx Full
  Nginx HTTP
  Nginx HTTPS
```
Add NGINX to firewall

```
sudo ufw allow 'Nginx HTTP'
```

Enable firewall

```
sudo ufw enable
```
Output
```
Status: active

To                         Action      From
--                         ------      ----
Nginx HTTP                 ALLOW       Anywhere                  
Nginx HTTP (v6)            ALLOW       Anywhere (v6)
```
Check NGINX in command line

```
systemctl status nginx
```
It's ok if 
![alt text](assets/Screenshot%20from%202022-12-06%2010-17-10.png)

Check in google chrome

![alt text](assets/Screenshot%20from%202022-12-06%2010-19-51.png)

<p>Management Nginx</p>
<a href="https://www.digitalocean.com/community/tutorials/how-to-install-nginx-on-ubuntu-20-04">Link</a>

### Install MySQl ###

1. Install via apt

```
sudo apt install mysql-server
```

2. Setup security

```
sudo mysql_secure_installation
```
After that enter password

3. Access database by command line

```
sudo mysql
```
or
```
mysql -u root -p
```

pass: tranvanHIEU@2002


### Install PHP ###

1. Install via apt
```
sudo apt install php8.1-fpm php-mysql
```
2 Check PHP version
```
php --version
```


### Configuring Nginx to Use the PHP Processor
 ###

1. Create fake domain 

```
sudo mkdir /var/www/your_domain
```
2. Change own to edit file without sudo

```
sudo chown -R $USER:$USER /var/www/your_domain
```

3. Edit file for available domain

```
sudo vim /etc/nginx/sites-available/your_domain
```

Copy this to file 
```
server {
    listen 80;
    server_name g-learning.vn www.g-learning.vni;
    root /var/www/g-learning.vn/public;
     proxy_busy_buffers_size   512k;
 	proxy_buffers   4 512k;
 	proxy_buffer_size   256k;
   
    index index.php  index.html index.htm ;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
     }

    location ~ /\.ht {
        deny all;
    }

    

}


```

4. Link config to NGINX
   
<p>Note: Activate your configuration by linking to the configuration file from Nginx’s sites-enabled directory:</p>

```
sudo ln -s /etc/nginx/sites-available/your_domain /etc/nginx/sites-enabled/
```

Unlink default

```
sudo unlink /etc/nginx/sites-enabled/default
```

5. Test configuration

```
sudo nginx -t
```
Result

![alt text](assets/Screenshot%20from%202022-12-06%2011-04-30.png)

6. Reload server

```
sudo systemctl reload nginx
```

<p>Note: add domain to host in /etc</p>

```
sudo vim /etc/hosts
```
Add your domain here

```
127.0.0.1       bap-dev.com
::1		        bap-dev.com

```

### Run PHP script ###

1. Create info file
   
```
vim /var/www/your_domain/info.php
```

Result
![alt text](assets/Screenshot%20from%202022-12-06%2011-51-43.png)

2. Create a user to access database
   
   i. Login by root
   ```
    mysql -u root -p
   ```
   ii. Create a user

   ```
    CREATE USER 'hieu'@'%' IDENTIFIED WITH mysql_native_password BY 'tranvanHIEU2002@';
   ```
   iii. Check user exist;

    ```
    USE mysql;
    SELECT user FROM user;

    ```
    Output

    ```
    +------------------+
    | user             |
    +------------------+
    | hieu             |
    | debian-sys-maint |
    | mysql.infoschema |
    | mysql.session    |
    | mysql.sys        |
    | root             |
    +------------------+

    ```
    iv. Create a table

    Ex: students;

    ```
    CREATE TABLE students (id INT AUTO_INCREMENT,name VARCHAR(500), age INT, PRIMARY KEY(id));
    ```

    Insert some rows

    ```
    INSERT INTO students (name,age) VALUES ("TRAN ZUAN NY",18);
    
    INSERT INTO students (name,age) VALUES ("TRAN ZUAN NY",18);
    ```
3. Query data from php
   
   i.touch a php file in var/www/your_domain

   ```
   touch student.php
   ```
   Open code editor and add this code

   ```
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>

    <?php
    $user = "hieu";
    $password = "tranvanHIEU2002@";
    $database = "php_database";
    $table = "students";

    try {
        $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
        echo "<h2>List of students</h2><ol>";
        echo "<table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Age</td>
        </tr>";
        foreach ($db->query("SELECT * FROM $table") as $row) {
            echo    "<tr>
                        <td>" . $row['id'] . " </td>
                        <td>" . $row['name'] . " </td>
                        <td>" . $row['age'] . " </td>
                    </tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    ```
    It's work!!
    
    ![alt text](assets/Screenshot%20from%202022-12-06%2013-39-30.png)


### Reference
[link](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-22-04)

[link](https://www.digitalocean.com/community/tutorials/how-to-install-nginx-on-ubuntu-20-04)

[link](https://viblo.asia/p/cai-dat-va-cau-hinh-subdomain-tren-nginx-centos-7-vyDZOxjklwj)

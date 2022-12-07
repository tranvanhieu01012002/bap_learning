# Install xDebug in VS code in Ubuntu#

## Step  #

1. Check your php and add code in php file

    i. Show all php information with

    ```
    phpinfo()
    ```
    ii. Copy all data and paste in


    [xdebug](https://xdebug.org/wizard)

    iii. Get instructor in that web site

    iv. More step

    Open xdebug file

    ```
    sudo vim /etc/php/8.1/cli/conf.d/99-xdebug.ini
    ```

    Add this code

    ```
    zend_extension = xdebug
    xdebug.mode=develop,debug
    xdebug.start_with_request=yes
    ```
2. Install extension for VS Code

   ![alt text](assets/Screenshot%20from%202022-12-07%2009-40-21.png)

3. Test 
   
   i. Step

   Add red point on the line


   Open test and debug in left bar

   Click laugh at this file to start

   Press F10 to next step

   ![alt text](assets/Screenshot%20from%202022-12-07%2009-44-43.png)

    You can view 

    * Local Variable
    * Global Variable
    * Debug console







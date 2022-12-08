<!DOCTYPE html>
<html lang="en">
<?php
include "./assignment2b.php";

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./validEmail.php" method="post">
        Input email need to validated<input type="text" name="email"><br>
        <input type="submit">
    </form>
    <?php
    if (isset($_POST['email'])) {
        if (validEmail($_POST['email']) == 1) {
          echo "correct email";
        }
        else{
            echo "Wrong email";
        };
      
    }
    else{
      
    }
    
    ?>
</body>

</html>
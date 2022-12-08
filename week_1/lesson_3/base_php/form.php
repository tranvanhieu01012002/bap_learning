<!DOCTYPE html>
<html lang="en">
<?php
include "./assignment2.php";

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="form.php" method="post">
        Input day<input type="text" name="day"><br>
        <input type="submit">
    </form>
    <?php
    if (isset($_POST['day'])) {
        echo printDay($_POST['day']);
    }
    ?>
</body>

</html>
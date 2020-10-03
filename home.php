<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user-email'])) {
        header("location: index.html");
        exit();
    } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div><?php echo $_SESSION['user-email'] ?></div>
    <a href="logout.php">logout</a>
</body>
</html>
<?php
    ob_end_flush(); ?>
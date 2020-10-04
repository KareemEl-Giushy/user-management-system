<?php
    include 'core/functions/auth.php';

    ob_start();
    $user = new auth();
    $user->startsession();
    $user->redirect();
    $userinfo = $user->userinfo($_SESSION['user-email']);

    // Testing :
    echo '<pre>';
    var_dump($userinfo);
    echo '</pre>';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div><?php echo $userinfo['email']; ?></div>
    <a href="logout.php">logout</a>
</body>
</html>
<?php ob_end_flush(); ?>
<?php
    include 'core/functions/auth.php';
    include 'core/templates/page.inc.php';
    ob_start();
    $user = new auth();
    $user->startsession();
    $user->redirect();
    $userinfo = $user->userinfo($_SESSION['user-email']);

    // Testing :
    // echo '<pre>';
    // var_dump($userinfo);
    // echo '</pre>';
    
    $page = new page();
    $page->header();
    $page->navbar($userinfo['first_name']);
 ?>

<div class="container">
    
</div>

<?php 
    $page->footer();
    ob_end_flush();
?>
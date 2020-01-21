<?php 
require_once 'index.php';

    if (isset($_SESSION['user_login'])) {
        echo $_SESSION['user_login'];
        echo '<br>'.$_COOKIE['page_visit'];
        echo '<br><a href = "logout.php" rel="nofollow"> Logout </a>';
    } else {
        //echo $_SESSION['user_login'];
        die("Doesn't exist!");
    }
    //echo 'Hello!'.$login;
    //echo '<script type="text/javascript"> alert(document.cookie) </script>';
    //require_once 'index.php';
    //$login = trim($_POST['login']);
    //echo 'Hello, ' .$login. ' !';
?>
<?php
    session_start();
    $_SESSION['counter']=0;
    $_SESSION['logz']=0;
    $_SESSION['iduser']=0;
    setcookie("ids", 0);
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php');
?>
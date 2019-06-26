<head>
  <title>GAME STORE</title>

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css"> 
</head>

<body>

<div class="header">

<h2>Game Store </h2>

  
</div>

<div id="navbar" class="">
<?php
session_start();
    if(($_SESSION['counter']==1)){
        echo '
            <a class="active" href="/index.php">Главная</a>
            <a href="javascript:void(0)" class="btnbag">Корзина</a>
            <a href="/orders.php" >Мои заказы</a>
            <a href="/account.php" >Аккаунт</a>
            <a href="unlogin.php">Выход</a>
        ';
    } 
    
    if(($_SESSION['counter']==2)){
        echo '
            <a class="active" href="/index.php">Главная</a>
            <a href="/ordersadm.php">Заявки</a>
            <a href="/account.php" >Аккаунт</a>
            <a href="/control.php">Статистика</a>
            <a href="unlogin.php">Выход</a>
        ';
        }

    if(($_SESSION['counter']==0)){
        echo '
            <a class="active" href="/index.php">Главная</a>
                    <a href="/register.php">Регистрация</a>
                    <a href="javascript:void(0)" class="btnlogin">Войти</a>
        ';
        }
    


  

?>
</div>
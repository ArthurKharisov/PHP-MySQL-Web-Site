<?php 
if (isset($_POST['login']) && isset($_POST['pass'])){

      include 'template/connection.php';
     
      $e_login= $_POST['login'];
      $e_password= $_POST['pass'];
      $query=mysql_query("SELECT * FROM buyers WHERE login='$e_login'");
      $user_data = mysql_fetch_array($query);
      
      if (($user_data['password']==$e_password) and ($e_login!="") and ($e_password!="")){
          session_set_cookie_params(10800);
          session_start();
          $_SESSION['counter']=1;
          $_SESSION['iduser']=$user_data['buyer_id'];
          $_SESSION['logz']=$e_login;
      header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php');
      }
      else {
                $query=mysql_query("SELECT * FROM shop_staff WHERE login='$e_login'");
                $user_data = mysql_fetch_array($query);
                
                if (($user_data['password']==$e_password) and ($e_login!="") and ($e_password!="")){
                    session_set_cookie_params(10800);
                    session_start();
                    $_SESSION['counter']=2;
                    $_SESSION['logz']=$e_login;
                    $_SESSION['iduser']=$user_data['employee_id'];
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/index.php');
                }
                else {
                    include("template/header.php");
                    echo "<div class='forma'><br><br><h2>Неверный Логин или пароль</h2><br><br></div>";
                    include("template/footer.php");
                }

      }
      mysql_close();
      }
      ?>
<html>
<?php include("template/header.php"); ?>
    <div class="forma"><h2>Информация об аккаунте</h2>
    <?php
        include 'template/connection.php';
        session_start();
        $e_login = $_SESSION['logz'];
        if ($_SESSION['counter']==1){
        $result = mysql_query("SELECT * FROM buyers WHERE login='$e_login'");
        $user_data = mysql_fetch_array($result);
        
                echo "</br><b>Фамилия:</b> ".$user_data['last_name']."</br>";
                echo "<b>Имя: </b>".$user_data['first_name']."</br>";
                echo "<b>Отчество: </b>".$user_data['third_name']."</br>";
                echo "</br>";
                echo "<b>Логин: </b>".$user_data['login']."</br>";
                echo "<b>Пароль: </b>".$user_data['password']."</br>";
                echo "</br>";
                echo "<b>Почта: </b>".$user_data['email']."</br>";
                echo "<b>Телефон: </b>".$user_data['phone']."</br>";
                echo "</br>";
                echo "<b>Счет: </b>".$user_data['bill']."</br>";
                echo "<b>Адрес: </b>".$user_data['address']."</br></br></br>";

        } else {
                if ($_SESSION['counter']==2){
                    $result = mysql_query("SELECT * FROM shop_staff WHERE login='$e_login'");
                    $user_data = mysql_fetch_array($result);
                        
                        echo "</br><b>Фамилия:</b> ".$user_data['last_name']."</br>";
                        echo "<b>Имя: </b>".$user_data['first_name']."</br>";
                        echo "<b>Отчество: </b>".$user_data['third_name']."</br>";
                        echo "</br>";
                        echo "<b>Логин: </b>".$user_data['login']."</br>";
                        echo "<b>Пароль: </b>".$user_data['password']."</br>";
                        echo "</br>";
                        echo "<b>Почта: </b>".$user_data['email']."</br>";
                        echo "<b>Телефон: </b>".$user_data['phone']."</br>";
                        echo "</br>";
                        echo "<b>Должность: </b>".$user_data['post']."</br>";
                        echo "<b>Зарплата: </b>".$user_data['salary']."</br>";
                        echo "<b>Процентная ставка: </b>".$user_data['wage_rate']."%</br>";
                        echo "</br>";
                        echo "<b>Счет: </b>".$user_data['bill']."</br>";
                        echo "<b>Адрес: </b>".$user_data['address']."</br></br></br>";

                } else {

                    echo "<br><br><h2>Ошибка доступа!</h2><br><br>";
                }
            }    
        mysql_close();
    ?>
    </div>
 <?php include("template/footer.php"); ?>
</html>
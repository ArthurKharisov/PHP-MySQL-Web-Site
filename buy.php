<html>
<?php include("template/header.php"); ?>
    <div class="forma">
    <?php
        include 'template/connection.php';
        session_start();
        $idGames = $_COOKIE['ids'];
        $_COOKIE['ids'] = 0;
        $userLogin = $_SESSION['logz'];
        $my_games = array();
        $result = mysql_query("SELECT * FROM buyers WHERE login='$userLogin'");
        $user_data = mysql_fetch_array($result);

        $buyerid = $user_data['buyer_id'];
        $i = 0;
        echo $idGames;
        while ($indexS!=100){

            $idGames = substr($idGames, 1, strlen($idGames));  
            $indexS = strpos($idGames, "-");
            if ($indexS==false) $indexS=100;
            $my_games[$i] = intval(substr($idGames, 0, $indexS)); 
            $idGames = substr($idGames, $indexS, strlen($idGames)); 
            $i++;
        }

        $overprice = 0;

        for ($k = 0; $k < sizeof($my_games); $k++) {
            $result = mysql_query("SELECT * FROM goods WHERE goods_id='$my_games[$k]'");
            $user_data = mysql_fetch_array($result);
            $overprice += $user_data['percent_price'];
        }

        $result=mysql_query("INSERT INTO accounts (buyer_id,date_of_sending,price_of_shipping) VALUES ('$buyerid',now(),'$overprice')");

        $result = mysql_query("SELECT * FROM accounts WHERE buyer_id='$buyerid' AND price_of_shipping='$overprice'");  
        $user_data = mysql_fetch_array($result);
        
        $accid = $user_data['account_id']; 
        $bufcount = 1;

        for ($k = 0; $k < sizeof($my_games); $k++) {
            $result=mysql_query("INSERT INTO reteil (account_id,doods_id,reteil_count) VALUES ('$accid','$my_games[$k]','$bufcount')");
        }

        mysql_close();

        if ($result == true){
            echo "<br><br><h2>Заказ создан!</h2><br><br>";
        }else{
            echo "Ошибка!";
        }


    ?>
    </div>
 <?php include("template/footer.php"); ?>
</html>
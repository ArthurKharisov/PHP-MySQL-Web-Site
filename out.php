<html>
    <?php 
        include("template/header.php");
        session_start();
        include 'template/connection.php';
            
            if($_POST['zap1']) {
                echo '<div class="forma"><h2>Самый дорогой заказ</h2>';
                $result = mysql_query("SELECT buyer_id, price_of_shipping FROM accounts WHERE price_of_shipping=(SELECT MAX(price_of_shipping) FROM accounts)");
                $order=mysql_fetch_array($result);
                echo 'ID: '.$order['buyer_id'].'. Сумма покупки: '.$order['price_of_shipping'];
                echo '</div>';
            }
            if($_POST['zap2']) {
                $login=$_POST['tskO'];
                echo '<div class="forma"><h2>Список покупок пользователя '.$login.'</h2>';
                $result = mysql_query("SELECT account_id, price_of_shipping FROM `accounts` WHERE buyer_id=(SELECT buyer_id FROM `buyers` WHERE login='$login')");
                while ($ids=mysql_fetch_array($result)){
                    echo '<b>ID заказа: </b>'.$ids["account_id"].'</br>';
                    echo '<b>Цена заказа: </b>'.$ids["price_of_shipping"].'</br>';
                    echo '<b>Игры: </b>'.$ids["price_of_shipping"].'</br>';
                    $accid = $ids["account_id"];
                    $result2 = mysql_query("SELECT name FROM `goods` WHERE goods_id IN (SELECT doods_id FROM `reteil` WHERE account_id='$accid')");
                    while ($games=mysql_fetch_array($result2)){
                        echo $games["name"].'</br>';    
                    }
                    echo '</br>';
                }
                echo '</div>';
            }
            if($_POST['zap3']) {
                echo '<div class="forma"><h2>Средняя цена заказа </h2>';
                $result = mysql_query("SELECT AVG(price_of_shipping) AS PriceAvg FROM accounts");
                $order=mysql_fetch_array($result);
                echo $order['PriceAvg'].' rub';   
                echo '</div>';
            }
            if($_POST['zap4']) {
                
                $sel=$_POST['tskO1'];
                if($sel=="возрастанию") {
                    echo '<div class="forma"><h2>Список игр с сортировкой по возрастанию цены: </h2>';
                    $result = mysql_query("SELECT name, percent_price FROM goods ORDER BY percent_price ASC");
                    while ($games=mysql_fetch_array($result)){
                        
                        echo $games['name'].' '.$games['percent_price'].' rub</br>';
                    }     
                }
                if($sel=="убыванию") {
                    echo '<div class="forma"><h2>Список игр с сортировкой по убыванию цены: </h2>';
                    $result = mysql_query("SELECT name, percent_price FROM goods ORDER BY percent_price DESC");
                    while ($games=mysql_fetch_array($result)){
                        
                        echo $games['name'].' '.$games['percent_price'].' rub</br>';
                    }     
                }
                echo '</div>';

            }
            if($_POST['zap5']) {
                $vendorcity=$_POST['tskO2'];
                echo '<div class="forma"><h2>Список поставщиков из '.$vendorcity.': </h2>';
                $result = mysql_query("SELECT * FROM vendor WHERE address='$vendorcity'");
                while ($vendor=mysql_fetch_array($result)){
                    echo '<b>Организация: </b>'.$vendor['vendor_name'].'</br>
                        <b>Телефон: </b>'.$vendor['phone'].'</br>
                        <b>Почта: </b>'.$vendor['email'].'</br>
                        <b>Счет: </b>'.$vendor['bill'].'</br></br>
                    ';   
                }
                echo '</div>';
            }
            
        include("template/footer.php"); 
        mysql_close();
    ?>    
</html>
<html>
    <?php 
        include("template/header.php");
        session_start();

        if ($_SESSION['counter']==2){
            include 'template/connection.php';
            echo '<div class="forma"><h2>Статистика</h2>';
            
            echo '
                <center>
                <form action="out.php" method="post">
                <table class="brd">
                <tr>
                    <th>Запрос</th>
                    <th>Подтверждение</th>
                </tr>
                <tr>
                    <td><center>Самый дорогой заказ</center>
                    <td><center><input name="zap1" type="submit" value="Запрос"></center></td>
                </tr>
                <tr>
                    <center><td>Список покупок пользователя <select name="tskO"></center>';

                    $result = mysql_query("SELECT login FROM `buyers`");
                    while ($datas=mysql_fetch_array($result)){
                        echo '<option>'.$datas["login"].'</option>';
                    }
                    echo '
                    </select></td>
                    <td><center><input name="zap2" type="submit" value="Запрос"></center></td>
                </tr>
                <tr>
                    <td><center>Средняя цена заказа</center>
                    <td><center><input name="zap3" type="submit" value="Запрос"></center></td>
                </tr>
                <tr>
                    <center><td>Список игр по <select name="tskO1">
                    <option>возрастанию</option>
                    <option>убыванию</option>
                    </select> цены</center></td>
                    <td><center><input name="zap4" type="submit" value="Запрос"></center></td>
                </tr>
                <tr>
                    <center><td>Поставщики игр из <select name="tskO2">';

                    $result = mysql_query("SELECT DISTINCT address FROM `vendor`");
                    while ($datas=mysql_fetch_array($result)){
                        echo '<option>'.$datas["address"].'</option>';
                    }
                    echo '
                   
                    </select></center></td>
                    <td><center><a href="/out.php?id=5"><input name="zap5" type="submit" value="Запрос"></a></center></td>
                </tr>
                </table></center>
                </form></br>
            ';
           /* echo '<h2>Самый дорогой заказ:</h2></br>';

            $result = mysql_query("SELECT buyer_id, price_of_shipping FROM accounts WHERE price_of_shipping=(SELECT MAX(price_of_shipping) FROM accounts)");
            $order=mysql_fetch_array($result);
            echo 'ID: '.$order['buyer_id'].'. Сумма покупки: '.$order['price_of_shipping'];
            
            echo '<h2>Список пользователей из <select>
                    <option>Пункт 1</option>
                    <option>Пункт 2</option>
                    </select>  <h3><a href="/accept.php"><input name="ozz" type="submit" value="Запрос"></a></h3></h2>
                    
                    ';
            //echo '<a href="/accept.php"><input name="ozz" type="submit" value="Отправить"></a>';
            $result = mysql_query("SELECT * FROM buyers WHERE address LIKE '%Уфа%'");
            while ($users=mysql_fetch_array($result)){
            echo $users['last_name'].' '.$users['first_name'].' '.$users['third_name'].'</br>';
            }

            echo '<h2>Средняя цена заказа:</h2></br>';
            echo '<h3><a href="/accept.php"><input name="ozz" type="submit" value="Запрос"></a></h3>'; 
            $result = mysql_query("SELECT AVG(price_of_shipping) AS PriceAvg FROM accounts");
            $order=mysql_fetch_array($result);
            echo $order['PriceAvg'].' rub';   

            echo '<h2>Список игр с сортировкой по возрастанию цены:</h2></br>';
            
            $result = mysql_query("SELECT name, percent_price FROM goods ORDER BY percent_price ASC");
            while ($games=mysql_fetch_array($result)){
                
                echo $games['name'].' '.$games['percent_price'].' rub</br>';
            } 

             echo '<h2>Отправленные заказы в марте:</h2></br>';
            
            $result = mysql_query("SELECT reteil_id FROM reteil WHERE date_reteil BETWEEN '2019-04-01' AND '2019-04-30'");
            while ($goods=mysql_fetch_array($result)){
                
                echo $goods['reteil_id'].';';
            }   

            */
                        
            echo '</br></div>';
            mysql_close();
        } else {
            echo '<div class="forma"><h2>Ошибка доступа!</h2></div>';
        }
        include("template/footer.php"); 
        
    ?>    
</html>
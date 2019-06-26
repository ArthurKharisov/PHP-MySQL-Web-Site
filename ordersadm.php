<html>
    <?php 
        include("template/header.php");
        session_start();
        if ($_SESSION['counter']==2){
            echo '<div class="forma"><h2>Заказы ожидающие отправки: </h2>';
            include 'template/connection.php';
            $userid = $_SESSION['iduser'];
            $result = mysql_query("SELECT * FROM accounts WHERE employee_id=0"); 
            echo '
                <center>
                <table class="brd">
                <tr>
                    <th>Номер покупки</th>
                    <th>ФИО</th>
                    <th>Адрес</th>
                    <th>Дата подачи заявки</th>
                    <th>Общая сумма заказа</th>
                    <th>Список игр</th>
                    <th>Действие</th>
                </tr>
            ';
            $my_games = array();
            while ($user_data=mysql_fetch_array($result)){
                 echo '<tr>';
                echo '<td>'.$user_data['account_id'].'</td>';

                $buyer = $user_data['buyer_id'];
                $resultlog = mysql_query("SELECT * FROM buyers WHERE buyer_id='$buyer'"); 
                $user_datas=mysql_fetch_array($resultlog);

                echo '<td>'.$user_datas['last_name'].' '.$user_datas['first_name'].' '.$user_datas['third_name'].'</td>';
                echo '<td>'.$user_datas['address'].'</td>';

                echo '<td>'.$user_data['date_of_sending'].'</td>';
                echo '<td>'.$user_data['price_of_shipping'].'</td>';
                 echo '<td>';
                 $accid = $user_data['account_id'];
                 $k=0;
                $resultgame = mysql_query("SELECT * FROM reteil WHERE account_id='$accid'");
                while ($user_games=mysql_fetch_array($resultgame)){
                    $my_games[$k] = $user_games['doods_id'];
                    
                    $resultgamename = mysql_query("SELECT * FROM goods WHERE goods_id='$my_games[$k]'");
                    $user_games_name=mysql_fetch_array($resultgamename);
                    echo $user_games_name['name']."</br>";
                    $k++;
                }
                echo '<td><a href="/accept.php?id='.$user_data['account_id'].'&name='.$userid.'"><input name="ozz" type="submit" value="Отправить"></a></td>';
               

                echo '</td>';
                echo '</tr>';   
            }  
            echo '</table></center></br>';
            echo '</div>';
            
        } else {
            echo '<div class="forma"><h2>Ошибка доступа!</h2></div>';
        }
        include("template/footer.php"); 
        mysql_close();
    ?>    
</html>
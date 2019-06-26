<html>
<?php include("template/header.php"); ?>
    <div class="forma"><h2>Мои покупки</h2>
    <?php
        echo "Ожидают подтверждения:";
        session_start();
        $my_games = array();
        include 'template/connection.php';
        $userid = $_SESSION['iduser'];
        $result = mysql_query("SELECT * FROM accounts WHERE buyer_id='$userid'");
        echo '
                <center>
                <table class="brd">
                <tr>
                    <th>Номер покупки</th>
                    <th>Дата подачи заявки</th>
                    <th>Общая сумма заказа</th>
                    <th>Список игр</th>
                </tr>
            ';
        while ($user_data=mysql_fetch_array($result)){
        if($user_data['employee_id']==0){
                            echo '<tr>';
                echo '<td>'.$user_data['account_id'].'</td>';
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
                echo '</td>';
                echo '</tr>';
            
        } 
        }
        echo '</table></center></br>';

        echo "Отправленные:";
        $result = mysql_query("SELECT * FROM accounts WHERE buyer_id='$userid'");
        echo '
                <center>
                <table class="brd">
                <tr>
                    <th>Номер покупки</th>
                    <th>Сотрудник</th>
                    <th>Дата отправки</th>
                    <th>Общая сумма заказа</th>
                    <th>Список игр</th>
                    
                </tr>
            ';
        while ($user_data=mysql_fetch_array($result)){
        if($user_data['employee_id']!=0){
                            echo '<tr>';
                echo '<td>'.$user_data['account_id'].'</td>';

                $employeeid = $user_data['employee_id'];
                $employee = mysql_query("SELECT * FROM shop_staff WHERE employee_id='$employeeid'");
                $emp=mysql_fetch_array($employee);

                echo '<td>'.$emp['last_name'].' '.$emp['first_name'].' '.$emp['third_name'].'</td>';

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
                echo '</td>';
                echo '</tr>';
            
        } 
        }
        echo '</table></center></br>';
        mysql_close();
    ?>
    </div>
 <?php include("template/footer.php"); ?>
</html>
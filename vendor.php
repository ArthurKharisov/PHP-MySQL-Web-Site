<?php
    include "template/header.php";
    include 'template/connection.php';
	$result = mysql_query("SELECT * FROM vendor");
    echo '<div class="forma"><h2>Список поставщиков</h2>';
    echo '
                <center>
                <table class="brd">
                <tr>
                    <th>Поставщик</th>
                    <th>Адрес</th>
                    <th>Телефон</th>
                    <th>Почта</th>
                    <th>Счет</th>
                </tr>
            ';
    while ($user_data=mysql_fetch_array($result)){
        echo '<tr>';
            echo '<td>'.$user_data['vendor_name'].'</td>';
            echo '<td>'.$user_data['address'].'</td>';
            echo '<td>'.$user_data['phone'].'</td>';
            echo '<td>'.$user_data['email'].'</td>';
            echo '<td>'.$user_data['bill'].'</td>';
        echo '</tr>';
    }

    echo '</table></center></br></div>';
    include "template/footer.php";
    mysql_close();
?>
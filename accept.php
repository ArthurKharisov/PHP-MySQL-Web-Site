<?php

if (isset($_GET['id']) && isset($_GET['name'])){
    
    $id = $_GET['id'];
    $name = $_GET['name'];

    echo $id.'    '.$name;
	
    include 'template/connection.php';
    
    $result=mysql_query("UPDATE accounts SET employee_id=$name WHERE account_id=$id");

    $result=mysql_query("UPDATE reteil SET date_reteil=now() WHERE account_id=$id");
    
    if ($result == true){
        header('Location: http://'.$_SERVER['HTTP_HOST'].'/ordersadm.php');
        mysql_close();
    }else{
    	echo "Ошибка!";
    }
    
}


?>
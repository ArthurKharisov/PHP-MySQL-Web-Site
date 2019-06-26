<?php
    $db_host = "sql209.epizy.com"; 
    $db_user = "epiz_23675524"; 
    $db_password = "#пароль"; 
    $db = mysql_connect($db_host,$db_user,$db_password,$db_base) OR DIE("Not connected!");
    mysql_select_db("epiz_23675524_epicbd",$db);
    mysql_set_charset('utf8',$db);
?>
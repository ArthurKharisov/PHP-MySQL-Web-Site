<?php

if (isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['patrname'])&& isset($_POST['loginname'])&& isset($_POST['password'])&& isset($_POST['email'])&& isset($_POST['address'])&& isset($_POST['bill'])&& isset($_POST['phone'])){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$patrname = $_POST['patrname'];
	$loginname = $_POST['loginname'];
	$password = $_POST['password'];
    $email = $_POST['email'];
	$address = $_POST['address']; 
    $bill = $_POST['bill']; 
    $phone = $_POST['phone']; 
	
    include 'template/connection.php';
    
    $result=mysql_query("INSERT INTO buyers (last_name,first_name,third_name,login,password,email,bill,address,phone) VALUES ('$lastname','$firstname','$patrname','$loginname','$password','$email','$bill','$address','$phone')");
    
    if ($result == true){
        include("template/header.php");
        echo "<br><br><h2>Вы успешно зарегистрировались!</h2><br><br>";
        include("template/footer.php");
        mysql_close();
    }else{
    	echo "Ошибка!";
    }
    
}


?>
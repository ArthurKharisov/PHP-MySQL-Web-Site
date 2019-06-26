<html>
<?php include("template/header.php"); ?>

<div class="content1">
 <ul class="cards">
 <?php
    $i = 1;
    session_start();
    include 'template/connection.php';
	$result = mysql_query("SELECT * FROM `goods`",$db);
	do{
        if($myrow['goods_id']!=""){
        echo "<li><br>";
		echo '<img class="imggame" src="img/'.$myrow['goods_id'].'.jpg"><b><center>';
		echo "".$myrow['name']."<br>";
		echo "Разработчик: ".$myrow['developer']."<br>";
		echo "Издатель: ".$myrow['publisher']."<br>";
		echo "Дата выпуска: ".$myrow['release_date']."<br>";
		echo "Цена: ".$myrow['percent_price']."<br>";
        if(($_SESSION['counter']==1)){
        echo '<button class="btn1" id="-'.$i++.'">Добавить в корзину</button>
				';
        }
        if(($_SESSION['counter']==2)){
            echo "Остаток дисков: ".$myrow['count_storehouse']."<br>";
        }
        echo "</center></b></li>";
        }
    }while ($myrow = mysql_fetch_array($result));
?>  
</ul>
</div>
 <?php include("template/footer.php"); ?>
</html>

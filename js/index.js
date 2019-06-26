var games = ['Grand Theft Auto', 'Minecraft', 'CS:GO', 'Portal 2', 'Subnautica', 'Factorio', 'Far Cry 5', 'PUBG', 'Rust', 'Bashkir'];
var elements = $('.modal-overlay, .modal');

function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

function DeleteS() {
  document.cookie = 'ids=0';
  document.location.reload(true);
}

$('.btn1').click(function(){
    elements.addClass('active');
    document.getElementById("modalka").innerHTML = "Добавлено в корзину!";
    if (getCookie('ids')!='0') {
    document.cookie = 'ids='+getCookie('ids')+this.id;
    } else {
        document.cookie = 'ids='+this.id;
    }
    

});

$('.btn12').click(function(){
    elements.addClass('active');
    document.getElementById("modalka").innerHTML = "<?php echo file_get_contents('vendor.php'); ?>";

});

$('.btnlogin').click(function(){
    elements.addClass('active');
    document.getElementById("modalka").innerHTML = '<br><form action="login.php" method="POST"><label for="fname">Логин</label><input type="text" id="fname" name="login" placeholder="Введите логин"><label for="lname">Пароль</label><input type="password" id="lname" name="pass" placeholder="Введите пароль"><input name="ozz" type="submit" value="Войти"></form>';
});

$('.btnbag').click(function(){
    elements.addClass('active');
    if(getCookie('ids')!='0'){
    document.getElementById("modalka").innerHTML = "<h2>Корзина:</h2>";
        var sizes = getCookie('ids');
        var cookGame = getCookie('ids');
        while (indexS!=100){
            cookGame = cookGame.substring(1,cookGame.length);
            var indexS = cookGame.indexOf("-");
            if (indexS==-1) indexS=100;
            var buf = parseInt(cookGame.substring(0,indexS), 10);
            buf--;
            for (j = 0; j < games.length; j++) {
                if (buf==j){
                    document.getElementById("modalka").innerHTML += "<br>"+games[j];    
                }
            }
            cookGame = cookGame.substring(indexS,cookGame.length);
            
        }
        document.getElementById("modalka").innerHTML += '</br><input name="ozz" type="submit" onclick="DeleteS()" value="Очистить корзину">';
        document.getElementById("modalka").innerHTML += '</br><a href="/buy.php"><input name="ozz" type="submit" value="Купить"></a>';
    } else {
        document.getElementById("modalka").innerHTML = "<h2>Ваша корзина пуста</h2>";    
    }
 });   

$('.close-modal').click(function(){
    elements.removeClass('active');
});
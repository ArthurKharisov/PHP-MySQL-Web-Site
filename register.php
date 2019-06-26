<html>
    <?php include("template/header.php"); ?>

    <div class="forma">
        <form action="input.php" method="POST">
            <label for="fname">Имя</label>
            <input type="text" id="fname" name="firstname" placeholder="Введите имя">
            <label for="lname">Фамилия</label>
            <input type="text" id="lname" name="lastname" placeholder="Введите фамилию">
            <label for="pname">Отчество</label>
            <input type="text" id="pname" name="patrname" placeholder="Введите отчество">
            <label for="login">Логин</label>
            <input type="text" id="login" name="loginname" placeholder="Введите логин">
            <label for="pass">Пароль</label>
            <input type="password" id="pass" name="password" placeholder="Введите пароль">
            <label for="pass">Почта</label>
            <input type="text" id="pass" name="email" placeholder="Введите почту">
            <label for="pass">Адрес</label>
            <input type="text" id="pass" name="address" placeholder="Введите адрес">
            <label for="pass">Счет</label>
            <input type="text" id="pass" name="bill" placeholder="Введите номер счета">
            <label for="pass">Телефон</label>
            <input type="text" id="pass" name="phone" placeholder="Введите номер телефона">
            <input name="ozz" type="submit" value="Регистрация">
        </form>
    </div>
    <?php include("template/footer.php"); ?>
</html>
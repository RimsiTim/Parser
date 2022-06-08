<?php
    session_start();
    if($_SESSION['users']){
        header("Location: index.php");
    }
    require("vendor/components/connect.php");
    $titlePage = "MusiEr - каталог музыкальных инструментов";
    require("vendor/components/head.php");
    require("vendor/components/header.php");
?>
    
    <section class="form_aut">
        <div class="form_aut_">
            <form action="/vendor/functions/signin.php" method="post">
                <h2 class="form_title">
                    Авторизация
                </h2>
                <span>Email</span>
                <input name="email" type="email">
                <span class="error"><?= $_SESSION['error']['emailIn']?></span>
                <span>Пароль</span>
                <input name="pass" type="password">
                <input name="signin" value="Авторизироваться" type="submit">
            </form>
            <form action="/vendor/functions/signup.php" method="post">
                <h2 class="form_title">
                    Регистрация
                </h2>
                <span>Email</span>
                <input name="email" type="email">
                <span class="error"><?= $_SESSION['error']['email']?></span>
                <span>Пароль</span>
                <input name="pass" type="password">
                <span>Повтор пароля</span>
                <input name="passTwo" type="password">
                <span class="error"><?= $_SESSION['error']['pass']?></span>
                <input name="signup" value="Зарегистрироваться" type="submit">
            </form>
        </div>
    </section>
<?php 
    require("vendor/components/footer.php");
    if(!$_SESSION['users']){
        session_unset();
    }
?>

</html>
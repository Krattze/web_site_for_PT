<!DOCTYPE html>

<html lang="ru" >
<head>
    <meta charset="utf-8" />
    <title>Кратц А.А.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
 <div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Вход</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <form action="login.php" method="post">
                <div class="row form_reg mb-3"><input type="text" class="form rounded" name="login" placeholder="Login"></div>
                <div class="row form_reg mb-3"><input type="password" class="form rounded" name="password" placeholder="Password"></div>
                <div class="form_reg text-center mb-3">
                    <button class="btn btn-primary btn_reg" type="submit" name="submit">Продолжить</button>
                </div>
            </form>
        </div>
    </div>
 </div>
</body>
</html>

<?php   
require_once("db.php");
if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}
$link = mysqli_connect('127.0.0.1', 'root', 'qwerty', 'PT_Site');
if (isset($_POST['submit'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];
    if ( !$username || !$password){
        die ('Пожалуйста введите все значения!');
    } 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";;
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
    setcookie("User", $username, time()+7200);
    header('Location: profile.php');
    } else {
    echo "не правильное имя или пароль";
    }
}

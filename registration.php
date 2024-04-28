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
            <h1>Регистрация</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <form action="registration.php" method="post">
                <div class="row form_reg mb-3"><input type="email" class="form rounded" name="email" placeholder="Email"></div>
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
    header("Location: login.php");
}
$link = mysqli_connect('127.0.0.1', 'root', 'qwerty', 'PT_Site');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];
    if (!$email || !$username || !$password){
        die ('Пожалуйста введите все значения!');
    } 
    $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
    if(!mysqli_query($link, $sql)) {
    echo "Не удалось добавить пользователя";
    }
}

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
    <div class="container nav_bar">
            <div class="row">
                <div class="col-3">
                    <div class="nav_logo"></div>
                </div>
                <div class="col-9">
                    <div class="nav_text">Информация обо мне!</div>
                </div>
            </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1> Добро пожаловать на мой сайт! </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2> Меня зовут, Кратц Артем Александрович. Я родился в Республике Коми, город Сыктывкар. На данный момент являюсь студентом СПБ ГУАП. Обучаюсь на специльности "Информационная безопасность автоматизированных систем" </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mem">
               <p>- Официант, яйца! </p>
             <p>- Вам сварить или пожарить?</p>
             <p>- Почесать </p>
              <p>(с) Джейсон Стетхем </p>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="row my_photo"></div>
                </div>
                <div class="row"><p class="title_photo">Кратц А.А.</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="my_btn">Нажми меня</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Привет, <?php echo $_COOKIE['User'];?></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="profile.php" method="post" enctype="multipart/form-data" name="upload">
                <div class="row form_reg mb-3"><input type="text" class="form rounded" name="title" placeholder="Заголовок поста"></div>
                <div class="row form_reg mb-3"><textarea cols="30" rows="10" class="form rounded" name="text" placeholder="Введите текст поста"></textarea></div>
                <div class="row form_reg mb-3"><input type="file" class="form rounded" name="file"></br></div>
                <div class="form_reg text-center mb-3">
                    <button class="btn btn-primary btn_reg" type="submit" name="submit">Сохранить пост</button>
                </div>
            </form>
        </div>
    </div>
 </div>
    <script type="text/javascript" src="js/button.js"></script>
</body>
</html>
<?php   
require_once("db.php");
$link = mysqli_connect('db', 'root', 'kali', 'PT_Site');
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];
    if (!$title || !$main_text){
        die ('Пожалуйста введите все значения!');
    } 
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
    if(!mysqli_query($link, $sql)) {
    echo "Не удалось добавить пост";
    }
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}

?>
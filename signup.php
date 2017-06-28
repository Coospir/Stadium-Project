<?php
    session_start();
    require_once 'db.php';
    require_once "mail/PHPMailerAutoload.php";

    if(isset($_POST['Register'])){
        $login = !empty($_POST['login']) ? trim($_POST['login']) : null;
        $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
        $phone = !empty($_POST['phone']) ? trim($_POST['phone']) : null;
        $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
        $surname = !empty($_POST['surname']) ? trim($_POST['surname']) : null;
        $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
        $patronymic = !empty($_POST['patronymic']) ? trim($_POST['patronymic']) : null;   
        
        // Проверяем логин
        $user_exist = "SELECT * FROM users WHERE login = :login";
        $stmt = $pdo->prepare($user_exist);
        $stmt ->bindValue(':login', $login);
        $stmt -> execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
            $error = '<div class = "alert alert-danger">Ошибка: логин может состоять только из букв английского алфавита и цифр!</div>';
        }

        if(strlen($_POST['login']) <= 3 or strlen($_POST['login']) > 30) {
           $error = '<div class = "alert alert-danger">Ошибка: логин должен быть не менее 3-х символов и не больше 30 символов!</div>'; 
        }

        if($row){
            $error = '<div class = "alert alert-danger">Ошибка: пользователь с таким логином уже существует!</div>';
        }
        
        //Проверяем почту
        
        $email_exist = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($email_exist);
        $stmt ->bindValue(':email', $email);
        $stmt -> execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $error = '<div class = "alert alert-danger">Ошибка: пользователь с таким E-Mail уже существует!</div>';
        }
    
        if(!$error){
            $sql = "call UserRegister(:login, :surname, :name, :patronymic, :email, :phone, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt -> bindValue(':login', $login);
            $stmt -> bindValue(':surname', $surname);
            $stmt -> bindValue(':name', $name);
            $stmt -> bindValue(':patronymic', $patronymic);
            $stmt -> bindValue(':email', $email);
            $stmt -> bindValue(':phone', $phone);
            $stmt -> bindValue(':password', md5($pass));

            $result = $stmt->execute();

            if(($result) && (!$row))
            {
                $success = '<div class = "alert alert-success">Регистрация прошла успешно! <a href="authorize.php">Авторизируйтесь.</a></div>';

                $mail = new PHPMailer;

                $mail->addAddress($email);
                $mail->Subject = "Спасибо за регистрацию на ukit-stadium.ru!";
                $mail->Body = "<p>Ваши данные для регистрации: </p><br>
                                <b>Логин: </b> $login, <br>
                                <b>Пароль: </b> $pass, <br>
                                <hr>
                                <b>Фамилия: </b> $surname, <br>
                                <b>Имя: </b> $name, <br>
                                <b>Отчество: </b> $patronymic, <br>
                                <b>Контакнтый телефон: </b> $phone.";
                $mail->isHtml(true);

                if ($mail->send()) {
                    $success .= '<div class = "alert alert-success">На электронный '.$email.' адрес отправлена информация об аккаунте.</div>';
                } else {
                    $error .= '<div class = "alert alert-danger">Ошибка!</div>';
                }

            } 
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Стадион УКиТ</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Jura|Ubuntu+Mono" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/one-page-wonder.css" rel="stylesheet">

</head>

    <style>
        .navbar{
            background-color: darkorange;
        }
        
        #navbar-brand-text {
            color: white;
            font-family: 'Jura', sans-serif;
            font-size: 20px;
        }
        
        #bs-example-navbar-collapse-1 a{
            color: black;
            font-family: 'Jura', sans-serif;
            font-size: 18px;
        }
        
        #bs-example-navbar-collapse-1 a:active{
            color: white;
            font-family: 'Jura', sans-serif;
            font-size: 18px;
        }
        
        #bs-example-navbar-collapse-1 a:hover{
            color: white;
        }
        
        #text-on-top{
            color: black;
            font-family: 'Ubuntu Mono', monospace;
            opacity: 0.8;
        }
        
        .header-image {
             background-image:url('http://rev3tri.wpengine.netdna-cdn.com/wp-content/uploads/2015/10/slide1.jpg');
        }
        
        .featurette-heading {
             color: black;
             font-family: 'Ubuntu Mono', monospace; 
        }
        
        .lead {
            color: black;
            font-family: 'Ubuntu Mono', monospace; 
        }
        
        #Register {
            color: white;
            font-family: 'Jura', sans-serif; 
        }
        
        .panel-heading {
            color: darkorange;
            font-family: 'Jura', sans-serif;
            font-size: 18px;
        }
        
        #HaveAccount {
            color: darkorange;
            font-family: 'Jura', sans-serif;   
        }
        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus {
            color: darkorange;
            background-color: darkorange;
        }
    </style>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="navbar-brand-text" href="index.php">ukit-stadium.ru</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="navbar-nav">
                    <li>
                        <a href="index.php">Главная</a>
                    </li>
                    <li>
                        <a href="news.php">Новости</a>
                    </li>
                    <li>
                        <a href="actions.php">Мероприятия</a>
                    </li>
                    <li>
                        <a href="sections.php">Спортивные секции</a>
                    </li>
                     <li>
                        <a href="rent.php">Аренда</a>
                    </li>
                    <li>
                        <a href="about.php">Контакты</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="authorize.php"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <header class="header-image">
        <div class="headline">
            <div class="container" id="text-on-top">
                <h1>Стадион "УКиТ"</h1>
            </div>
        </div>
    </header>
    <!-- Page Content -->
    <div class="container">
        <br>
        <?php echo $error; 
              echo $success;
        ?>
        <div class="panel panel-warning">
          <div class="panel-heading"><b>Регистрация пользователя</b></div>
              <div class="panel-body">
                <form class="form-horizontal" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login" type="text" class="form-control" name="login" placeholder="Логин" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Пароль" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
                                <script src="js/maskedinput.js"></script>
                                <script type="text/javascript">
                                    jQuery(function($){
                                        $("#phone").mask("+7 (999) 999-99-99");
                                    });
                        </script>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input id="phone" type="phone" class="form-control" name="phone" placeholder="Мобильный телефон">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="E-Mail" required>
                    </div>
                    <hr>
                    <!-- Доп. поля -->
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-righ"></i></span>
                        <input id="surname" type="text" class="form-control" name="surname" placeholder="Фамилия" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-righ"></i></span>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Имя" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-triangle-righ"></i></span>
                        <input id="patronymic" type="text" class="form-control" name="patronymic" placeholder="Отчество">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-warning btn-md" id="Register" name="Register" value="Регистрация">
                    <a href="authorize.php" id="HaveAccount">Есть аккаунт?</a>
                </form>
              </div>
        </div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <p>Copyright &copy; Eugene Starodubov, Ruslan Mamedbekov, 2017</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

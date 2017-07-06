<?php

session_start();
  require 'db.php';
  if (!empty($_POST['LogIn'])) {
        $login = !empty($_POST['login']) ? trim($_POST['login']) : null;
        $pass = !empty($_POST['password']) ? md5(trim($_POST['password'])) : null;
        $sql = "SELECT id_user, user_type, login, surname, name, patronymic, email, phone, password FROM users WHERE login = :login";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':login', $login);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if($user == false) {
            $error = '<div class = "alert alert-danger">Ошибка: неверный логин!</div>';
        } else {
        if($user['user_type'] == 0){
                if(md5($pass) == md5($user['password'])) {

                        $_SESSION['logged_user'] = array(
                            "email" => $user['email'],
                            "phone" => $user['phone'],
                            "surname" => $user['surname'],
                            "name" => $user['name'],
                            "patronymic" => $user['patronymic'],
                            "user_id" => $user['id_user'],
                            "login" => $user['login'],
                            "type" => $user['user_type']
                        );

                        echo $_SESSION['logged_user']['id_user'];
                        header('Location: /index.php');
                        exit;
                    } else {
                        $error = '<div class = "alert alert-danger">Ошибка: неверный пароль!</div>';
                    } 

            } else {
                $error = '<div class = "alert alert-danger">Непредвиденная серверная ошибка: повторите попытку позже.</div>';
            }

            if($user['user_type'] == 1) {
                if(md5($pass) == md5($user['password'])) {

                        $_SESSION['logged_user'] = array(
                            "email" => $user['email'],
                            "phone" => $user['phone'],
                            "surname" => $user['surname'],
                            "name" => $user['name'],
                            "patronymic" => $user['patronymic'],
                            "user_id" => $user['id_user'],
                            "login" => $user['login'],
                            "type" => $user['user_type']
                        );

                        header('Location: admin/index.php');
                        exit;
                    } else {
                        $error = '<div class = "alert alert-danger">Ошибка: неверный пароль!</div>';
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
             background-attachment: fixed;
        }
        
        .featurette-heading {
             color: black;
             font-family: 'Ubuntu Mono', monospace; 
        }
        
        .lead {
            color: black;
            font-family: 'Ubuntu Mono', monospace; 
        }
        
        #NoAccount {
            color: darkorange;
            font-family: 'Jura', sans-serif;   
        }
        
        #LogIn {
            color: white;
            font-family: 'Jura', sans-serif; 
        }
        
        .panel-heading {
            color: darkorange;
            font-family: 'Jura', sans-serif;
            font-size: 18px;
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
          <div class="panel-heading"><b>Авторизация пользователя</b></div>
              <div class="panel-body">
                <form class="form-horizontal" method="post">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login" type="text" class="form-control" name="login" placeholder="Логин">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Пароль">
                </div>
                <br>
                <input type="submit" class="btn btn-warning btn-md" id="LogIn" name="LogIn" value="Войти в систему">
                <a href="signup.php" id="NoAccount">Не зарегистрированы?</a>
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

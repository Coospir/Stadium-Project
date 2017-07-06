<?php 
    session_start();
    require_once "../db.php";

    if (isset($_SESSION['logged_user']) && ($_SESSION['logged_user']['type'] == 1)) {

        if (!empty($_POST['addNewsButton'])) {

            $title = !empty($_POST['title']) ? trim($_POST['title']) : null;
            $text = !empty($_POST['text']) ? trim($_POST['text']) : null;
            $date = !empty($_POST['date_p']) ? trim($_POST['date_p']) : null;

            $add = $pdo->prepare("INSERT INTO `article` (`title`, `full_text`, `date`) VALUES (:title, :txt, :dt)");
            $add->bindValue(':title', $title);
            $add->bindValue(':txt', $text);
            $add->bindValue(':dt', $date);

            if ($add->execute()) {
                $success = '<div class = "alert alert-success">Новостной блок успешно создан! <a href="news.php">На страницу "Новости".</a></div>';
            } else {
                $error = '<div class = "alert alert-danger">Ошибка!</div>';    
            }
        }

    } else {
        redirect("../authorize.php");
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
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Jura|Ubuntu+Mono" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/one-page-wonder.css" rel="stylesheet">

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
        
        #BtnSections {
            color: white;
            font-family: 'Jura', sans-serif;
        }
        
        #BtnRent {
            color: white;
            font-family: 'Jura', sans-serif; 
        }
        
        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus {
            color: darkorange;
            background-color: darkorange;
        }
        .container>h3 {
            color: black;
            font-family: 'Ubuntu Mono', monospace;
        }
        .panel-heading {
            color: darkorange;
            font-family: 'Ubuntu Mono', monospace;
            font-size: 18px;
        }
        .panel-body {
            font-family: 'Ubuntu Mono', monospace; 
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
                        <a href="../index.php">Главная</a>
                    </li>
                    <li>
                        <a href="../news.php">Новости</a>
                    </li>
                    <li>
                        <a href="../actions.php">Мероприятия</a>
                    </li>
                    <li>
                        <a href="../sections.php">Спортивные секции</a>
                    </li>
                     <li>
                        <a href="../rent.php">Аренда</a>
                    </li>
                    <li>
                        <a href="../about.php">Контакты</a>
                    </li>
                </ul>
                <?php
                    if (isset($_SESSION['logged_user'])) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Выйти</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../personal_area.php"><span class="glyphicon glyphicon-user"></span> Приветствую, <?php echo $_SESSION['logged_user']['login'] ?></a></li>
                </ul>
                <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../authorize.php"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
                </ul>   
                <?php } ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Full Width Image Header -->
    <header class="header-image">
        <div class="headline">
            <div class="container" id="text-on-top">
                <h1>Стадион "УКиТ"</h1>
            </div>
        </div>
    </header>
    <!-- Page Content -->
    <div class="container">
       <h2 class="featurette-heading">Панель администратора
            <small><a href="logout.php">Выйти</a></small>
        </h2>
        <hr>
        <!-- Контент -->
        <section class="row">
            <div class="panel panel-warning">
              <div class="panel-heading">Новости</div>
                  <div class="panel-body">
                    <div class="col-md-12">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="">Заголовок новости</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Текст</label>
                                <textarea name="text" class="form-control" rows="15"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Дата публикации</label>
                                <input type="date" name="date_p" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addNewsButton" value="Добавить новостной блок" class="btn btn-warning">
                            </div>
                        </form>
                    </div>    
                  </div>
            </div>
        </section>
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

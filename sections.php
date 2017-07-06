<?php 
    session_start();    
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
        
        #BtnSections {
            color: white;
            font-family: 'Jura', sans-serif;
        }
        
        #BtnRent {
            color: white;
            font-family: 'Jura', sans-serif; 
        }
        
        .tab-content {
            color: black;
            font-family: 'Ubuntu Mono', monospace;
        }
        
        .nav-tabs {
            font-family: 'Ubuntu Mono', monospace;
        }
        
        .container>h3 {
            color: black;
            font-family: 'Ubuntu Mono', monospace;
        }
        
        a{
            color: darkorange;
        }
        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus {
            color: darkorange;
            background-color: darkorange;
        }  

        .panel-warning>.panel-heading {
            font-family: 'Ubuntu Mono', monospace;  
            font-size: 24px;
            color: black;
        }
        
        .panel-body>p {
            font-family: 'Ubuntu Mono', monospace;  
            font-size: 16px;
            height: 10%;
        }

        .panel-body>a {
            font-family: 'Jura', sans-serif;
            font-size: 16px;
            height: 10%;
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
                <?php
                    if (isset($_SESSION['logged_user'])) {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Выйти</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="personal_area.php"><span class="glyphicon glyphicon-user"></span> Приветствую, <?php echo $_SESSION['logged_user']['login'] ?></a></li>
                </ul>
                <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="authorize.php"><span class="glyphicon glyphicon-log-in"></span> Войти</a></li>
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
        <h2 class="featurette-heading">Записаться в спортивную секцию?<br>
            <span class="text-muted">Легко! 
                <br>Выберите секцию и запишитесь.</span>
        </h2>       
        <hr>
        <div class="row">
        <?php
            $db = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
            $db->exec("SET NAMES utf8");
            $sections = $db->query("SELECT * FROM Sections ORDER BY sport ASC")->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i < count($sections); $i++){
                echo "
                    <div class='col-md-4'>
                        <form role='form' class='form-horizontal' method='post' action='buy_ticket.php'>
                            <div class='panel panel-warning' id='card'>
                                    <div class='panel-heading'>
                                        ".$sections[$i]['sport']."
                                    </div>
                                    <div class='panel-body'>
                                        <p>".$sections[$i]['description']."</p>
                                        <br>
                                        <p><b>Преподаватель: </b>".$sections[$i]['trainer']."</p>
                                        <br>
                                        <p><b>Стоимость за занятие: </b>".$sections[$i]['cost_per_lesson']." руб.</p>
                                        <br>
                                        <p><b>Телефон для справок: </b>".$sections[$i]['phone']."</p>
                                        <br>
                                        <a href='go_section.php?id=".$sections[$i]['id_section']."'>Запись в секцию</a>
                                    </div>
                            </div>
                        </form>
                    </div>
                ";
            }
          ?>
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

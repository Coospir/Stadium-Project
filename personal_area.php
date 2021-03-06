<?php 
    session_start();  
    require_once "db.php";

    $data = $pdo->prepare("select * from ActionsPlacesUsers apu INNER JOIN actions a ON apu.action_id=a.id_action INNER JOIN Places p ON apu.place_id = p.id_place WHERE apu.id_user=:u"); 
    $data->bindValue(":u", $_SESSION['logged_user']['user_id']);
    if ($data->execute()) {
        $user_data = $data->fetchAll(PDO::FETCH_ASSOC); 
    }

    $db_sections = $pdo->prepare("select * from `SectionsUsers` su INNER JOiN `Users` u ON su.user_id=u.id_user INNER JOIN `Sections` s ON su.section_id=s.id_section WHERE u.id_user=:u_id");
    $db_sections->bindValue(":u_id", $_SESSION['logged_user']['user_id']);
    if ($db_sections->execute()) {
        $sections = $db_sections->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="panel panel-warning">
          <div class="panel-heading"><b>Личный кабинет пользователя</b></div>
              <div class="panel-body">
                    <i>Общая информация о пользователе</i>
                    <hr>
                    <p><b>Логин пользователя: </b><?php echo $_SESSION['logged_user']['login']; ?></p>
                    <p><b>Электронный адрес аккаунта: </b><?php echo $_SESSION['logged_user']['email']; ?></p>
                    <p><b>Мобильный телефон: </b> <?php echo $_SESSION['logged_user']['phone']; ?> </p>
                    <hr>
                    <p><i>Дополнительная информация о пользователе</i></p>
                    <p><b>Фамилия: </b> <?php echo $_SESSION['logged_user']['surname']; ?> 
                    <p><b>Имя: </b> <?php echo $_SESSION['logged_user']['name']; ?> 
                    <p><b>Отчество: </b> <?php echo $_SESSION['logged_user']['patronymic']; ?> 
                    <p><b>Спортивные секции: </b><?php

                        foreach ($sections as $section) {
                            echo $section['sport'].", ";
                        }


                    ?></p>
                    <p><b>Купленные билеты: </b>
                        <?php
                            echo "<table class='table table-striped'>";
                            echo "<tr>";
                            echo "<td>Мероприятие</td>";
                            echo "<td>Место</td>";
                            echo "<td>Дата</td>";
                            echo "</tr>";

                            foreach ($user_data as $user_date) {

                                echo "<tr>";
                                echo "<td>".$user_date['title']."</td>";
                                echo "<td>".$user_date['place_number']."</td>";
                                echo "<td>".date_format(new DateTime($user_date['date']),"d.m.Y")."</td>";
                                echo "</tr>";
                            }

                            echo "</table>"
                         ?>
                    </p>
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

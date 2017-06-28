<?php 
    session_start(); 
    require_once "db.php";   

     if (!empty($_POST['Save'])) {
        $places = $_POST['s_places'];
        $sn = $_POST['sn'];
        $fn = $_POST['fn'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $price = $_POST['r_price'];

        $add = $pdo->prepare("call NewRenting(:user_id, :m_surname, :m_name, :m_phone, :m_email, :m_cost)");

        $add->bindValue(":user_id", $_SESSION['user_id']);
        $add->bindValue(":m_surname", $sn);
        $add->bindValue(":m_name", $fn);
        $add->bindValue(":m_phone", $tel);
        $add->bindValue(":m_email", $email);
        $add->bindValue(":m_cost", $price);

        if ($add->execute()) {
            $success = '<div class = "alert alert-success">Операция аренды прошла успешно! <a href="index.php">На главную.</a></div>';
        } else {
            $error = '<div class = "alert alert-danger">Ошибка: проверьте данные!</div>';    
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
        
        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus {
            color: darkorange;
            background-color: darkorange;
        }

        #Scene {
            color: white;
            font-family: 'Jura', sans-serif;
            height: 50px;
            font-size: 18px;
        }

        #Pole {
            color: white;
            font-family: 'Jura', sans-serif;
            height: 40px;
            font-size: 18px;
            width: 60%;
        }

        .col-md-5 {
            font-family: 'Ubuntu Mono', monospace;
            font-size: 18px; 
        }

        #Tennis {
            color: white;
            font-family: 'Jura', sans-serif;
            height: 40px;
            font-size: 18px;
            width: 60%;
        }

        .col-md-11>h3 {
            font-family: 'Ubuntu Mono', monospace;
            font-size: 32px; 
        }

        .col-md-11>p,b {
            font-family: 'Ubuntu Mono', monospace;
            font-size: 16px; 
        }

        #Success {
            color: white;
            font-family: 'Ubuntu Mono', monospace; 
            font-size: 18px;
        }

        h3 {
            font-family: 'Ubuntu Mono', monospace;
            font-size: 21px; 
        }

        #myModalLabel {
            font-family: 'Jura', sans-serif;
            font-size: 32px; 
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
                    <li><a href="personal_area.php"><span class="glyphicon glyphicon-user"></span> Приветствую, <?php echo $_SESSION['logged_user'] ?></a></li>
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
    <div class="container-fluid">
        <div class="container">
            <br>
            <?php echo $success; ?>
            <?php echo $error; ?>
            <div class="row">
                <h2 class="featurette-heading">Аренда стадиона УКиТ.<br>
                </h2>
                <hr>
                <br>
                <div class="col-md-11">
                    <div class="col-md-4">
                        <img src="/img/1.jpg" class="img-thumbnail" alt="Стадион УКИТ" width="500" height="500">
                        <br>
                        <br>
                        <img src="/img/2.jpg" class="img-thumbnail" alt="Стадион УКИТ" width="500" height="500">
                        <br>
                        <br>
                    </div>
                    <h3>Описание</h3>
                    <p>Колледж УКиТ предлагает в аренду искуственное футбольное поле с электрическим подогревом для тренировок и проведения мероприятий в любую погоду и время года.
                    <br>В темное время суток обеспечивается современное освещение согласно общепринятых спортивных норм.
                    <br>Система автоматического электрического подогрева поддерживает постоянную положительную температуру на поверхности газона, при любой погоде газон свободен ото льда, снега и воды, 
                    что предохраняет как профессиональных игроков, так и начинающих футболистов от травматизма и доставляет радость от любимой игры.
                    <br>Игровое поле размером 60х40 метров имеет двое ворот для игры на всем поле, а также по двое ворот для игры на каждой из половин поля (40х30).
                    <br>После футбольного матча или тренировки спортсменов ждут сауна со шведским оборудованием, комната отдыха, удобные раздевалки и душевые. Уютная атмосфера и домашняя обстановка располагают к отличному отдыху.
                    <br>Для проведения мероприятий на стадионе присутствует рубка Ди-Джея, где стоит звуковая и световая аппаратура. </p>
                    <b>Стоимость: 1500 руб./час. </b>  <br> <br>
                    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal" id='Success' name='Success'>
                        Оставить заявку
                    </button>
                    <br>
                </div>
            </div>
            <!-- Кнопка, открывающее модальное окно -->
             
            <!-- Модальное окно -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                      <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Аренда стадиона УКиТ.</h4>
                  </div>
                  <div class="modal-body">
                    <p>Общие данные</p>
                    <form role='form' class='form-horizontal' method='post'>
                        <div class='input-group'>
                                    <span class='input-group-addon'><i class='glyphicon glyphicon'></i></span>
                                    <input id='Surname' type='text' class='form-control' name='sn' placeholder='Фамилия' required>
                                </div>
                                <br>
                                <div class='input-group'>
                                    <span class='input-group-addon'><i class='glyphicon glyphicon'></i></span>
                                    <input id='Name' type='text' class='form-control' name='fn' placeholder='Имя' required>
                                </div>
                                <br>
                                <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
                                    <script src='js/maskedinput.js'></script>
                                    <script type='text/javascript'>
                                        jQuery(function($){
                                            $('#phone').mask('+7 (999) 999-99-99');
                                        });
                                    </script>
                                <div class='input-group'>
                                    <span class='input-group-addon'><i class='glyphicon glyphicon'></i></span>
                                    <input id='phone' type='phone' class='form-control' name='tel' placeholder='Мобильный телефон'>
                                </div>
                                <br>
                                <div class='input-group'>
                                    <span class='input-group-addon'><i class='glyphicon glyphicon'></i></span>
                                    <input id='email' type='email' class='form-control' name='email' placeholder='E-Mail'>
                                </div>
                                <br>
                                <p>Количество часов</p>
                                <div class="input-group">
                                    <span class='input-group-addon'><i class='glyphicon glyphicon'></i></span>
                                    <input id='number' type="number" min="1" value="1" max="12" name="hours_for_rent"class="form-control">
                                </div>
                                <input type="hidden" value="" name="r_price">
                                <h3 id="price">Общая стоимость: <?= 1500 ?>руб.</h3>
                                <script type="text/javascript">

                                    $("[name='hours_for_rent']").change(function(){
                                        var hours = $(this).val();
                                        var price = <?= 1500 ?> * hours;
                                        $("#price").text("Общая стоимость: " + price + " руб.");
                                        $("[name='r_price']").attr("value", price);
                                    });

                                </script>
                                <hr>
                                <input type='submit' class='btn btn-warning btn-block' id='Save' name='Save' value='Подтвердить данные'>
                    </div>
                    </form>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>

                      </div>
                    </div>
                  </div>
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
        </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

    </html>

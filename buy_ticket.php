<?php 
    session_start();

    require_once "db.php";

    $id = (int)$_GET['id'];
    
    if ($id > 0) {
        $md = $pdo->prepare("select * from `actions` where `id_action`=:id");
        $user = $pdo->prepare("select id_user from `Users`");
        $places = $pdo->prepare("select * from `Places`");
        $md->bindValue(":id", $id);

        if ($md->execute()) {
            $data = $md->fetchAll(PDO::FETCH_ASSOC)[0];
        } else {
            echo __LINE__; // Вывод строчки кода
        }

        if($places->execute()) {
            $places_data = $places->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo __LINE__;
        }

        if (!empty($_POST['Success'])) {
            $places = $_POST['s_places'];
            $sn = $_POST['sn'];
            $fn = $_POST['fn'];
            $tel = $_POST['tel'];

            if (!empty($places)) {
            /*
                echo "Second name: ".$sn."<br>";
                echo "First name: ".$fn."<br>";
                echo "Tel: ".$tel."<br>";
            */   
                for ($i = 0; $i < count($places); $i++) {
                    $sql = "call RegistrationToAction(:id_action, :id_place, :m_surname, :m_name, :m_phone, :user_id)";
                    $stmt = $pdo->prepare($sql);
                    $stmt -> bindValue(':id_action', $id);    
                    $stmt -> bindValue(':id_place', $places[$i]);
                    $stmt -> bindValue(':m_surname', $sn);
                    $stmt -> bindValue(':m_name', $fn);
                    $stmt -> bindValue(':m_phone', $tel);
                    $stmt -> bindValue(':user_id', $_SESSION['logged_user']['user_id']);
                    $result = $stmt->execute();

                    /*
                    print_r($_SESSION['logged_user']);
                    print_r($stmt->errorInfo());
                    */
                    
                    if($result)
                    {
                        $success = '<div class = "alert alert-success">Операция бронирования прошла успешно! На мобильный телефон '.$tel.' отправлена информация о билете. <a href="index.php">На главную.</a></div>';
                    } else {
                        $error = '<div class = "alert alert-danger">Ошибка: Необходимо войти в систему для покупки билета!</div>';
                    }

                }

            } else {
                echo "<script>alert('Select places, please');</script>";
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
            background-color: #ff8c00;
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
        
        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus {
            color: darkorange;
            background-color: darkorange;
        }

        .container>h3 {
            color: black;
            font-family: 'Ubuntu Mono', monospace;
        }

        .panel-body {
            font-family: 'Ubuntu Mono', monospace; 
            font-size: 16px;
        }
    
        
        .col-md-4>p {
            font-family: 'Ubuntu Mono', monospace;  
            font-size: 20px;
        }
        
        .panel-warning>.panel-heading {
            font-family: 'Ubuntu Mono', monospace;  
            font-size: 24px;
            color: black;
        }

        .row>h1 {
            font-family: 'Jura', sans-serif; 
            font-size: 32px;
        }
        
        
        #BuyTicket {
            color: white;
            font-family: 'Jura', sans-serif;
            height: 60px;
            font-size: 32px;
        }
        
        #Places {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        #Places ruby { 
            flex-basis: 10%;
            margin: 10px;
        }

        rt {
            font-size: 16px;  
            font-family: 'Ubuntu Mono', monospace;   
        }

        input[type="checkbox"] {
             -webkit-appearance:none;
             height:2em;
             width:2em;
             cursor:pointer;
             position:relative;
             -webkit-transition: .15s;
             border-radius:2em;
             background-color: darkorange;
        }

        input[type="checkbox"]:checked {
             background-color:green;
        }

        input[type="checkbox"]:before, input[type="checkbox"]:checked:before {
             position:absolute;
             top:0;
             left:0;
             width:100%;
             height:100%;
             line-height:2em;
             text-align:center;
             color:#fff;
             content: '';
        }

        input[type="checkbox"]:checked:before {
             content: '✔';
        }

        input[type="checkbox"]:hover:before {
             background:rgba(255,255,255,0.3);
        }
    
        .col-md-8 h2 {
            font-size: 32px;
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
    <br>
    <div class="container" id="panel">
        <?php echo $success; ?>
        <?php echo $error; ?>
        <h2 class="featurette-heading">Бронирование билета.<br>
        </h2>
        <hr>
        <br>
        <div class="row">
            <form role='form' class='form-horizontal' method='post'>
                <div class='col-md-4'>
                    <div class='panel panel-warning' id='card'>
                        <div class='panel-heading'>
                            <b>Информация о мероприятии</b>
                        </div>
                        <div class='panel-body'>
                            <p><b>Название: </b><?=$data['title']?></p>
                            <p><b>Описание: </b><?=$data['description']?></p>
                            <p><b>Стоимость: <b><?=$data['cost']?> руб.</p>
                            <p><b>Когда: </b><?=date_format(new DateTime($data['date']),"d.m.Y")?></p>
                            <hr>
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
                            <button type='submit' class='btn btn-warning btn-block' id='Success' name='Success' value='<?=$data['id_action']?>'>Подтвердить данные
                            </button>
                            <!-- Кнопка, открывающее модальное окно -->
                            <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#myModal">
                              Посмотреть схему поля
                            </button>
                            <br>
                            <!-- Модальное окно -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Схема поля стадиона УКиТ</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p style="text-align: center;"><img src="/img/pole.jpg" class="img-thumbnail" alt="Стадион УКИТ" width="500" height="500"></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2>Выберите место для бронирования: </h2>
                    <div id="Places">
                        <?php 
                            for($i = 0; $i < count($places_data); $i++) {
                                echo "<ruby><input type='checkbox' name='s_places[]' value=".$places_data[$i]['id_place']."><rt>".$places_data[$i]['place_number']."</ruby>";
                            }
                        ?>
                    </div>
                </div>
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

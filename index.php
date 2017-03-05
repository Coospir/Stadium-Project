<?php
	require "db.php";
    session_start();
	if(isset($_SESSION['logged_user']) ) : ?>
	<style>


		.flex-container {
			display: flex;
			justify-content: space-around;
			border-radius: 10px;
		}
		.flex-items {
			padding: 5px;
			text-align: center;
            color: white;
			height: 20px;
			font-family: "Arial";
		}
		
		.flex-items a {
			text-decoration: none;
            text-align: left;
			color: #4CAF50;
			font-family: "Arial";
		}

	</style>

	  <div class="flex-container">
		<div class="flex-items">
		  Добро пожаловать, <?php echo $_SESSION['logged_user']->login; ?>
		  <a href='/logout.php'>Выйти</a>
		</div>
	  </div>
	<?else:?>
    <style>
        .UserFunctions ul{ 
			background-color: #111;
			display: block;
			justify-content: center;
			padding: 5px;
        } 

        .UserFunctions ul li{ 
			list-style: none; 
			padding: 15px; 
			transition-property: all; 
			transition-duration: 0.5s; 
        
        } 

        .UserFunctions ul li:hover{ 
			сolor: white;
        } 

        .UserFunctions{ 
			width: 10%;
        } 

        .UserFunctions a{ 
            text-decoration: none; 
            color: #318034;
            font-family: "Arial"; 
            font-size: 18px;
        }      
        
        .UserFunctions a:hover {
            color: white;
        }
        
        .Ukit {
            text-decoration: none;
            font-style: "Arial";
            color: #4CAF50;
        }
        
    </style>
		<div class="UserFunctions">
            <ul>
            <li><a href='/login.php'>Вход в систему</a></li>

            </ul>
        </div>
	<?endif;?>

<!DOCTYPE html>
<html>
<head>
    <title>Стадион УКИТ</title>
</head>
<body>
    <style>

        .TopText{
			margin-top: 0;
            font-family: "Arial";
            color: #4CAF50;
            text-decoration: none;
        }


        .TopText a{
			margin-top: 0;
            font-family: "Arial";
            font-size: 150px;
            color: #4CAF50;
            text-decoration: none;
            padding: 15px;

        }

        .TopText a:hover{
            color: white;
            transition-property: all;
			transition-duration: 0.5s;
        }
        
        .UnderTopText{
			margin-top: -100px;
            font-family: "Arial";
            font-size: 30px;
            color: white;
            text-align: center;
            
        }
    
        body  { 
            background-color: #111;
            
        } 

       
        .menu ul {
            list-style-type: none;
            margin-top: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            align-content: left;
        }

        .menu li {
            float: left;
        }

        .menu li a {
            display: block;
            color: white;
            font-family: "Arial";
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 24px;
        }

        .menu li a:hover:not(.active) {
            background-color: #2a2a2a;
        }

        .active {
            background-color: #4CAF50;
        }
        
		
        
        .NewsText {
            font-size: 60px;
            font-family: "Arial";
            color: white;
            margin-top: 50px;
        }
        
        
        .wrapper {
			height: 433px;
			margin: 0px auto 0;
			position: relative;
			width: 1000px;
            margin-top: -145px;
            
		}

		.slider {
			height: inherit;
			overflow: hidden;
			position: relative;
			width: inherit;
			border: 5px solid #333;
		}

		.slides {
			height: inherit;
			opacity: 0;
			position: absolute;
			width: inherit;
			z-index: 0;
			-webkit-transform: scale(1.5);
			-moz-transform: scale(1.5);
			-o-transform: scale(1.5);
			transform: scale(1.5);
			-webkit-transition: transform ease-in-out .5s, opacity ease-in-out .5s;
			-moz-transition: transform ease-in-out .5s, opacity ease-in-out .5s;
			-o-transition: transform ease-in-out .5s, opacity ease-in-out .5s;
			transition: transform ease-in-out .5s, opacity ease-in-out .5s;
		}

		.slide1 { background-image: url(img/z.jpg); }
		.slide2 { background-image: url(img/first.jpg); }
		.slide3 { background-image: url(img/second.jpg); }
		.slide4 { background-image: url(img/third.jpg); }
		.slide5 { background-image: url(img/fourth.jpg); }

		#slide1:checked ~ .slider > .slide1,
		#slide2:checked ~ .slider > .slide2,
		#slide3:checked ~ .slider > .slide3,
		#slide4:checked ~ .slider > .slide4,
		#slide5:checked ~ .slider > .slide5 {
			opacity: 1;
			z-index: 1;
			-webkit-transform: scale(1);
			-moz-transform: scale(1);
			-o-transform: scale(1);
			transform: scale(1);
		}

		.wrapper > input {
			display: none;
		}

		.wrapper .controls {
			left: 50%;
			margin-left: -98px;
			position: absolute;
		}

		.wrapper label {
			cursor: pointer;
			display: inline-block;
			height: 8px;
			margin: 30px 5px 0 16px;
			position: relative;
			width: 8px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-o-border-radius: 50%;
			border-radius: 50%;
			-webkit-transition: background ease-in-out .5s;
			-moz-transition: background ease-in-out .5s;
			-o-transition: background ease-in-out .5s;
			transition: background ease-in-out .5s;
		}

		.wrapper label:hover, 
		#slide1:checked ~ .controls label:nth-of-type(1),
		#slide2:checked ~ .controls label:nth-of-type(2),
		#slide3:checked ~ .controls label:nth-of-type(3),
		#slide4:checked ~ .controls label:nth-of-type(4),
		#slide5:checked ~ .controls label:nth-of-type(5) {
			background: #4CAF50;
		}

		.wrapper label:after {
			border: 2px solid #333;
			content: " ";
			display: block;
			height: 12px;
			left: -4px;
			position: absolute;
			top: -4px;
			width: 12px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-o-border-radius: 50%;
			border-radius: 50%;
		}

        .floating-box {
            display: inline-grid;
            justify-content: center;
            width: 80%;
            height: auto;
            margin: 10px auto;
            margin-top: 50px;
            border: 3px solid #777;
            background-color: #333;
        }



        .floating-box>h3 {
            padding: 2px 5px;
            color: #4CAF50;
            margin-top: 0px;
            font-family: "Arial";
            font-size: 24px;
            background-color: #222;
            text-shadow: none;
            width: auto;
        }

        .floating-box>p {
            color: White;
            margin-top: 0px;
            font-family: "Arial";
            padding: 10px 10px;
            font-size: 20px;
        }

        .floating-box>time {
            padding: 1px 5px;
            color: black;
            margin-top: 0px;
            background-color: #4CAF50;
            text-shadow: none;
            width: auto;
        }

        .WhyUs {
            font-size: 60px;
            font-family: "Arial";
            color: white;
            margin-top:120px;
            text-align: center;
        }

        .flex {
            margin-top: 50px;
            display: flex;
            justify-content: space-around;
        }

        .flex-item {
            margin: 10px;
            padding: 5px;
            width: 50%;
            height: 30%;
            background: #333;
            border-radius: 5px;
            font-size: 20px;
            border: 1px solid #222;
        }



        .TextInFlex {
            font-size: 18px;
            font-family: "Arial";
            color: white;
        }

        .TextInFlex a {
            text-decoration: none;
            color: #111;
        }

        .TitleText {
            font-size: 32px;
            font-family: "Arial";
            color: #4CAF50;
        }



        input[type=submit] {
            width: 50%;
            background-color: #111111;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type=submit]:hover {
            background-color: #318034;
        }
        
    </style>  

    <div class="menu"> 
    <ul> 
        <li><a class="active" href="index.php">Главная</a></li> 
        <li><a href="sections.php">Спортивные секции</a></li> 
        <li><a href="rent.php">Аренда</a></li> 
        <li><a href="contacts.php">Контакты</a></li>
    </ul>
        <div class="TopText">
            <p align="center"><img src="img/title_site.jpg"></p>
        </div>

    </div>

    <div class="wrapper">
        <input type="radio" name="point" id="slide1" checked>
        <input type="radio" name="point" id="slide2">
        <input type="radio" name="point" id="slide3">
        <input type="radio" name="point" id="slide4">
        <input type="radio" name="point" id="slide5">
        <div class="slider">
            <div class="slides slide1"></div>
            <div class="slides slide2"></div>
            <div class="slides slide3"></div>
            <div class="slides slide4"></div>
            <div class="slides slide5"></div>
        </div>
        <div class="controls">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
            <label for="slide4"></label>
            <label for="slide5"></label>
        </div>
    </div>

    <div class="WhyUs">
        <b>Почему выбирают именно нас?</b>
        <div class="flex">
            <div class="flex-item">
                <div class="TitleText">
                    <b>Преподаватели с многолетним опытом.</b>
                    <hr>
                </div>
                <div class="TextInFlex">
                    <p>Огромное количество спортивных секций с ведущими тренерами России!</p>
                    <input type="submit" value="Записаться в секцию" onclick="javascript:document.location.href='/sections.php'">
                </div>
            </div>

            <div class="flex-item">
                <div class="TitleText">
                    <b>Использование современных технологий.</b>
                    <hr>
                </div>
                <div class="TextInFlex">
                    <p>"Теплый" стадион в любое время года. Долговечный газон. Удобные раздевалки.</p>
                    <input type="submit" value="Подробнее.." onclick="javascript:document.location.href='/index.php'">
                </div>
            </div>
            <div class="flex-item">
                <div class="TitleText">
                    <b>Низкие цены на аренду спорт площади.</b>
                    <hr>
                </div>
                <div class="TextInFlex">
                    <p>Самые низкие цены в Москве. Удобная и выгодная рассрочка. Аренда кортов и стадиона для мероприятий.</p>
                    <input type="submit" value="Отправить заявку на аренду" onclick="javascript:document.location.href='/rent.php'">
                </div>
            </div>
        </div>
    </div>

    <div class="NewsText">
        <b>Последние новости</b>
    </div>
    <?php

    $DB = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
    $DB->exec("SET NAMES utf8");
    $data = $DB->query("SELECT * FROM `article` ORDER BY date DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($data); $i++) {
        echo "
      <div class='floating-box'>
      <h3>".$data[$i]['title']."</h3>
		<p>".$data[$i]['full_text']."</p>
        <time>".$data[$i]['date']."</time>
        </div>";
    }

    ?>
    
</body>
</html>
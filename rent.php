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
		.flex-item {
			padding: 5px;
			border-radius: 1px;
			background: #111;
			text-align: center; 
            color: white;
			height: 20px;
			font-family: "Arial"; 
		}
		
		.flex-item a {
			text-decoration: none;
            text-align: left;
			color: #4CAF50;
			font-family: "Arial"; 
		}

	</style>

	  <div class="flex-container">
		<div class="flex-item">
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
            color: #f2f2f2;
            font-family: "Arial";
            font-size: 18px;
        }

        .UserFunctions a:hover {
            color: white;
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
			margin-top: 10px;
            font-family: "Arial";
            font-size: 90px;
            color: #4CAF50;
            text-decoration: none;
            
        }
        
        .TopText a{
			margin-top: 0;
            font-family: "Arial";
            font-size: 90px;
            color: #4CAF50;
            text-decoration: none;
            padding: 15px;
            
        }
        
        .TopText a:hover{
            color: white;
            transition-property: all; 
			transition-duration: 0.5s; 
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
        
		
        
        
        .floating-box {
            display: inline-table;
            width: 400px;
            height: auto;
            margin: 10px;
            border: 3px solid #4CAF50;  
        }
       


		.floating-box>h3 {
			padding: 2px 5px;
			color: white;
			margin-top: 0px;
            font-family: "Arial";
            font-size: 24px;
			background-color: #4CAF50;
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

        input[type=text], select {
            color: white;
            font-size: 16px;
            font-family: "Arial";
            background-color: #666;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #111;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=date], select {
            color: white;
            font-size: 16px;
            font-family: "Arial";
            background-color: #666;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #111;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=email], select {
            background-color: #666;
            color: white;
            font-size: 16px;
            font-family: "Arial";
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #111;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type=submit]:hover {
            background-color: #318034;
        }

        .AddSection {
            width: 50%;
            border-radius: 10px;
            background-color: #333;
            padding:20px;
            font-family: "Arial";
            display: block;
            margin-top: 10px;
            color: white;
            position: inherit;
            top:0;
            bottom:0;
            left:0;
            right:0;
            margin:auto;
        }

        div.img {
            margin: 50px;
            border: 2px solid #333;
            float: left;
            width: 500px;
            display: inline-block;
            justify-content: center;


        }

        div.img:hover {
            border: 2px solid #4CAF50;
        }

        div.img img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
            color: white;
            font-family: "Arial";
        }
        
    </style>  

    <div class="menu"> 
    <ul> 
        <li><a href="index.php">Главная</a></li> 
        <li><a href="sections.php">Спортивные секции</a></li> 
        <li><a class="active" href="rent.php">Аренда</a></li>
        <li><a href="actions.php">Мероприятия</a></li>
        <li><a href="contacts.php">Контакты</a></li>
    </ul>
        <div class="TopText">
            <p align="center"><a href="" style="text-decoration: none">Аренда площади</a></p>
        </div>


        <div class="img">
            <a target="_blank" href="http://biofile.ru/chel/14684.html">
                <img src="/img/1.jpg" alt="Training" width="300" height="200">
            </a>
            <div class="desc"><b style="color:#4CAF50">Спортивное поле</b>
                <p><b>Размеры: </b> 105x68 метров.</p> <p>Стоимость: 12.000 руб</p>

            </div>
        </div>



        <div class="img">
            <a target="_blank" href="https://ru.wikipedia.org/wiki/Футбол">
                <img src="http://mw2.google.com/mw-panoramio/photos/medium/72613496.jpg" alt="Football" width="300" height="200">
            </a>
            <div class="desc"><b style="color:#4CAF50">Сцена на поле</b>
                <p><b>Размеры: </b> 10x10 метров.</p> <p>Стоимость: 9.000 руб</p>

            </div>
        </div>
        <div class="img">
            <a target="_blank" href="https://ru.wikipedia.org/wiki/Теннис">
                <img src="http://lit.govuadocs.com.ua/tw_files2/urls_116/60/d-59030/59030_html_m5df505f9.png" alt="Tennis" width="300" height="200">
            </a>
            <div class="desc"><b style="color:#4CAF50">Вся площадь стадиона</b>
                <p><b>Размеры: </b> 105x68 + 10x10 метров.</p> <p>Стоимость: 15.000 руб (выгода 6.000 рублей!) </p>

            </div>
        </div>
        <div class="TopText">
            <p align="center">Заполнение данных для аренды площади</p>
        </div>

        <?php
        $data = $_POST;
        if( isset($data['send_info']))
        {
            // Здесь регистрация
            $errors = array();

            if( $data['lastname'] == '')
            {
                $errors[] = 'Введите фамилию!';
            }

            if( $data['firstname'] == '')
            {
                $errors[] = 'Введите имя!';
            }

            if( $data['patronymic'] == '')
            {
                $errors[] = 'Введите отчество!';
            }


            if( $data['email'] == '')
            {
                $errors[] = 'Введите E-Mail!';
            }

            if( $data['rentobject'] == '')
            {
                $errors[] = 'Выберите объект!';
            }

            if( $data['date'] == '')
            {
                $errors[] = 'Выберите дату аренды!';
            }

            if(!isset($_SESSION['logged_user']))
            {
                $errors[] = 'Сначала зайдите на сайт!';
                print "<script language='Javascript' type='text/javascript'>
            alert ('Чтобы арендовать объект нужно войти на сайт!');
            function reload(){location = 'rent.php'}; 
            setTimeout('reload()', 0);
            </script>";
            }

            if(empty($errors) && (isset($_SESSION['logged_user'])))
            {
                // Все отлично, регистрируем
                $rent = R::dispense('renting');
                $rent->lastname = $data['lastname'];
                $rent->firstname = $data['firstname'];
                $rent->patronymic = $data['patronymic'];
                $rent->email = $data['email'];
                $rent->rentobject = $data['rentobject'];
                $rent->date = $data['date'];
                R::store($rent);
                print "<script language='Javascript' type='text/javascript'>
            alert ('Ваша заявка отправлена! Спасибо!');
            function reload(){location = 'rent.php'}; 
            setTimeout('reload()', 0);
            </script>";

            } else

            {
                echo '<div style="color: red; text-align: center;"><b>'.array_shift($errors).'</b></div><hr>';
            }

        }
        ?>

        <div class="AddSection" style="">
            <form action="/rent.php" method="POST">

                <label for="lname">Ваша фамилия </label>
                <input type="text" id="lname" name="lastname" required value="<?php echo @$data['lastname']; ?>">

                <label for="fname">Ваше имя</label>
                <input type="text" id="fname" name="firstname" required value="<?php echo @$data['firstname']; ?>">

                <label for="pname">Ваше отчество </label>
                <input type="text" id="pname" name="patronymic" required value="<?php echo @$data['patronymic']; ?>">

                <label for="email">Электронная почта</label>
                <input type="email" id="em" name="email" required value="<?php echo @$data['email']; ?>">

                <label for="rentobject">Укажите объект для аренды</label>
                <select id="rentobject" name="rentobject" required value="<?php echo @$data['rentobject']; ?>">
                    <option value="pole">Спортивное поле</option>
                    <option value="scene">Сцена на поле</option>
                    <option value="stadium">Вся площадь стадиона</option>
                </select>

                <label for="date">Дата аренды</label>
                <input type="date" id="date" name="date"/>

                <input type="submit" value="Отправить" name="send_info">
            </form>
        </div>
    </div> 
  
    
</body>
</html>
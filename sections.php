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
            margin-top: 0;
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
            float: right;
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
        <li><a class="active" href="sections.php">Спортивные секции</a></li> 
        <li><a href="rent.php">Аренда</a></li>
        <li><a href="actions.php">Мероприятия</a></li>
        <li><a href="contacts.php">Контакты</a></li>
    </ul>
         <div class="TopText">
            <p align="center"><a href="" style="text-decoration: none">Наши секции</a></p>
        </div>
        
    
        <div class="img">
          <a target="_blank" href="http://biofile.ru/chel/14684.html">
            <img src="/img/ofp.jpg" alt="Training" width="300" height="200">
          </a>
          <div class="desc"><b style="color:#4CAF50">Общая физическая подготовка.</b>
              <p><b>Тренер:</b> Иванов И.И. Стаж работы - 5 лет. </p>

          </div>
        </div>
        
        <div class="img">
          <a target="_blank" href="https://ru.wikipedia.org/wiki/Футбол">
            <img src="/img/football.jpg" alt="Football" width="300" height="200">
          </a>
          <div class="desc"><b style="color:#4CAF50">Футбол.</b>
              <p><b>Тренер:</b> Петренко И.Н. Стаж работы - 20 лет. </p>

          </div>
        </div>
        
        <div class="img">
          <a target="_blank" href="https://ru.wikipedia.org/wiki/Теннис">
            <img src="/img/tennis.jpg" alt="Tennis" width="300" height="200">
          </a>
          <div class="desc"><b style="color:#4CAF50">Теннис.</b>
              <p><b>Тренер:</b> Глаголева Е.П. Стаж работы - 18 лет. </p>

          </div>
        </div>
        
        
        
        <div class="TopText">
            <p align="center">Заполнение анкеты в спортивную секцию</p>
        </div>
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

		if( $data['skill'] == '')
		{
			$errors[] = 'Выберите опыт!';
		}
        
        if( $data['sport'] == '')
		{
			$errors[] = 'Выберите вид спорта!';
		}
        
        if(!isset($_SESSION['logged_user']))
        {
            $errors[] = 'Сначала зайдите на сайт!';
            print "<script language='Javascript' type='text/javascript'>
            alert ('Чтобы записаться в секцию нужно войти на сайт!');
            function reload(){location = 'sections.php'}; 
            setTimeout('reload()', 0);
            </script>";  
        }
        
        if(empty($errors) && (isset($_SESSION['logged_user'])))
		{
			// Все отлично, регистрируем
			$section = R::dispense('sections');
			$section->lastname = $data['lastname'];
			$section->firstname = $data['firstname'];
			$section->patronymic = $data['patronymic'];
			$section->email = $data['email'];
			$section->skill = $data['skill'];
            $section->sport = $data['sport'];
			R::store($section);
			print "<script language='Javascript' type='text/javascript'>
            alert ('Ваше сообщение отправлено! Спасибо!');
            function reload(){location = 'sections.php'}; 
            setTimeout('reload()', 0);
            </script>";

		} else

		{
			echo '<div style="color: red; text-align: center;"><b>'.array_shift($errors).'</b></div><hr>';
		}

    }
?>
<div class="AddSection" style="">
  <form action="/sections.php" method="POST">
      
    <label for="lname">Ваша фамилия </label>
    <input type="text" id="lname" name="lastname" required value="<?php echo @$data['lastname']; ?>">
      
    <label for="fname">Ваше имя</label>
    <input type="text" id="fname" name="firstname" required value="<?php echo @$data['firstname']; ?>">

    <label for="pname">Ваше отчество </label>
    <input type="text" id="pname" name="patronymic" required value="<?php echo @$data['patronymic']; ?>">
    
    <label for="email">Электронная почта</label>
    <input type="email" id="em" name="email" required value="<?php echo @$data['email']; ?>">
    
    <label for="skill">Опыт</label>
    <select id="skill" name="skill" required value="<?php echo @$data['skill']; ?>">
      <option value="good">Новичок</option>
      <option value="better">Продвинутый</option>
      <option value="thebest">Профи</option>
    </select>
      
    <label for="sport">Вид спорта</label>
    <select id="sport" name="sport" required value="<?php echo @$data['sport']; ?>">
      <option value="ofp">Общая физическая подготовка</option>
      <option value="football">Футбол</option>
      <option value="tennis">Теннис</option>
    </select>
  
    <input type="submit" value="Отправить" name="send_info">
  </form>
</div> 
    
</body>
</html>

<?php

	require "db.php";
	
	$data = $_POST;
	if( isset($data['do_signup']))
	{
		// Здесь регистрация
		$errors = array();

		if( trim($data['login'] == ''))
		{
			$errors[] = 'Введите логин!';
		}
		
		if( $data['surname'] == '')
		{
			$errors[] = 'Введите Вашу фамилию!';
		}
		
		if( $data['name'] == '')
		{
			$errors[] = 'Введите Ваше имя!';
		}
		
		if( $data['patronymic'] == '')
		{
			$errors[] = 'Введите Ваше отчество!';
		}
		
		if( trim($data['email'] == ''))
		{
			$errors[] = 'Введите E-Mail!';
		}

		if( $data['password'] == '')
		{
			$errors[] = 'Введите пароль!';
		}

		if( $data['password_2'] != $data['password'])
		{
			$errors[] = 'Повторный пароль введен неверно!';
		}

		if( R::count('users', 'login = ?', array($data['login'])) > 0 )
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}

		if( R::count('users', 'email = ?', array($data['email'])) > 0 )
		{
			$errors[] = 'Пользователь с таким E-Mail уже существует!';
		}

		if(empty($errors))
		{
			// Все отлично, регистрируем
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->surname = $data['surname'];
			$user->name = $data['name'];
			$user->patronymic = $data['patronymic'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            mail($data['email'], $data['login'], "Тест");
			R::store($user);
			header('Location: /');
			exit;

		} else

		{
			echo '<div style="color: red; text-align: center;"><b>'.array_shift($errors).'</b></div><hr>';
		}
	}

?>
<style>
    
    .RegForm p {
        font-family: "Arial";
        font-size: 18px;
        color: black;
    }
	
	.RegForm h1 {
		text-align: center;
	}
    
    #login {
        height: 20px;
        font-size: 14px;
    }
    
    #pass {
        height: 20px;
        font-size: 14px;
    }
	
	#pass_copy{
        height: 20px;
        font-size: 14px;
    }
    
    .RegBtn {
        height: 50px;
        font-family: "Arial";
        font-size: 18px;
        background-color: black;
        border: 1px solid white;
        color: white;
    }
	
	.RegBtn:hover {
		background-color: #4CAF50;
		color: black;
		border: 1px solid black;
		transition-property: all; 
        transition-duration: 0.5s; 
		 
	}

	.RegForm h1 {
		font-family: "Arial";
        font-size: 28px;
        color: white;
        	
	}
	
	.flex-container{
		display: flex;
		justify-content: space-around;
		padding: 10px;
		border-radius: 10px;
		border-radius: 1px;
	}
	.flex-item {
	    margin: 10px;
		padding: 5px;
	}
    
    body {
        background-color: #333;
    }
	
</style>
<html>
    <title>Регистрация нового пользователя</title>
<body>

<div class="flex-container">
    <div class="flex-item">
		<form class="RegForm" action="/signup.php" method="POST">
		<h1>Регистрация нового пользователя</h1>
		<div class="flex-container">
			<div class="flex-item">
			  <p><strong>Логин(никнейм):</strong></p>
			  <input type="text" name="login" id="login" value="<?php echo @$data['login'];?>">
			  <p><strong>E-Mail:</strong></p>
			  <input type="email" name="email" id="email" value="<?php echo @$data['email'];?>">
			  <p><strong>Пароль:</strong></p>
			  <input type="password" name="password" id="pass" value="<?php echo @$data['password'];?>">
			  <p><strong>Повторите пароль:</strong></p>
			  <input type="password" name="password_2" id="pass_copy" value="<?php echo @$data['password_2'];?>">
			</div>
			<div class="flex-item">
			  <p><strong>Фамилия:</strong></p>
			  <input type="text" name="surname" id="surname" value="<?php echo @$data['surname'];?>"> 
			  <p><strong>Имя:</strong></p>
			  <input type="text" name="name" id="name" value="<?php echo @$data['name'];?>">
			  <p><strong>Отчество:</strong></p>
			  <input type="text" name="patronymic" id="patronymic" value="<?php echo @$data['patronymic'];?>">
			  <p>
			  <button class="RegBtn" type="submit" name="do_signup"><strong>Зарегистрироваться</strong></button>
			  </p>
			</div>
		  </div>
		</form>
    </div>
 </div>	
</body>
</html>
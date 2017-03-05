<?php
	require_once "db.php";
	
	$data = $_POST;
    session_start();
	if(isset($data['do_login'])) 
	{
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));
        if(($data['login'] == 'Admin') and ($data['password'] == 'root'))
            {
                $_SESSION['logged_admin'] = $user;
                // echo '<div style="color: green;">Вы вошли как администратор! <p>Переход на <a href="/admin.php">панель</a> администратора.</p></div><hr>'; 
                header('Location: /admin.php');
                exit;
                
            } else
                
		if($user)
		{
			// Если существует
			if(password_verify($data['password'], $user->password))
			{
				$_SESSION['logged_user'] = $user;
				header('Location: /');
                exit;

			} else
            {

				$errors[] = 'Пароль неверен!';
                
			}

		} else
		{
			$errors[] = 'Пользователь с таким логином не существует! <p>Перейти на <a href="/signup.php">страницу</a> регистрации?</p>';
		}

		if(! empty($errors))
		{

			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';

		}

			
	}
?>
<html>
    <title>Авторизация пользователя</title>
<body>
<style>
    
    body {
        background-color: #333;
    }
    .LoginForm {
        display: block;
        text-align: center;
        width: auto;
        margin-top: auto;
        margin-left: 550px;
        margin-right: 550px;
        margin-bottom: auto;
    }
    
    .LoginForm p {
        font-family: "Arial";
        font-size: 21px;
        color: black;
        
    }
    
    #login {
        height: 20px;
        font-size: 16px;
    }
    
    #pass {
        height: 20px;
        font-size: 16px;
    }
    
    .LoginBtn {
        height: 30px;
        font-family: "Arial";
        font-size: 18px;
        background-color: black;
        border: 1px solid white;
        color: white;
    }
    
    .LoginBtn:hover {
        background-color: #4CAF50;
		color: black;
		border: 1px solid black;
		transition-property: all; 
        transition-duration: 0.5s; 
    }
	
	.LoginForm h1 {
		font-family: monospace;
        font-size: 28px;
        color: white;
        
	}
    
	
</style>
<form class="LoginForm" action="/login.php" method="POST">
	<h1>Авторизация пользователя</h1>
	
		<p><strong>Логин пользователя:</strong></p>
		<input type="text" name="login" id="login" value="<?php echo @$data['login'];?>">

	<p>
		<p><strong>Пароль</strong></p>
		<input type="password" name="password" id="pass" value="<?php echo @$data['password'];?>">
	</p>

	<p>
	<button class="LoginBtn" type="submit" name="do_login"><strong>Авторизоваться</strong></button>
	</p>
</body>
</form>
</html>
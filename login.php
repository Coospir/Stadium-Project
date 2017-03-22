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
        background-color: #2a2a2a;
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
        color: white;
        
    }
    
    #login {
        height: 20px;
        font-size: 16px;
    }
    
    #pass {
        height: 20px;
        font-size: 16px;
    }

    .LoginForm input[type=submit] {
        width: 40%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .LoginForm input[type=submit]:hover {
        background-color: #318034;
    }
	
	.LoginForm h1 {
		font-family: monospace;
        font-size: 40px;
        color: #4CAF50;
	}

    .LoginForm input[type=text]{
        width: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .LoginForm input[type=password]{
        width: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
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

    <input type="submit" class="LoginBtn" name="do_login" value="Авторизоваться">
    <br>
    <a href="signup.php" style="color: #4CAF50; font-family: Arial;">Не зарегистрированы?</a>

</form>
</body>
</html>
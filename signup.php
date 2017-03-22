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
            print "<script language='Javascript' type='text/javascript'>
            alert ('Регистрация прошла успешно! Переход на главную.');
            function reload(){location = 'index.php'}; 
            setTimeout('reload()', 0);
            </script>";

        } else

        {
            echo '<div style="font-family: Arial; color: red; text-align: center;"><b>'.array_shift($errors).'</b></div><hr>';
        }
	}

?>
<style>
    body {
        background-color: #2a2a2a;
    }

    .RegForm {
        display: inline-block;
        justify-content:space-around;
        text-align: left;
        width: auto;
        margin-top: auto;
        margin-left: 550px;
        margin-right: 550px;
        margin-bottom: auto;
    }

    .RegForm p {
        font-family: "Arial";
        font-size: 14px;
        color: white;
    }



    .RegForm input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .RegForm input[type=submit]:hover {
        background-color: #318034;
    }

    .RegForm h1 {
        font-family: monospace;
        font-size: 40px;
        color: #4CAF50;
    }

    .RegForm input[type=text]{
        width: 60%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .RegForm input[type=email]{
        width: 60%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .RegForm input[type=password]{
        width: 60%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

	
</style>
<html>
    <title>Регистрация нового пользователя</title>
<body>
		<form class="RegForm" action="/signup.php" method="POST">
		<h1>Регистрация нового пользователя</h1>

			  <p><strong>Логин(никнейм):</strong></p>
			  <input type="text" name="login" id="login" value="<?php echo @$data['login'];?>">

			  <p><strong>E-Mail:</strong></p>
			  <input type="email" name="email" id="email" value="<?php echo @$data['email'];?>">

			  <p><strong>Пароль:</strong></p>
			  <input type="password" name="password" id="pass" value="<?php echo @$data['password'];?>">

              <p><strong>Повторите пароль:</strong></p>
			  <input type="password" name="password_2" id="pass_copy" value="<?php echo @$data['password_2'];?>">
              <h1>Дополнительные данные</h1>
              <p>Фамилия:</p>
			  <input type="text" name="surname" id="surname" value="<?php echo @$data['surname'];?>">

              <p>Имя:</p>
			  <input type="text" name="name" id="name" value="<?php echo @$data['name'];?>">

              <p>Отчество:</p>
			  <input type="text" name="patronymic" id="patronymic" value="<?php echo @$data['patronymic'];?>">
              <br>
              <input type="submit" class="RegBtn" name="do_signup" value="Зарегистрироваться">

		</form>
</body>
</html>
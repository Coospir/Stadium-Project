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
            color: #318034;
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
        
    </style>  

    <div class="menu"> 
    <ul> 
        <li><a href="index.php">Главная</a></li> 
        <li><a href="sections.php">Спортивные секции</a></li> 
        <li><a class="active" href="rent.php">Аренда</a></li> 
        <li><a href="contacts.php">Контакты</a></li>
    </ul>
        <div class="TopText">
            <p align="center"><a href="" style="text-decoration: none">Аренда площади</a></p>
        </div>
    </div> 
  
    
</body>
</html>
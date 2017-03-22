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
            font-size: 16px;
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
            color: #f2f2f2;
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
        margin-top: -50px;
        margin-top: -50px;
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
        border-radius: 4px;
        cursor: pointer;
        font-size: 18px;
    }

    input[type=submit]:hover {
        background-color: #318034;
    }

    .AddSection {
        width: auto;
        border-radius: 5px;
        background-color: #333;
        padding: 20px;
        font-family: "Arial";
        display: block;
        margin-top: 30px;
        color: white;

    }
    div.img {
        margin: 50px;
        border: 2px solid #333;
        float: center;
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
        <li><a href="rent.php">Аренда</a></li>
        <li><a href="actions.php">Мероприятия</a></li>
        <li><a class="active" href="contacts.php">Контакты</a></li>
    </ul>
    <div class="TopText">
        <p align="center"><a href="" style="text-decoration: none">Контактная информация</a>


        <!-- <p align="left">Наши контакты</p>
         <p align="rigth">Напишите нам</p> -->
    </div>

    <div id="wrapper">
        <div id="articles">
            <article>
                <img src="https://pp.userapi.com/c639521/v639521940/b993/2MB_M30HgIo.jpg" alt="Изображение" title="" />
            </article>

            <article>
                <img src="https://pp.userapi.com/c639521/v639521940/b99a/zeuXUsWaVDU.jpg" alt="Изображение" title="" />
            </article>

            <article>
                <img src="https://pp.userapi.com/c639521/v639521940/b903/ejF_EQvu1fY.jpg" alt="Изображение" title="" />
            </article>

        </div>
    </div>

    <style>
        #wrapper {
            float: left;
            width: 100%;
        }

        #wrapper #articles {
            float: left;
            width: 70%;
            margin-left: 20%;
        }
        #wrapper #articles article {
            float: left;
            width: 30.0%;
            border: 0px solid silver;
            box-sizing: border-box;
            border-radius:  300px 300px 300px 300px;
            background-color: #4CAF50;

            margin-right: 3%;
            min-height: 400px;
        }

        #wrapper #articles article img {
            width: 100%;
            height: 400px;
            border-radius: 300px 300px 300px 300px;

        }

    </style>

    <!--  <style>
     #wrapper #articles article:hover{
   border: 8px solid #4CAF50;
}
      </style> -->

    <div id="dwrapper">
        <div id="darticles">
            <article>
                <h2 style="color: #4CAF50">Электронный адрес</h2>
                <h2>Евгений: nichosi@gmail.com</h2>
                <h2>Руслан: yourfr13nd@gmail.com</h2>
            </article>

            <article>
                <h2 style="color: #4CAF50">Телефон</h2>
                <h2>Евгений: 8 800 555 35 55</h2>
                <h2>Руслан: 9 900 666 36 66</h2>
            </article>

            <article>
                <h2 style="color: #4CAF50">SKYPE</h2>
                <h2>Евгений: nichosi</h2>
                <h2>Руслан: yourfr13nd</h2>
            </article>

        </div>
    </div>

    <style>
        #dwrapper {
            margin-top: 1px;
            float: left;
            width: 100%;

            font-family: Arial;

        }

        #dwrapper #darticles {
            float: left;
            width: 65%;
            margin-left: 25%;
            font-size: 15px;
        }

        #dwrapper #darticles article {
            float: left;
            width: 30.0%;
            margin-right: 2%;
            min-height: 400px;
        }
    </style>
    <style>
        div {
            padding: 5px; /* Поля вокруг текста */
            margin-bottom: 20px; /* Отступ снизу */
            color: white;
            font-size: 25px;
        }

        #left { text-align: left; }
        #right { text-align: right; }
        #center { text-align: center; }

        .content {
            width: 26%; /* Ширина слоя */
            height: 150px;
            background: #2a2a2a; /* Цвет фона */
        }
    </style>
</div>




</body>
</html>

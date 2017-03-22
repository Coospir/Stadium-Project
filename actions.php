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

    .floating-box>b {
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


    .floating {
        display: inline-grid;
        justify-content: center;
        width: 80%;
        height: auto;
        margin: 10px auto;
        margin-top: 50px;
        border: 3px solid #777;
        background-color: #2a2a2a;
    }

    .floating>h3 {
        padding: 2px 5px;
        color: #f2f2f2;
        margin-top: 0px;
        font-family: "Arial";
        font-size: 24px;
        background-color: #4CAF50;
        text-shadow: none;
        width: auto;

    }

    .floating>p {
        color: White;
        margin-top: 0px;
        font-family: "Arial";
        padding: 10px 10px;
        font-size: 20px;
    }

    .floating>b {
        color: White;
        margin-top: 0px;
        font-family: "Arial";
        margin-left: 10px;
        font-size: 20px;
        padding: 2px 5px;
        color: #2a2a2a;
        background-color: #4CAF50;
        text-shadow: none;
        width: auto;
    }

    .floating>time {
        padding: 1px 5px;
        color: white;
        margin-top: 0px;
        text-shadow: none;
        width: auto;
    }


    .TextInFlex a {
        text-decoration: none;
        color: #111;
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

    .TopText{
        font-family: "Arial";
        font-size: 90px;
        color: #4CAF50;
        text-decoration: none;
        text-align: center;
    }

    .TopText a{
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

    .Ticket{
        margin-top: 0;
        font-family: "Arial";
        font-size: 90px;
        color: #4CAF50;
        text-decoration: none;
        text-align: center;

    }

    .Ticket a{
        margin-top: 0;
        font-family: "Arial";
        font-size: 90px;
        color: #4CAF50;
        text-decoration: none;
        padding: 15px;

    }

    .Ticket a:hover{
        color: white;
        transition-property: all;
        transition-duration: 0.5s;
    }

</style>

<div class="menu">
    <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="sections.php">Спортивные секции</a></li>
        <li><a href="rent.php">Аренда</a></li>
        <li><a class="active"  href="actions.php">Мероприятия</a></li>
        <li><a href="contacts.php">Контакты</a></li>
    </ul>
</div>

<div class="TopText">
    <a align="center">Ближайшие мероприятия</a>
</div>
<?php
$DB = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
$DB->exec("SET NAMES utf8");
$data1 = $DB->query("SELECT * FROM `actions` ORDER BY date DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
for ($j = 0; $j < count($data1); $j++) {
    echo "
          <div class='floating'>
          <h3>".$data1[$j]['title']."</h3>
            <p>".$data1[$j]['full_text']."</p>
            <b>Цена: ".$data1[$j]['cost']."</b>
            <b>Когда: ".$data1[$j]['date']."</b>
            </div>";
}

?>

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

    if( $data['act'] == '')
    {
        $errors[] = 'Выберите мероприятие!';
    }

    if(!isset($_SESSION['logged_user']))
    {
        $errors[] = 'Сначала зайдите на сайт!';
        print "<script language='Javascript' type='text/javascript'>
            alert ('Чтобы купить билет нужно войти на сайт!');
            function reload(){location = 'actions.php'}; 
            setTimeout('reload()', 0);
            </script>";
    }

    if(empty($errors) && (isset($_SESSION['logged_user'])))
    {
        // Все отлично, регистрируем
        $a = R::dispense('actionsreg');
        $a->lastname = $data['lastname'];
        $a->firstname = $data['firstname'];
        $a->patronymic = $data['patronymic'];
        $a->email = $data['email'];
        $a->sport = $data['act'];
        R::store($a);
        print "<script language='Javascript' type='text/javascript'>
            alert ('Ваше сообщение отправлено! Спасибо!');
            function reload(){location = 'actions.php'}; 
            setTimeout('reload()', 0);
            </script>";

    } else

    {
        echo '<div style="color: red; text-align: center;"><b>'.array_shift($errors).'</b></div><hr>';
    }

}
?>

<div class="Ticket">
    <a align="center">Заполнение данных для покупки билета</a>
</div>
<div class="AddSection" style="">
    <form action="/actions.php" method="POST">

        <label for="lname">Ваша фамилия </label>
        <input type="text" id="lname" name="lastname" required value="<?php echo @$data['lastname']; ?>">

        <label for="fname">Ваше имя</label>
        <input type="text" id="fname" name="firstname" required value="<?php echo @$data['firstname']; ?>">

        <label for="pname">Ваше отчество </label>
        <input type="text" id="pname" name="patronymic" required value="<?php echo @$data['patronymic']; ?>">

        <label for="email">Электронная почта</label>
        <input type="email" id="em" name="email" required value="<?php echo @$data['email']; ?>">

        <label for="act">Мероприятие</label>
        <select id="act" name="act" required value="<?php echo @$data['act']; ?>">
            <?php
            for ($j = 0; $j < count($data1); $j++) {
                echo "<option>".$data1[$j]['title']."</option>";
            }
            ?>
        </select>

        <input type="submit" value="Отправить" name="send_info">
    </form>
</div>
</body>
</html>
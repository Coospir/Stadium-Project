<?php
	require_once "db.php";
    session_start();
	if(isset($_SESSION['logged_admin']) ) : ?>
    <style>
        .Container {
            display: flex;
            flex-direction: column;
            align-content: space-around;
            width: 30%;
            background-color: #f2f2f2;
        }

        .Container form {
            margin-left: 50px;
            width: 200%;
        }
        
        .Container input[type=text]{
            width: 40%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .Container input[type=date]{
            width: 40%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
         .Container .TextArea  {
            width: 40%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-flex;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            
        }
        
        .Container input[type=submit] {
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

        .Container input[type=submit]:hover {
            background-color: #318034;
        }

        .Container h1 {
            font-family: Arial;
            font-size: 26px;
            color: #4CAF50;
            margin-left: 50px;
        }

        .Container label {
            font-family: "Arial Black";
            font-size: 14px;
        }

        .Container hr {
            width: 40%;
            margin-left: 0px;
        }

        .Container select {
            width: 40%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }


    
    </style>
<html>

	<div class="LoggedAdmin" style="text-align: center;">
        <b>Вы вошли как <?php echo $_SESSION['logged_admin']->login; ?>!</b>
		<a href='/logout.php' style="color: #318034; text-align: center; text-decoration: none;"><p style="font-size: 18px;">Выйти</p></a><hr>
    </div>
    
    <div class="Container">
        <h1>Добавление новостного блока</h1>
      <form method="post" novalidate>

        <label for="title">Краткое название новости</label>
          <br>
        <input type="text" name="title" required>
          <br>
          <label for="date">Дата публикации</label>
          <br>
        <input type="date" name="date" required>
          <br>
        <label for="full_text">Полный текст</label>
          <br>
          <textarea class="TextArea" name="full_text" maxlength="200" required></textarea>
          <br>
          <input type="submit" name="publish" value="Добавить">
          
        <?php 
            $DB = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
              $DB->exec("SET NAMES utf8");  

            if(!empty($_POST["publish"])) {
            $add = $DB->prepare("INSERT INTO `article` (`title`, `full_text`, `date`) VALUES (:title, :t, :d)");
            $add->execute([":title" => $_POST['title'], ":t" => $_POST['full_text'], ":d" => $_POST['date']]);  
            print "<script language='Javascript' type='text/javascript'>
            alert ('Новостной пост успешно создан.');
            function reload(){location = 'admin.php'}; 
            setTimeout('reload()', 0);
            </script>";
            } 
          else "<script language='Javascript' type='text/javascript'>
            alert ('Ошибка: пост не создан');
            </script>";

        ?>
        <hr>
      </form>
    </div>

    <div class="Container">
        <h1>Удаление новостного блока</h1>
            <form method="post">
                <label>Выберите новостной пост для удаления:</label>
                <br>
                <?php
                $DB = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
                $DB->exec("SET NAMES utf8");
                $query = $DB->query("SELECT * FROM `article`")->fetchAll(PDO::FETCH_ASSOC);

                echo "<select id='del_title' name='del_title'>";
                for ($j = 0; $j < count($query); $j++) {
                    echo "<option value=".$query[$j]['id'].">".$query[$j]['title']."</option>";
                }
                echo "</select>";
                if(!empty($_POST["publish_button"])) {
                    $p = $_POST['del_title'];
                    $delQuery = $DB->prepare("DELETE FROM `article` WHERE `id`= :p");
                    $delQuery->execute([":p" => $p]);
                    print "
                    <script language='Javascript' type='text/javascript'>
                        alert ('Удаление поста: успешно!');
                        function reload(){location = 'admin.php'};
                        setTimeout('reload()', 0);
                    </script>";
                } else "
                <script language='Javascript' type='text/javascript'>
                    alert ('Удаление поста: ошибка.');
                </script>";

                ?>
                <br>
                <input type="submit" name="publish_button" value="Удалить">
                <hr>
            </form>
    </div>

    <div class="Container">
        <h1>Добавление мероприятия</h1>
        <form method="post" novalidate>

            <label for="title">Название мероприятия</label>
            <br>
            <input type="text" name="title" required>
            <br>

            <label for="date">Дата проведения</label>
            <br>
            <input type="date" name="date" required>
            <br>

            <label for="cost">Стоимость</label>
            <br>
            <input type="text" name="cost" maxlength="10" required>
            <br>

            <label for="full_text">Полный текст</label>
            <br>
            <textarea class="TextArea" name="full_text" maxlength="200" required></textarea>
            <br>

            <input type="submit" name="publishbutton" value="Публикация">

            <?php
            $DB = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
            $DB->exec("SET NAMES utf8");
            if(!empty($_POST["publishbutton"])) {
                $add = $DB->prepare("INSERT INTO `actions` (`title`, `date`, `cost`, `full_text`) VALUES (:title, :d, :cost, :t)");
                $add->execute([":title" => $_POST['title'], ":d" => $_POST['date'], ":cost" => $_POST['cost'], ":t" => $_POST['full_text']]);
                print "<script language='Javascript' type='text/javascript'>
            alert ('Мероприятие успешно создано');
            function reload(){location = 'admin.php'}; 
            setTimeout('reload()', 0);
            </script>";
            }
            else "<script language='Javascript' type='text/javascript'>
            alert ('Ошибка: мероприятие не создано');
            </script>";

            ?>
        <hr>
        </form>
    </div>

    <div class="Container">
        <h1>Удаление мероприятия</h1>
        <form method="post">
            <label>Выберите мероприятие для удаления:</label>
            <br>
            <?php
            $DB = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
            $DB->exec("SET NAMES utf8");
            $query = $DB->query("SELECT * FROM `actions`")->fetchAll(PDO::FETCH_ASSOC);

            echo "<select id='del_action ' name='del_action'>";
            for ($j = 0; $j < count($query); $j++) {
                echo "<option value=".$query[$j]['id'].">".$query[$j]['title']."</option>";
            }
            echo "</select>";
            if(!empty($_POST["delbutton"])) {
                $p = $_POST['del_action'];
                $delQuery = $DB->prepare("DELETE FROM `actions` WHERE `id`= :p");
                $delQuery->execute([":p" => $p]);
                print "
                    <script language='Javascript' type='text/javascript'>
                        alert ('Мероприятие успешно удалено.');
                        function reload(){location = 'admin.php'};
                        setTimeout('reload()', 0);
                    </script>";
            } else "
                <script language='Javascript' type='text/javascript'>
                    alert ('Ошибка: мероприятие не удалено');
                </script>";

            ?>
            <br>
            <input type="submit" name="delbutton" value="Удалить">
            <hr>
        </form>
    </div>


    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>


</html>

      
	<?else: 
    header('Location:/login.php');
    exit;
?>

<?endif;?>
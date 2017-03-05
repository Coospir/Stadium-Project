<?php
	require_once "db.php";
    session_start();
	if(isset($_SESSION['logged_admin']) ) : ?>
    <style>
        .PanelBody {
            
        }
        
        input[type=text]{
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input[type=date]{
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
         .TextArea  {
            width: 20%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            
        }
        
        input[type=submit] {
            width: 10%;
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
            width: 30%;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    
    </style>
<html>

	<div class="LoggedAdmin" style="text-align: center;">
        <b>Вы вошли как <?php echo $_SESSION['logged_admin']->login; ?>!</b>
		<a href='/logout.php' style="color: #318034; text-align: center; text-decoration: none;"><p style="font-size: 18px;">Выйти</p></a><hr>
    </div>
    
    <div class="PanelBody">
        <h1>Добавление новостного блока</h1>
      <form method="post">

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
        <input type="submit" name="publish_button" value="Публикация">
          
        <?php 
            $DB = new PDO("mysql:dbname=Stadium_Site;host=127.0.0.1", "root", "");
              $DB->exec("SET NAMES utf8");  
            if(!empty($_POST["publish_button"])) {
              $add = $DB->prepare("INSERT INTO `article` (`title`, `full_text`, `date`) VALUES (:title, :t, :d)");
            $add->execute([":title" => $_POST['title'], ":t" => $_POST['full_text'], ":d" => $_POST['date']]);  
            print "<script language='Javascript' type='text/javascript'>
            alert ('Пост успешно создан!');
            function reload(){location = 'admin.php'}; 
            setTimeout('reload()', 0);
            </script>";
            } 
          else "<script language='Javascript' type='text/javascript'>
            alert ('Ошибка!!');
            </script>";

        ?>
          
      </form>
    </div> 
</html>

      
	<?else: 
    header('Location:/login.php');
    exit;
?>

<?endif;?>
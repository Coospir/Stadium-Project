<?php
    $pdo = new PDO('mysql:host=localhost;dbname=Stadium_Site','root','');

    function redirect($to)
    {
    	echo "<script type='text/javascript'>document.location = '".$to."';</script>";
    }

?>
<?php

    session_start(); 
    if (!isset($_SESSION['zalogowany']))
    {
    	header('Location: index.php');
		exit();
	}
    ?>
﻿<!DOCTYPE html>
<html>
    <head>
        <title>Lange - zadanie7</title> 
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    </head>
    <body>
    <?php
        echo "<p>Witaj ".$_SESSION['Imie'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
    
        ?>
        <br><br><a href="/"> Powrót do strony głównej </a></center>


    </body>
</html>
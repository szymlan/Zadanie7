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
         <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <style>
    .w3-allerta {
      font-family: "Allerta Stencil", Sans-serif;
    }
    </style>

    </head>
    <body>
    <div class="w3-container w3-black w3-center w3-allerta">
        <p class="w3-xlarge">
    <?php
        $log = $_SESSION['Login'];
        echo "<p><div style='text-align: left;'>/".$log.'</div>[ <a href="logout.php">Wyloguj się!</a> ]</p>';?></p></div>
        <form method="post" action="dodaj.php">
        Utwórz folder:
        <br><input type="text" name="folder" maxlength="40" required><br>
        <input type="submit" value="Utwórz"/>
        </form>
        <br><br><a href="/"> Powrót do strony głównej </a></center>

    </body>
</html>
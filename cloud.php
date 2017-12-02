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
    	$dbhost="serwer1783357.home.pl"; $dbuser="25516664_0000007"; $dbpassword="hosting07"; $dbname="25516664_0000007";
        $polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword, $dbname);
        mysqli_select_db ($polaczenie, $dbname);
        $log = $_SESSION['Login'];
        $rezultat = mysqli_query ($polaczenie, "SELECT * FROM logi WHERE Login='$log' order by id DESC LIMIT 1");
        while ($wiersz = mysqli_fetch_array ($rezultat))    {
        $datalog = $wiersz[1];
        $ip = $wiersz[2];}
        echo "Ostatnia nieudana próba logowania miała miejsce $datalog z adresu $ip!";
       
        ?>
        <br><br><a href="/"> Powrót do strony głównej </a></center>


    </body>
</html>

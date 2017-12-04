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
        echo "<p><div style='text-align: left;'>Witaj ".$_SESSION['Imie']."!</div> <a href='uzytkownicy/folder.php?Login=$log'>Mój katalog</a> [ <a href='logout.php'>Wyloguj się!</a> ]</p>";?></p></div>
    <?php
    	$dbhost="serwer1783357.home.pl"; $dbuser="25516664_0000007"; $dbpassword="hosting07"; $dbname="25516664_0000007";
        $polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword, $dbname);
        mysqli_select_db ($polaczenie, $dbname);
        $log = $_SESSION['Login'];
        $rezultat = mysqli_query ($polaczenie, "SELECT * FROM logi WHERE Login='$log' order by id DESC LIMIT 1");
	$ile_logowan = $rezultat->num_rows;
	if($ile_logowan>0){
        while ($wiersz = mysqli_fetch_array ($rezultat))    {
        $datalog = $wiersz[1];
        $ip = $wiersz[2];}
	echo "<span style='color:red;font-family:Allerta Stencil, Sans-serif; font-size: 16;'>Ostatnia nieudana próba logowania miała miejsce $datalog z adresu $ip!</span>";}	         
        ?>
        <br><br><a href="/"> Powrót do strony głównej </a></center>


    </body>
</html>

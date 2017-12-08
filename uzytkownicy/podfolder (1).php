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
    img{
    margin-left:30px;
    position: relaive;
    width: 80%;
    }
    </style>

    </head>
    <body>
    <div class="w3-container w3-black w3-center w3-allerta">
        <p class="w3-xlarge">
    <?php
        $log = $_SESSION['Login'];
        $pod = $_GET['podkatalog'];
        echo "<p><div style='text-align: left;'>/".$log."/".$pod."</div>[ <a href='logout.php'>Wyloguj się!</a> ]</p>";?></p></div><br>
        <div style="text-align: left; margin-left: 10px;">Wgraj plik:<br><br>
        <form action="odbierz2.php" method="POST" ENCTYPE="multipart/form-data"><div style="border-style: solid; border-color: grey; width:24%;">
        <input type="hidden" name="pod" value="<?PHP echo $pod; ?>" />
        <input type="file" name="plik"/></div><br><input type="submit" value="Wyślij plik"/></form>
        <br>
        <div class="w3-container w3-black w3-center w3-allerta">
        <p class="w3-xsmall">Twoje pliki:</p></div><br>
      <? 
        
         $files1 = array_diff(scandir($log . DIRECTORY_SEPARATOR . $pod), array('.', '..'));
        foreach($files1 as $file)
        {
            if(is_dir($pod . DIRECTORY_SEPARATOR . $file)){
                $_SESSION['podkatalog'] = $podf;
                echo "<div class='item'><a href='podfolder.php?podkatalog=$file'><img src='folder.png'><div class='tekst'>$file</div></a></div>";
            }
            else{
                echo "<div class='item'><a href='$log/$file'download='$file'><img src='plik.jpg'><div class='tekst'>$file</div></a></div>";
            }
            } 
            
        ?>
        <style>
            .item {
            vertical-align: top;
            display: inline-block;
            text-align: center;
            width: 100px;
        }
          .tekst{
            margin-left:35px;
            width: 65px;
            position: absolute;
             word-break: break-all;
        }
        </style>
        <br>
        <br><br><a href="/"> Powrót do strony głównej </a></center>

    </body>
</html>
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
        echo "<p><div style='text-align: left;'>/".$log."</div>[ <a href='logout.php'>Wyloguj się!</a> ]</p>";?></p></div><br>
        <div style="text-align: left; margin-left: 10px;">Wgraj plik:<br><br>
        <form action="odbierz.php" method="POST" ENCTYPE="multipart/form-data"><div style="border-style: solid; border-color: grey; width:328px;">
        <input type="file" name="plik"/></div><br><input type="submit" value="Wyślij plik"/></form>
        <form method="post" action="dodaj.php"> <?php
        if (isset ($_SESSION['upload'])) echo $_SESSION['upload'];
        if (isset ($_SESSION['failedupload'])) echo $_SESSION['failedupload'];
        ?><br>
        Utwórz nowy folder:<br>
        <br><input type="text" name="folder" maxlength="40" required><br><br>
		<input type="submit" value="Utwórz"/></div>
        </form><br>
       <div class="w3-container w3-black w3-center w3-allerta">
        <p class="w3-xsmall">Twoje pliki:</p></div><br>
        <? 
        
         $files1 = array_diff(scandir($log), array('.', '..'));
        foreach($files1 as $file)
        {
            if(is_dir($log . DIRECTORY_SEPARATOR . $file)){
                echo "<div class='item'><a href='podfolder.php?podkatalog=$file'><img src='folder.png'><div class='tekst'>$file</div></a></div>";
            }
            else{
                echo "<div class='item'><a href='$log/$file' download='$file'><img src='plik.jpg'><div class='tekst'>$file</div></a></div>";
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
            margin-left:38px;
            width: 65px;
            position: absolute;
             word-break: break-all;
        }
        </style>
        <br><br>
        <br><br><span style="color:blue"><a href="/"> Powrót do strony głównej</a> </span></center>

    </body>
</html>

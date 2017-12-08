<?php

    session_start();
    
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: cloud.php');
		exit();
	}

?>
﻿<!DOCTYPE html>
<html>
    <head>
        <title>Lange - zadanie7</title> 
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <link rel="stylesheet" href="styl.css">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
                <style>
                .w3-allerta {
                  font-family: "Allerta Stencil", Sans-serif;
                }
			
        form {
            text-align: center;
            vertical-align: middle;
            border: 8px solid #f1f1f1;
        }
        
        /* Full-width inputs */
        input[type=text], input[type=password] {
            width: 30%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        
        /* Set a style for all buttons */
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 30%;
        }
        
        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

                </style>
    </head>
    <body>
     <div class="w3-container w3-grey w3-center w3-allerta">
   <p class="w3-xlarge">Logowanie:</p></div>
    <form method="post" action="weryfikuj.php">
    <br>
     Login:<br><input type="text" name="login" maxlength="40"><br>
     Hasło:<br><input type="password" name="pass" maxlength="20"><br>
     <input type="submit" value="Zaloguj się"/>
    </form>
    <br> 
        <?php
            if (isset ($_SESSION['blad'])) echo $_SESSION['blad'];
            if (isset ($_SESSION['zarej'])) echo $_SESSION['zarej'];
            if (isset ($_SESSION['istlog'])) echo $_SESSION['istlog'];
            if (isset ($_SESSION['istemail'])) echo $_SESSION['istemail'];
            if (isset ($_SESSION['has'])) echo $_SESSION['has'];

        ?>
        
        <br><br><a href="rejestracja.php"> Zarejestruj sie </a></center>
        <br><br><a href="/"> Powrót do strony głównej </a></center>


    </body>
</html>

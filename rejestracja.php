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
                </style>
    </head>
    <body> 
    <div class="w3-container w3-grey w3-center w3-allerta">
    <p class="w3-xlarge">Rejestracja użytkownika:</p></div>
    <form method="post" action="zarejestruj.php">
    <br>
    
     Imię:<br><input type="text" name="name" maxlength="20" required><br>
     Nazwisko:<br><input type="text" name="lastname" maxlength="40" required><br>
     Miasto:<br><input type="text" name="city" maxlength="40" required><br>
     E-mail:<br><input type="text" name="email" maxlength="40" required><br>
     Login:<br><input type="text" name="login" maxlength="20" required><br>
     Hasło:<br><input type="password" name="pass" pattern=".{6,12}" required title="Haslo powinno miec od 6 do 12 znaków!"><br>
     Powtórz hasło:<br><input type="password" name="pass2" pattern=".{6,12}" required title="Haslo powinno miec od 6 do 12 znaków!"><br><br>
     <input type="submit" value="Zarejestruj"/>
    </form>
        <style type="text/css">
        form {
            text-align: center;
            vertical-align: middle;
            border: 8px solid #f1f1f1;
        }
        
        /* Full-width inputs */
        input[type=text], input[type=password] {
            width: 25%;
            padding: 6px 10px;
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
            width: 25%;
        }
        
        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }
        </style>
   <br> <br><br><a href="/"> Powrót do strony głównej </a></center>


    </body>
</html>
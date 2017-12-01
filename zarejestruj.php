<!DOCTYPE html>
<html>
    <head>
        <title>Lange - zadanie7</title> 
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <link rel="stylesheet" href="styl.css">

    </head>
    <body>
        <?php
            if ($_POST['pass']!=$_POST['pass2'])
            {
		        echo "Hasła muszą być takie same!"; //obsluga bledow
	        }
	        else
	        {
            $imie = $_POST['name'];
            $nazwisko = $_POST['lastname'];
    	    $miasto = $_POST['city'];
            $mail = $_POST['email'];
            $user = $_POST['login'];
            $haslo = $_POST['pass'];
            
            $dbhost="serwer1783357.home.pl"; $dbuser="25516664_0000007"; $dbpassword="hosting07"; $dbname="25516664_0000007";
            $polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
            mysqli_select_db ($polaczenie, $dbname);
            $rezultat = mysqli_query ($polaczenie, "SELECT * FROM users");
            $getmail = 'SELECT * FROM users WHERE Email="'.$mail.'"';  
            $pobierz = mysqli_query ($polaczenie, $getmail);
            $licznik = mysqli_num_rows($pobierz); 
            $getlogin = 'SELECT * FROM users WHERE Login="'.$user.'"';  
            $pobierz2 = mysqli_query ($polaczenie, $getlogin);
            $licznik2 = mysqli_num_rows($pobierz2); 
            if($licznik==1) // jesli dane ip juz jest w tabeli
            {
            echo "Błąd! Istnieje juz użytkownik zarejestrowany na podany adres e-mail!";
                }
            elseif($licznik2==1)
            {
            echo "Błąd! Istnieje juz użytkownik o podanym loginie!"; 
            }
            else{
                $dodaj=mysqli_query($polaczenie,"INSERT INTO users SET Imie='$imie', Nazwisko='$nazwisko', Miasto='$miasto', Email='$mail',Login='$user', Haslo='$haslo'"); 
            if ($dodaj){
                echo "Pomyślnie zarejestrowano użytkownika!";}
            else{
                echo "Coś poszło nie tak :( Spróbuj ponownie!";
            }}}

        ?>
   <br> <br><br><a href="/"> Powrót do strony głównej </a></center>


    </body>
</html>
   
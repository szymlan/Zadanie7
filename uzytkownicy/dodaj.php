<?php
    session_start();
    
    if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
		header('Location: folder.php');


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lange - zadanie7</title>

    </head>
    <body>
        <?php
            $log = $_SESSION['Login'];
            $katalog = $_POST['folder'];

            if (IsSet($_POST['folder'])) {
                mkdir("$log/$katalog", 0777, true);

            }   
        ?>
 </body>
</html>
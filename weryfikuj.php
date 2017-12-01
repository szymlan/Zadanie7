<?php
    setcookie('Nick', $_POST['login'],time()+24*60*60);
    setcookie('Password', $_POST['pass'],time()+24*60*60);
  session_start();

	if ((!isset($_POST['login'])) || (!isset($_POST['pass'])))
	{
		header('Location: index.php');
		exit();
	}

    $dbhost="serwer1783357.home.pl"; $dbuser="25516664_0000007"; $dbpassword="hosting07"; $dbname="25516664_0000007";
    $polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword, $dbname);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$user = $_POST['login'];
		$haslo = $_POST['pass'];
		unset($_SESSION['zarej']);
		$email = htmlentities($user, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE Login='%s' AND Haslo='%s'",
		mysqli_real_escape_string($polaczenie,$user),
		mysqli_real_escape_string($polaczenie,$haslo))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
    $result = mysqli_query ($polaczenie, "SELECT * FROM logi");
    $ip = $_SERVER["REMOTE_ADDR"];
        function ip_details($ip) {      // skrypt oparty o format JSON umożliwiajacy przyblizona geolokalizacje gosci portalu
            $json = file_get_contents ("https://ipinfo.io/{$ip}/geo");
            $details = json_decode ($json);
            return $details;} 

				$_SESSION['zalogowany'] = true;
				
				$wiersz = $rezultat->fetch_assoc();
				$_SESSION['id'] = $wiersz['id'];
                $_SESSION['Imie'] = $wiersz['Imie'];
				$_SESSION['Nazwisko'] = $wiersz['Nazwisko'];
                $_SESSION['Login'] = $wiersz['Login'];
                $_SESSION['Email'] = $wiersz['Email'];
				$name = $_SESSION['Imie'];
                $log = $_SESSION['Login'];
                $lastname = $_SESSION['Nazwisko'];
                $browser = $_SERVER['HTTP_USER_AGENT']; //dane przegladarki

                mysqli_query($polaczenie, "INSERT INTO logi VALUES ('', NOW(),'$ip', '$log', '$name', '$lastname', '$browser')"); 
				unset($_SESSION['blad']);
				$rezultat->free_result();
				header('Location: cloud.php');
				
			} else {
				    $user = $_POST['login'];
				    $ip = $_SERVER["REMOTE_ADDR"];
				    $browser = $_SERVER['HTTP_USER_AGENT'];
				    mysqli_query($polaczenie, "INSERT INTO logi VALUES ('', NOW(),'$ip', '$user', '-', '-', '$browser')");
				    $result = mysqli_query($polaczenie, "SELECT COUNT(*) FROM `logi` WHERE `ip` LIKE '$ip' AND `Data` > (now() - interval 2 minute)");
				    $count = mysqli_fetch_array($result, MYSQLI_NUM);

				    if($count[0] > 3){
				     	$_SESSION['bladlogowan'] = '<span style="color:red"> Możesz zalogować sie tylko 3 razy w ciagu 2 minut!</span>';
				     	header('Location: index.php');
					}

				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	}
	
?>

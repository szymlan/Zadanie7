<?php 
    session_start();
    $log = $_SESSION['Login'];
    $_SERVER['DOCUMENT_ROOT'] = "/z7/uzytkownicy/$log/";
    if (is_uploaded_file($_FILES['plik']['tmp_name'])) { 
        $file = $_FILES["plik"]["name"];
        unset($_SESSION['failupload']);
        $_SESSION['upload']= '<span style="color:green">Odebrano plik: '.$file.'</span>'; 
        move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$_FILES['plik']['name']); } 
        else {
        unset($_SESSION['upload']);
        $_SESSION['failupload']= "<span style='color:red'>Błąd przy przesyłaniu danych!</span>";
        } 
        header('Location: folder.php');
?>
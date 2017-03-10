<?php

session_start();
require_once 'databaseconn.php';
$database = new connDatabase();
$message = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $user_password = $_POST['password'];

    $password = md5($user_password);

    try {

        $stmt = $database->selectuser('*', 'medewerker', $username ,$password);

        if ($stmt['wachtwoord'] == $password) {
            $message="".$stmt['voorletters']." ".$stmt['achternaam']." is ingelogd.";
            echo "<script type='text/javascript'>alert('$message');</script>"; // log in
            $_SESSION['user_session'] = $username;
        } else {
            $message="gebruikersnaam of wachtwoord bestaat niet.";
            echo "<script type='text/javascript'>alert('$message');</script>"; // wrong details 
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
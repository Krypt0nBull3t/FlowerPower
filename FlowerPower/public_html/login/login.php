<?php

session_start();
require_once 'databaseconn.php';
$database = new connDatabase();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $user_password = $_POST['password'];

    $password = md5($user_password);

    try {

        $stmt = $database->selectuser('*', 'medewerker', $username ,$password);

        if ($stmt['wachtwoord'] == $password) {

            echo "ok"; // log in
            $_SESSION['user_session'] = $stmt['medewerkerscode'];
        } else {

            echo "gebruikersnaam of wachtwoord bestaat niet."; // wrong details 
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
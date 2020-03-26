<?php
session_start();
require '/var/www/public/logic/User.php';

if(!isset($_SESSION['UserConnected'])){
    $_SESSION['UserConnected'] = null;
}

require '/var/www/public/database/UserDao.php';
require '/var/www/public/logic/Utils.php';

$userDAO = new UserDao();
$utils = new Utils();

echo $utils->HashPassword($_POST['password']);

try {
    $_SESSION['UserConnected'] = $userDAO->Read($_POST['login'], $utils->HashPassword($_POST['password']));
} catch (BadUserError $e){
    echo "Erreur de user";
} catch (BadPasswordError $e){
    echo "Erreur de password";
}

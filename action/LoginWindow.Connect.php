<?php
session_start();
// require '/var/www/public/logic/User.php';
require '/var/www/public/database/UserDao.php';
require '/var/www/public/logic/Utils.php';

if(!isset($_SESSION['UserConnected'])){
    $_SESSION['UserConnected'] = null;
}

$userDAO = new UserDao();
$utils = new Utils();

try {
    $u = $userDAO->Read($_POST['login'], $utils->HashPassword($_POST['password']));
    $_SESSION['UserConnected'] = $u->save();
    header('Location: http://192.168.1.27');
} catch (BadUserError $e){
    echo "Erreur de user";
} catch (BadPasswordError $e){
    echo "Erreur de password";
}

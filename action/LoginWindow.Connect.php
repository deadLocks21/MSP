<?php
require '/var/www/public/ihm/ToolsIHM.php';
require '/var/www/public/database/UserDao.php';
require '/var/www/public/logic/Utils.php';

$userDAO = new UserDao();
$utils = new Utils();
$tIHM = new ToolsIHM();

$login = $_POST['login'];
$password = $utils->HashPassword($_POST['password']);

$tIHM->setLoginFail(0);

try {
    $u = $userDAO->Read($login, $password);

    $tIHM->setUC($u);

    header('Location: http://192.168.1.27');
} catch (BadUserError $e) {
    $tIHM->setLoginFail(1);
    $tIHM->setUC(null);

    header('Location: http://192.168.1.27/login.php');
} catch (BadPasswordError $e) {
    $tIHM->setLoginFail(2);
    $tIHM->setUC(null);

    header('Location: http://192.168.1.27/login.php');
}

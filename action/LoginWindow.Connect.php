<?php
require './ihm/ToolsIHM.php';
require './database/UserDao.php';
require './logic/Utils.php';

$userDAO = new UserDao();
$utils = new Utils();
$tIHM = new ToolsIHM();

$login = $_POST['login'];
$password = $utils->HashPassword($_POST['password']);

$tIHM->setLoginFail(0);

try {
    $u = $userDAO->Read($login, $password);

    $tIHM->setUC($u);

    header('Location: http://'.$_SERVER['HTTP_HOST'].'');
} catch (BadUserError $e) {
    $tIHM->setLoginFail(1);
    $tIHM->setUC(null);

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/login.php');
} catch (BadPasswordError $e) {
    $tIHM->setLoginFail(2);
    $tIHM->setUC(null);

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/login.php');
}

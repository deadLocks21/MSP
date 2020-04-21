<?php
require 'ihm_ToolsIHM.php';
require 'logic_Utils.php';
require 'database_UserDao.php';

$tIHM = new ToolsIHM();
$utils = new Utils();
$uDAO = new UserDao();


$user = $tIHM->getUC();

if(isset($user)){
    $tIHM->setIdActSel($id);

    $user->setPasswordHash($utils->HashPassword($_POST['password']));
    $uDAO ->Update($user);
}

header('Location: https://'.$_SERVER['HTTP_HOST'].'/');
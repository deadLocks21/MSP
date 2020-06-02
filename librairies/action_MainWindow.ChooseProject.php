<?php
require 'ihm_ToolsIHM.php';

$tIHM = new ToolsIHM();


$id = (int) $_GET['pID'];
$user = $tIHM->getUC();

if(is_int($id) AND $id != 0 AND isset($user)){
    $tIHM->setIdProjSel($id);

    header('Location: https://'.$_SERVER['HTTP_HOST'].'/activities.php?name='.$_GET['name']);
} else {
    header('Location: https://'.$_SERVER['HTTP_HOST'].'/');
}
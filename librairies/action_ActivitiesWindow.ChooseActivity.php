<?php
require 'ihm_ToolsIHM.php';

$tIHM = new ToolsIHM();


$id = (int) $_GET['id'];
$user = $tIHM->getUC();

if(is_int($id) AND $id != 0 AND isset($user)){
    $tIHM->setIdActSel($id);

    header('Location: https://'.$_SERVER['HTTP_HOST'].'/activity.php?pName='.$_GET['pName']);
} else {
    header('Location: https://'.$_SERVER['HTTP_HOST'].'/');
}
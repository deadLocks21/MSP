<?php
require 'ihm_ToolsIHM.php';

$tIHM = new ToolsIHM();


$id = (int) $_GET['id'];
$user = $tIHM->getUC();

if(is_int($id) AND $id != 0 AND isset($user)){
    $tIHM->setIdActSel($id);

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/activity.php');
} else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}
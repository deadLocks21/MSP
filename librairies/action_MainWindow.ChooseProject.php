<?php
require 'ihm_ToolsIHM.php';

$tIHM = new ToolsIHM();


$id = (int) $_GET['pID'];
$user = $tIHM->getUC();

if(is_int($id) AND $id != 0 AND isset($user)){
    $tIHM->setIdProjSel($id);

    header('Location: http://'.$_SERVER['HTTP_HOST'].'/project.php');
} else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}
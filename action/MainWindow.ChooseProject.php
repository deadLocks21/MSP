<?php
require '/var/www/public/ihm/ToolsIHM.php';

$tIHM = new ToolsIHM();


$id = (int) $_GET['pID'];
$user = $tIHM->getUC();

if(is_int($id) AND $id != 0 AND isset($user)){
    $tIHM->setIdProjSel($id);

    header('Location: http://192.168.1.27/project.php');
} else {
    header('Location: http://192.168.1.27/');
}
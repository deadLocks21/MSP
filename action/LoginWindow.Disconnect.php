<?php
require './ihm/ToolsIHM.php';

$tIHM = new ToolsIHM();

$tIHM->setUC(null);
$tIHM->setIdProjSel(null);

header('Location: http://'.$_SERVER['HTTP_HOST'].'');
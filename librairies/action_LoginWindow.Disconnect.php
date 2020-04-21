<?php
require 'ihm_ToolsIHM.php';

$tIHM = new ToolsIHM();

$tIHM->setUC(null);
$tIHM->setLoginFail(null);
$tIHM->setIdProjSel(null);

header('Location: https://'.$_SERVER['HTTP_HOST'].'');
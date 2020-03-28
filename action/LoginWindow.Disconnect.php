<?php
require '/var/www/public/ihm/ToolsIHM.php';

$tIHM = new ToolsIHM();

$tIHM->setUC(null);
$tIHM->setIdProjSel(null);

header('Location: http://192.168.1.27');
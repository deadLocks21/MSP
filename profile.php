<?php
require 'librairies/ihm_ToolsIHM.php';
require 'librairies/ihm_ProfileWindow.php';

$tIHM = new ToolsIHM();

$user = $tIHM->getUC();


if (isset($user)) {
    new ProfileWindow($user);
} else {
    header('Location: https://' . $_SERVER['HTTP_HOST'] . '/');
}
<?php
require 'ihm_ToolsIHM.php';

$lightTheme = ToolsIHM::getLightTheme();
$lightTheme = $lightTheme ? false : true;
ToolsIHM::setLightTheme($lightTheme);
echo ToolsIHM::getLightTheme();


header('Location: '.$_SERVER['HTTP_REFERER']);
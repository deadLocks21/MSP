<?php
// Classe ProfileWindow
class ProfileWindow{
    public function __construct(){
        echo $this->callPage();
    }

    private function callPage(){
        echo "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Profile</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
    <form action=\"\">
        <p>Nom :</p>
        <p><input id=\"nom\" type=\"text\"></p>
        <p>Login :</p>
        <p><input id=\"login\" type=\"text\"></p>
        <p>Password :</p>
        <p><input id=\"password\" type=\"text\"></p>
        <br />
        <p><input type=\"submit\" value=\"Connect\"><input type=\"reset\" value=\"Cancel\"></p>
    </form>
    </body>
</html>";
    }
}
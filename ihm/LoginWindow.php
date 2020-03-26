<?php
// Classe LoginWindow
class LoginWindow{
    private $UserConnected;

    public function __construct(){
        echo "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Login</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        <form action=\"\">
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

    // Getter et Setter
    public function getUserConnected()
    {
        return $this->UserConnected;
    }

    public function setUserConnected($UserConnected)
    {
        $this->UserConnected = $UserConnected;
    }


    // Méthodes
    public function Connect(){

    }

    public function Cancel(){

    }
}

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
        <form action=\"action/LoginWindow.Connect.php\" method=\"POST\">
            <p>Login :</p>
            <p><input name=\"login\" type=\"text\"></p>
            <p>Password :</p>
            <p><input name=\"password\" type=\"text\"></p>
            <br />
            <p><input type=\"submit\" value=\"Connect\"><a href=\"http://192.168.1.27\"><input type=\"button\" value=\"Cancel\"></a></p>
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
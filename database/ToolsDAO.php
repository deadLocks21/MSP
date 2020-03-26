<?php
// Class qui contient une connection à la base de données et des outils pour les class de gestion de la DB
class ToolsDAO{
    private $conn = null;

    private function openCon(){
        return new PDO('mysql:host=localhost;dbname=dbMSP', 'DaoMSP', '!MdpDeMSP21.');
    }

    private function closeCon(){
        return null;
    }

    public function query($q){
        $c = $this->openCon();

        $req = $c->query($q);
        $res = $req->fetchAll();
        $req->closeCursor();

        $c = $this->closeCon();

        return $res;
    }

    public function call($q){
        $c = $this->openCon();

        $c->query($q);

        $c = $this->closeCon();
    }
}

header('Location: http://192.168.1.27');
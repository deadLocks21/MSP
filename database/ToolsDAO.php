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

    public function query($q, $p){
        $c = $this->openCon();

        $req = $c->prepare($q);
        $req->execute($p);

        $res = $req->fetchAll();
        $req->closeCursor();

        $c = $this->closeCon();

        return $res;
    }

    public function call($q, $p){
        $c = $this->openCon();

        $r = $c->prepare($q);
        $r->execute($p);

        $c = $this->closeCon();
    }
}
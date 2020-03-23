<?php
// Class qui contient une connection à la base de données et des outils pour les class de gestion de la DB
class ToolsDAO{
    private $conn = null;

    private function openCon(){
        $this->conn = new PDO('mysql:host=localhost;dbname=dbMSP', 'DaoMSP', '!MdpDeMSP21.');

    }

    private function closeCon(){
        $this->conn = null;
    }

    public function query($q){
        $this->openCon();

        $resQuery = $this->conn->query($q);
        $res = $resQuery->fetchAll();
        $resQuery->closeCursor();

        $this->closeCon();
        return $res;
    }
}

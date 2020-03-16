<?php
require 'DaoError.php';
require 'User.php';

// Classe gérant le stockage dans le SGBD des objets User
class UserDao {
    private function connection(){
        $conn = null;

        try {
            $conn = new PDO('mysql:host=localhost;dbname=dbMSP', 'DaoMSP', '!MdpDeMSP21.');
        } catch (PDOException $e) {
            throw new DataBaseError();
        }

        return $conn;
    }

    private function construireUser($info){
        $user = null;
        $c = $this->connection();

        $queryForName = 'SELECT * FROM Utilisateur NATURAL JOIN Technicien WHERE LOGIN=\''.$info['LOGIN'].'\';';

        // On récupère les infos de l'utilisateur dont son nom
        echo $queryForName;
        $rowInfoUser = $c->query($queryForName);
        $infoUser = $rowInfoUser->fetchAll();
        $rowInfoUser->closeCursor();


        // Création de l'objet User
        $user = new User($info['ID']);

        $user->setName($infoUser[0]['nom']);
        $user->setLogin($info['LOGIN']);
        $user->setPasswordHash($info['PASSWORD']);

        return $user;
    }

    public function Read(string $login, string $password){
        $res = null;
        $conn = $this->connection();

        $ligneUser = $conn->query("SELECT * FROM Utilisateur WHERE LOGIN='$login';");
        $infoUser = $ligneUser->fetchAll();
        $ligneUser->closeCursor();

        $nbrDeUser = count($infoUser);

        if($nbrDeUser == 1){
            if($infoUser[0]['LOGIN'] == $login){
                if ($infoUser[0]['PASSWORD'] == $password){
                    $res = $this->construireUser($infoUser[0], $conn);
                }
            }
        } else {
            throw new BadUserError();
        }



        return $res;
    }

    public function Update(User $user){

    }
}

$u = new UserDao();
$user = $u->Read('cmeunier','746F746F');

echo 'id = '.$user->getID().'<br />';
echo 'name = '.$user->getName().'<br />';
echo 'login = '.$user->getLogin().'<br />';
echo 'hash = '.$user->getPasswordHash().'<br />';
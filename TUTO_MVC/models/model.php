<?php

abstract class models
{
    private static $_bdd;
    // INSTANCIE LA CONNEXION A LA BDD 

    private static function setBdd()
    {
        self::$_bdd = new PDO('mysql:host=localhost;dbname=tplivres;charset=utf8','root','root');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    // RECUPERE LA CONNEXION A LA BDD 
    protected function getBdd()
    {
        if(self::$_bdd==null)
            $this->setBdd();
        return self::$_bdd;
    }

    protected function getAll($table,$obj)
    {
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM' .$table. 'ORDER BY id desc');
    $req->execute();
    while($data = $req->fetch(PDO::FETCH_ASSOC))
    {
        $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
    }

}



<?php

require_once("./models/pdo.model.php");
class CharactersManager extends Model
{
    public function getCharacters()
    {
        $req = "SELECT * FROM characters";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    public function getTypes()
    {
        $req = "SELECT * FROM types ORDER BY name asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $types;
    }

    public function getRaces(){
        $req = "SELECT * FROM races ORDER BY name asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $races = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $races;
    
    }
}

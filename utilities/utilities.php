<?php

define("mysql", "localhost");
define("dbname", "characters_manager");
define("user", "root");
define("mdpbd", "");
function setDB()
{
    try {
        $db = new PDO(
            "mysql:host=" . mysql . ";dbname=" . dbname,
            user,
            mdpbd,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]

        );
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // pour utiliser LIMIT
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}
function showArray($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function getCharacters()
{
    $req = "SELECT * FROM characters";
    $stmt = setDB()->prepare($req);
    $stmt->execute();
    $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $infos;
}
function getOneCharacterById($id)
{
    $req0 = "SELECT * FROM characters WHERE id=:id";
    $stmt0 = setDB()->prepare($req0);
    $stmt0->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt0->execute();
    $infos = $stmt0->fetch(PDO::FETCH_ASSOC);
    $stmt0->closeCursor();
    return $infos;
}
function getTypes()
{
    $req = "SELECT * FROM type_of";
    $stmt = setDB()->prepare($req);
    $stmt->execute();
    $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $types;
}

function getRaces()
{
    $req2 = "SELECT * FROM races";
    $stmt2 = setDB()->prepare($req2);
    $stmt2->execute();
    $people = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $stmt2->closeCursor();
    return $people;
}



<?php


require_once("./models/Characters.model.php");
class MainController
{

    public $charactersManager;

    public function __construct()
    {
        $this->charactersManager = new CharactersManager();
    }

    public function homePage()
    {
        $characters = $this->charactersManager->getCharacters();
        require_once("./views/home.view.php");
    }

    public function createCharacter()
    {
        $types = $this->charactersManager->getTypes();
        $races = $this->charactersManager->getRaces();
        require_once("./views/create.view.php");
    }

    public function validationCreation($name,  $race, $type, $health, $power)
    {
        $avatar = $type . ".jpg";
        // echo $name, $race,$type,  $health, $power, $avatar;
        // $this->charactersManager->createCharacterDB($name, $race, $type,  $health, $power, $avatar);
        if (
            $this->charactersManager->createCharacterDB($name,  $race, $type, $health, $power, $avatar)
        ) {
            Tools::addAlertMessage("Le personnage " . $name . " a bien été créé.", "alert-success");
            header("Location: ./home");
        } else {
            Tools::addAlertMessage("Le personnage " . $name . " n'a pas été créé.", "alert-danger");
            header("Location: ./create");
        }
    }

    public function deleteCharacter($id)
    {
        if ($this->charactersManager->deleteCharacterDB($id)) {
            Tools::addAlertMessage("La suppression est effectuée", "alert-success");
        } else {
            Tools::addAlertMessage("a suppression a échoué", "alert-danger");
        }
        header("Location: ./home");
    }

    public function updateCharacter($id)
    {
        $character = $this->charactersManager->getOneCharacter($id);
        $types = $this->charactersManager->getTypes();
        $races = $this->charactersManager->getRaces();
        require_once("./views/update.view.php");
    }

    public function validationUpdate($id, $name, $race, $type,  $health, $power) {
        $avatar = $type . ".jpg";
        if (
            $this->charactersManager->validationUpdateDB($id, $name,  $race, $type, $health, $power, $avatar)
        ) {
            Tools::addAlertMessage("Le personnage " . $name . " a bien été mis à jour.", "alert-success");
            header("Location: ./home");
        } else {
            Tools::addAlertMessage("Le personnage " . $name . " n'a pas été mis à jour.", "alert-danger");
            header("Location: ./create");
        }
    }

    public function errorPage()
    {
        require_once("./views/error.view.php");
    }
}

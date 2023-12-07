<?php 


require_once("./models/Characters.model.php");
class MainController{

    public $charactersManager;

    public function __construct(){
        $this->charactersManager = new CharactersManager();
    }

    public function homePage(){
        $characters = $this->charactersManager->getCharacters();
        require_once("./views/home.view.php");
    }

    public function createCharacter(){
        $types = $this->charactersManager->getTypes();
        $races = $this->charactersManager->getRaces();
        require_once("./views/create.view.php");
    }

    public function updateCharacter(){
        $characters = $this->charactersManager->getCharacters();
        require_once("./views/update.view.php");
    }

    public function deleteCharacter(){
        $characters = $this->charactersManager->getCharacters();
        require_once("./views/delete.view.php");
    }

    public function errorPage(){
        require_once("./views/error.view.php");
    }


}
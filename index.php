
<?php

session_start();
// require_once("./controllers/Controller.php");
// require_once("./models/Users.model.php");
// require_once("./models/Avis.model.php");

// $controller = new Controller();
// $usersManager = new UsersManager();
// $avisManager = new CommentsManager();

require_once("./controllers/Tools.controller.php");
require_once("./controllers/Main.controller.php");
$mainController = new MainController();



try {
    if (!isset($_GET['page'])) {  // si pas d'url, on va sur la page d'accueil
        $mainController->homePage();
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));   // on découpe l'url à chaque "/", on récupère les morceaux d'url pour nous diriger
        $page = $url[0];

        switch ($url[0]) {

            case "home":   // on est sur la page d'accueil, on voit tous les personnages
                $mainController->homePage();
                break;
            case "create";  // on est sur la page de creation d'un nouveau personnage
                $mainController->createCharacter();
                break;
            case "update";
                $controller->updateCharacter();
                break;
            case "validationCreation";
                if (empty($_POST['name']) || empty($_POST['type']) || empty($_POST['race']) || empty($_POST['health']) || empty($_POST['power'])) {
                    Tools::addAlertMessage("Veuillez remplir tous les champs.");
                    header("Location: ./create");
                } else {
                    $name = htmlentities($_POST['name']);
                    $type = htmlentities($_POST['type']);
                    $race = htmlentities($_POST['race']);
                    $health = htmlentities($_POST['health']);
                    $power = htmlentities($_POST['power']);
                    $mainController->validationCreation($name,$race, $type,  $health, $power);
                }
                break;
            case "delete";
                $controller->deleteCharacter();
                break;

            default:
                throw new Exception("La page demandée n'existe pas...");
        }
    }
} catch (Exception $e) {
    $error = $e->getMessage();
    // include("./views/error.view.php");
}


<?php
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

            case "home":
                $mainController->homePage();
                break;
            case "create";
            $mainController->createCharacter();
                break;
            case "update";
                $controller->updateCharacter();
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

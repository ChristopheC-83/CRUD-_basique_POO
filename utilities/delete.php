<?php

include_once "./utilities.php";


if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $req = "DELETE FROM characters WHERE id = :id";
    $stmt = setDB()->prepare($req);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    header('Location: ../index.php');
    exit();
} else {
    echo "ID non spécifié";
}

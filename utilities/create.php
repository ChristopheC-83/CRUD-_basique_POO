<?php


include_once "./utilities.php";

// showArray($_POST);
$name = htmlentities($_POST['name']);
$type = htmlentities($_POST['type']);
$race = htmlentities($_POST['people']);
$pv = htmlentities($_POST['pv']);
$power = htmlentities($_POST['atk']);
$avatar = htmlentities($_POST['type']) . ".jpg";

$req = "INSERT INTO characters 
(name, type, race, pv, power, avatar) 
values (:name, :type, :race, :pv, :power, :avatar) 
";
$stmt = setDB()->prepare($req);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':type', $type, PDO::PARAM_STR);
$stmt->bindParam(':race', $race, PDO::PARAM_STR);
$stmt->bindParam(':pv', $pv, PDO::PARAM_INT);
$stmt->bindParam(':power', $power, PDO::PARAM_INT);
$stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
$stmt->execute();
$infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();


header('location: ../index.php');

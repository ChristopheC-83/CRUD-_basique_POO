<?php
$title = "Accueil";
ob_start();
?>
<div class="container pt-3">
    <h3 class="text-center bg-dark text-light p-4 rounded-2 shadow mb-2">Liste des personnages</h3>
</div>
<div class=" flex-grow-1 d-flex container">


    <div class="row container mx-auto w-100">

        <?php foreach ($characters as $character) : ?>

            <div class="col-3 mb-3">
                <div class="card shadow-lg ">
                    <img src="./public/images/avatars/<?= $character['avatar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4"><?= $character['name'] ?></h5>
                        <p class="card-text"><b>ID :</b> <?= $character['id'] ?></p>
                        <p class="card-text"><b>Type :</b> <?= $character['type'] ?></p>
                        <p class="card-text"><b>Race :</b> <?= $character['race'] ?></p>
                        <p class="card-text"><b>Health :</b> <?= $character['health'] ?> PV</p>
                        <p class="card-text"><b>Power :</b> <?= $character['power'] ?> Atk</p>
                        <div class="d-flex justify-content-evenly w-100">
                            <form action="./update" method="POST">
                                <input type="hidden" name='id' value=<?= $character['id'] ?>>
                                <button class="btn btn-success <?= ($character['name'] === "kiki") ? "disabled" : '' ?>">Modify</button>
                            </form>
                            <form action="delete" method="POST">
                                <input type="hidden" name='id' value=<?= $character['id'] ?>>
                                <button class="btn btn-danger 
                                <?= ($character['name'] === "kiki") ? "disabled" : '' ?>">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</div>


<?php
$content = ob_get_clean();
require_once("./views/template.php");
?>
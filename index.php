<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:100,400,700,900" rel="stylesheet" />
    <title>PHP by Rocket</title>
</head>

<body class="d-flex flex-column min-vh-100 roboto-font bg-light">


    <div class="content flex-grow-1 d-flex flex-column overflow-x-hidden">

        <?php include_once "./utilities/utilities.php"  ?>
        <?php include_once "./components/navbar.php"  ?>
        <?php
        $characters = getCharacters();
        // showArray($characters);
        // showArray($characters[1]);
        // showArray($characters[0]['name']);
        ?>

        <div class="container pt-3">
            <h3 class="text-center bg-dark text-light p-4 rounded-2 shadow mb-2">Liste des personnages</h3>
        </div>
        <div class=" flex-grow-1 d-flex container">

            <div class="row container mx-auto w-100">
                <!-- <div class="col-3 mb-3">
                    <div class="card shadow-lg ">
                        <img src="./avatars/chevalier.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4">Perso Test</h5>
                            <p class="card-text"><b>Type :</b> chevalier</p>
                            <p class="card-text"><b>Race :</b> humain</p>
                            <p class="card-text"><b>Points de Vie :</b> 99 PV</p>
                            <p class="card-text"><b>Puissance :</b> 9 Atk</p>
                            <div class="d-flex justify-content-evenly w-100">
                                <button class="btn btn-success ">Modifier</button>
                                <button class="btn btn-danger ">Supprimer</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <?php foreach ($characters as $character) : ?>
                    
                    <div class="col-3 mb-3">
                        <div class="card shadow-lg ">
                            <img src="./avatars/<?= $character['avatar'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4"><?= $character['name'] ?></h5>
                                <p class="card-text"><b>Type :</b> <?= $character['type'] ?></p>
                                <p class="card-text"><b>Race :</b> <?= $character['race'] ?></p>
                                <p class="card-text"><b>Points de Vie :</b> <?= $character['PV'] ?> PV</p>
                                <p class="card-text"><b>Puissance :</b> <?= $character['power'] ?> Atk</p>
                                <div class="d-flex justify-content-evenly w-100">
                                    <form action="./modify.php" method="POST">
                                        <input type="hidden" name='id' value=<?= $character['id'] ?>>
                                        <button class="btn btn-success ">Modifier</button>
                                    </form>
                                    <form action="./utilities/delete.php" method="POST">
                                        <input type="hidden" name='id' value=<?= $character['id'] ?>>
                                        <button class="btn btn-danger ">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            </div>
        </div>
    </div>
    <?php include_once "./components/footer.php"  ?>



</body>

</html>
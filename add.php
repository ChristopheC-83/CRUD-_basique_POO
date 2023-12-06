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



    <div class="content flex-grow-1 d-flex flex-column">

        <?php include_once "./utilities/utilities.php"  ?>
        <?php include_once "./components/navbar.php"  ?>
        <?php
        $types = getTypes();
        $people = getRaces();
        // showArray($types);
        // showArray($people);
        ?>


        <div class="container pt-3">
            <h3 class="text-center bg-dark text-light p-4 rounded-2 shadow mb-2">Ajouter un personnage</h3>
        </div>

        <div class=" flex-grow-1 d-flex container">
            <div class="row container w-100">
                <form class="w-75 mx-auto" action="./utilities/create.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select form-select-lg mb-3" name='type' id='type'>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?= $type['class'] ?>"><?= $type['class'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="people" class="form-label">Race</label>
                        <select class="form-select form-select-lg mb-3" name='people' id='people'>
                            <?php foreach ($people as $race) : ?>
                                <option value="<?= $race['people'] ?>"><?= $race['people'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pv" class="form-label">Points de Vie</label>
                        <input type="number" class="form-control" id="pv" name="pv">
                    </div>
                    <div class="mb-3">
                        <label for="atk" class="form-label">Puissance</label>
                        <input type="number" class="form-control" id="atk" name="atk">
                    </div>
                    <button type="submit" class="btn btn-primary">Création</button>
                </form>
            </div>
        </div>
    </div>



    <?php include_once "./components/footer.php"  ?>

</body>

</html>
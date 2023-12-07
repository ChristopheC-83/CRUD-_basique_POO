<?php
$title = "Création";
ob_start();
?>
 <div class="container pt-3">
            <h3 class="text-center bg-dark text-light p-4 rounded-2 shadow mb-2">Character Creation</h3>
        </div>

<div class=" flex-grow-1 d-flex container">
            <div class="row container w-100">
                <form class="w-75 mx-auto" action="./validationCreation.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select form-select-lg mb-3" name='type' id='type'>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?= $type['name'] ?>"><?= $type['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="race" class="form-label">Race</label>
                        <select class="form-select form-select-lg mb-3" name='race' id='race'>
                            <?php foreach ($races as $race) : ?>
                                <option value="<?= $race['name'] ?>"><?= $race['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="health" class="form-label">Health</label>
                        <input type="number" class="form-control" id="health" name="health">
                    </div>
                    <div class="mb-3">
                        <label for="power" class="form-label">Power</label>
                        <input type="number" class="form-control" id="power" name="power">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>




<?php
$content = ob_get_clean();
require_once("./views/template.php");
?>
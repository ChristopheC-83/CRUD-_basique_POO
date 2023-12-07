<?php
$title = "MAJ";
ob_start();
?>






<?php
$content = ob_get_clean();
require_once("./views/template.php");
?>
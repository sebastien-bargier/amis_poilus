<?php ob_start();  ?>

<h1>Page erreur</h1>

<div class=" alert-danger">
    <?= $errorMessage ?>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      
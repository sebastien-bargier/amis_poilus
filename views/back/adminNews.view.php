<?php ob_start();  ?>

<h1>Page de gestion des news</h1>

<div class="page-admin">
    <a href="?page=genererNewsAdminAjout" class="btn btn-admin">Ajouter</a>
    <a href="?page=genererNewsAdminModif" class="btn btn-admin">Modifier</a>
    <a href="?page=genererNewsAdminSup" class="btn btn-admin">Supprimer</a>
</div>

<?php if($alert !== ""){ ?>
<div class="alert-danger">
    <?= $alert ?>
</div>
<?php } ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
<?php ob_start();  ?>

<h1>Page d'administration du site</h1>
<div class="page-admin">
    <div>
        <a href="?page=genererNewsAdmin" class="btn btn-admin">Gestion des News </a>
    </div>
    <div class="form-group">
        <form method="POST" action="">
            <input type='hidden' name='deconnexion' value="true" />
            <input type="submit" class="btn" value="se déconnecter" />
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      
<?php ob_start();  ?>

<div class="page-admin">
    <a href="?page=genererNewsAdminModif" class="btn btn-admin">Modifier</a>
    <a href="?page=genererNewsAdminSup" class="btn btn-admin">Supprimer</a>
</div>

<h1>Ajout d'une news</h1>

<div class="formulaire">
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <div class="form-group">
                <label for="titreActu">Titre de l'actualité : </label>
                <input type="text" class="form-control" name="titreActu" id="titreActu" required>
            </div>
            <div class="form-group">
                <label for="typeActu">Type d'actualité : </label>
                <select name="typeActu" id="typeActu" class="form-control">
                    <?php foreach($typeActualites as $type) :?>
                        <option value="<?= $type['id_type_actualite'] ?>"><?= $type['libelle_actualite'] ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="contenuActu">Contenu de l'actualité : </label>
            <textarea class="form-control" id="contenuActu" name="contenuActu" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="imageActu">Image : </label>
            <input type="file" class="form-control" name="imageActu" id="imageActu">
        </div>
        <div>
            <input type="submit" value="Valider" class="btn">
        </div>
    </form>
</div>

<?php if($alert !== ""){ ?>
<div class="alert-danger">
    <?= $alert ?>
</div>
<?php } ?>

<?php if($alertSuccess !== ""){ ?>
<div class="alert-succes">
    <?= $alertSuccess ?>
</div>
<?php } ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      
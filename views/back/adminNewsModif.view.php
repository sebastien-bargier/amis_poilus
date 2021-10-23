<?php ob_start();  ?>

<div class="page-admin">
    <a href="?page=genererNewsAdminAjout" class="btn btn-admin">Ajouter</a>
    <a href="?page=genererNewsAdminSup" class="btn btn-admin">Supprimer</a>
</div>

<h1>Modification d'une news</h1>

<div class="formulaire">
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" value="2" name="etape">
    <div class="form-group">
        <label for="typeActu">Type d'actualité : </label>
        <select name="typeActu" id="typeActu" class="form-control" onchange="submit()">
            <option></option>
            <?php foreach($typeActualites as $type) :?>
                <option value="<?= $type['id_type_actualite'] ?>"
                <?php if(isset($_POST['typeActu']) && $_POST['typeActu'] === $type['id_type_actualite']) echo "selected" ?>>
                <?= $type['libelle_actualite'] ?> 
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    </form>
</div>

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=2) {?>
<div class="formulaire">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="etape" value="3">
        <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>">
            <div class="form-group">
            <label for="actualites">Actualités : </label>
            <select name="actualites" id="actualites" class="form-control" onchange="submit()">
                <option></option>
                <?php foreach($data['actualites'] as $actualite) :?>
                    <option value="<?= $actualite['id_actualite'] ?>"
                    <?php if(isset($_POST['actualites']) && $_POST['actualites'] === $actualite['id_actualite']) echo "selected"?>>
                        <?= $actualite['id_actualite']. " - " . $actualite['libelle_actualite'] ?> 
                    </option>
                <?php endforeach; ?>
            </select>
            </div>
        </form>
</div>
<?php }?>

<h1>Les informations de l'actualité : </h1>
<?php if(isset($_POST['etape']) && (int)$_POST['etape']>=3){ ?>
<div class="formulaire">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="etape" value="4">
        <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>">
        <input type="hidden" name="actualites" value="<?= $_POST['actualites'] ?>">
        <div class="form-group">
            <label for="titreActu">Titre de l'actualité : </label>
            <input type="text" class="form-control" name="titreActu" id="titreActu" value="<?= $data['actualite']['libelle_actualite'] ?>" required>
        </div>
        <div class="form-group">
            <label for="typeActu">Type d'actualité : </label>
            <select name="typeActu" id="typeActu" class="form-control">
                <?php foreach($typeActualites as $type) :?>
                    <option value="<?= $type['id_type_actualite'] ?>"
                        <?php if($data['actualite']['id_type_actualite'] === $type['id_type_actualite']) echo "selected"?>>
                        <?= $type['libelle_type'] ?> 
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="contenuActu">Contenu de l'actualité : </label>
            <textarea class="form-control" id="contenuActu" name="contenuActu" required><?= $data['actualite']['contenu_actualite'] ?></textarea>
        </div>
        <img src="public/sources/images/<?= $data['actualite']['url_image'] ?>" alt="<?= $data['actualite']['libelle_image'] ?>">
        <div class="form-group">
            <label class="image" for="imageActu">Image : </label>
            <input type="file" class="form-control-file" name="imageActu" id="imageActu">
        </div>
        <div class="page-admin">
            <input type="submit" value="valider" class="btn">
        </div>
    </form>
</div>
<?php } ?>

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

            
      
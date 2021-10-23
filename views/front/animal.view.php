<?php ob_start();  ?>

<?php 
ob_start(); 
?>

<h1>Fiche de <?= $animal['nom'] ?></h1>

<div class="grid-item">
<img class="image-animal" src="public/sources/images/<?= $images['image']['url_image'] ?>" alt="<?= $images['libelle_image'] ?>" />
    <div class="info-animal">
        <p class="info-localisation"><?= $animal['localisation'] ?></p>
        <div class="entente_animal">
          <p>chien : <?= $animal['entente_congeneres'] ?></p>
          <p>chats : <?= $animal['entente_chats'] ?></p>
          <p>enfants : <?= $animal['entente_enfants'] ?></p>
        </div>
        <div class="info-age-sexe">
          <p>Âge : <?= $animal['age']?></p>
          <p>Race : <?= $animal['race']?></p>
          <p>Sexe : <?= $animal['sexe'] ?></p>
          <p>Poids : <?= $animal['poids'] ?></p>
        </div>

        <div class="trait-caractere">
          <?php foreach ($caracteres as $caractere) {?>
          <p class="badge"><?= $caractere['libelle_caractere'] ?></p>
          <?php } ?>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
       
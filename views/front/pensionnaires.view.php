<?php 
ob_start();

?>
<h1>À l'adoption</h1>
<div class="grid-container">

<?php foreach($animaux as $animal) : ?>
<div class="grid-item">
  <img class="image-animal" src="public/sources/images/<?= $animal['image']['url_image'] ?>" alt="<?= $image['libelle_image'] ?>">

  <div class="info-entente-animal">
      <h3><?= $animal['nom']?></h3>
      <div class="entente_animal">
        <p>chien : <?= $animal['entente_congeneres'] ?></p>
        <p>chats : <?= $animal['entente_chats'] ?></p>
        <p>enfants : <?= $animal['entente_enfants'] ?></p>
      </div>
      <div class="info-animal">
        <p>
        Âge : <?= $animal['age']?><br />
        Race : <?= $animal['race']?><br />
        Sexe : <?= $animal['sexe'] ?><br />
        Poids : <?= $animal['poids'] ?>
      </p>
      </div>
      
      <div class="trait-caractere">
        <?php foreach ($animal['caracteres'] as $caractere) {?>
        <p class="badge"><?= $caractere['libelle_caractere'] ?></p>
        <?php } ?>
      </div>

      <p><?= $animal['description'] ?></p>
      
      <a href="?page=animal&idAnimal=<?= $animal['id_animal'] ?>" class='btn'>Visiter ma page </a>
    </div>
  </div>

<?php endforeach; ?>
</div>
<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
<?php ob_start(); ?>
<h1 class="titre-conseils">Les évenements</h1>

<?php foreach($actualites as $actualite) : ?>


<div class='post-actu'>
    <div class='actu'>
        <p>Posté le : <?= date("d/m/Y", strtotime($actualite['date_publication_actualite'])) . ' de ' .$actualite['libelle_actualite'] . ' ' ?></p>
    </div>

    <div class='publication-actu'>
    <img class="image-animal" src="public/sources/images/<?= $actualite['image']['url_image'] ?>" alt="<?=$actualite['image']['libelle_image']?>">
        <p><?= $actualite['contenu_actualite'] ?></p>
    </div>
</div>

<?php endforeach; ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>


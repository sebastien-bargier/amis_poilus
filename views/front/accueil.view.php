<?php 
ob_start(); 

?>
<h1>Ils ont besoin de vous!</h1>

<div class="grid-container">

  <div class="grid-item-acceuil">
  <h2>Nouvelles des adoptés</h2> 
    <div class="bloc-article">
        <img class="image-animal" src="public/sources/images/<?= $news['url_image'] ?>" alt="<?= $news['libelle_image'] ?>">
        <div class="article">
            <h3><?= $news['libelle_actualite'] ?></h3>
            <p><?= $news['contenu_actualite'] ?></p>
            <a href="?page=actus&type=1" class='btn btn-acceuil'>visitez la page</a>
        </div>
    </div>
  </div>

       
  <div class="grid-item-acceuil">
    <h2>Évenements</h2>
    <div class="bloc-article">
      <img class="image-animal" src="public/sources/images/autres/calendrier-evenement.png">
      <div class="article">
          <h3>Titre</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, non! Animi molestias quasi dignissimos explicabo minima eos dolorum debitis tenetur consequatur ab. Dolor beatae quas voluptatum rem explicabo tempora corporis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius doloribus labore dolores iste quo corporis eos possimus esse nihil quam, qui quaerat! Autem, sint?

          </p>

          <a href="?page=evenement" class='btn btn-acceuil'>visitez la page</a>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            
      
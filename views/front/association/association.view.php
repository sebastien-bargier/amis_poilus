<?php ob_start(); ?>

<div class="section">
    <div>
        <img class="logo-page-asso" src="public/sources/logo/logo_amis_poilus.png" alt="image logo Protection animal">
    </div>
    <div class="article">
        <h1>Association de protection animal <br /> Bouches-du-Rhône (13)
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis dolor similique quia autem, tempora necessitatibus fuga nulla libero vel non fugit, iure architecto impedit, commodi rerum incidunt ad provident reprehenderit.
        </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis dolor similique quia autem, tempora necessitatibus fuga nulla libero vel non fugit, iure architecto impedit, commodi rerum incidunt ad provident reprehenderit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius exercitationem tenetur dolores ipsam, aperiam illum sapiente itaque recusandae saepe doloribus quidem aliquam corporis, cum commodi obcaecati ratione odio vero magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore porro, sunt temporibus, vitae earum pariatur assumenda cum culpa fugiat nam quam. Quasi eaque, provident aperiam consequuntur odit nobis quia ullam?
        </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis dolor similique quia autem, tempora necessitatibus fuga nulla libero vel non fugit, iure architecto impedit, commodi rerum incidunt ad provident reprehenderit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis odio iste, veritatis ut magnam ab saepe officia similique corporis quod ipsam accusantium nam asperiores tempora nesciunt sed, ratione maxime excepturi?
        </p>
        <p>
        <a href="?page=contact" class='btn'>Rejoignez-nous !</a>
        </p>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>   
      
<div class="burger">
                        <span> </span>
</div>

<nav class="menu">            

    <ul>
        <li><a href="?page=accueil">Accueil</a></li>

        <li>
            <a href="#">Qui sommes-nous?</a>
            <ul class="dropdown-child">
                <li><a href="?page=association">L'association</a></li>
                <li><a href="?page=contact">Contact</a></li>
            </ul>        
        </li>

        <li>
            <a class="menu-open" href="#">Les animaux</a>
            <ul class="dropdown-child">
                <li><a href="?page=pensionnaires&idstatut=1">A l'adoption</a></li>
            </ul>        
        </li>

        <li>
            <a href="#">Actualités</a>
            <ul class="dropdown-child">
                <li><a href="?page=evenements&type=2">Evenements</a></li>
                <li><a href="?page=actus&type=1">Nouvelles des adoptés</a></li>
                <?php if(Securite::verifAccessSession()){ ?>
                    <a class="menu-admin" href="?page=genererNewsAdmin">Gestion des news</a>
                <?php } ?>
            </ul>        
        </li>

        <li>
            <a href="#">Conseils</a>
            <ul class="dropdown-child">
                <li><a href="?page=temperatures">Températures</a></li>
            </ul>        
        </li>
        <!-- je creer la page login et je l'inclus ci-dessous -->
        <li><a href="?page=login">Connexion</a>       
        </li>
    </ul>
</nav>




<script src="public/js/menuBurger.js"></script>
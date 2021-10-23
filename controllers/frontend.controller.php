<?php 
require_once "models/animal.dao.php";
require_once "models/actualite.dao.php";
require_once "models/image.dao.php";
require_once "config/config.php";

function getPagePensionnaires(){
    $title = "À l'adoption";

    if(isset($_GET['idstatut']) && !empty($_GET['idstatut'])){
        $idStatut = Securite::secureHTML($_GET['idstatut']);
        $animaux = getAnimalFromStatut($idStatut);

        foreach($animaux as $key => $animal){
            $image = getFirstImageAnimal($animal['id_animal']);
            $animaux[$key]['image'] = $image;
    
            $caracteres = getCaracteresFromAnimal($animal['id_animal']);
            $animaux[$key]['caracteres'] = $caracteres;
        }
    
        require_once "views/front/pensionnaires.view.php";
    } else {
        throw new Exception("L'id du statut n'est pas renseigné, vous ne pouvez pas accéder à la page");
    }
   
}

function getPageAccueil(){
    $title = "Acceuil";

    $animaux = getAnimalFromStatut(1);
    foreach($animaux as $key => $animal){
        $image = getFirstImageAnimal($animal['id_animal']);
        $animaux[$key]['image'] = $image;
    }
    $news = getLastNews();

    require_once "views/front/accueil.view.php";
}

function getPageAssociation(){
    $title = "L'association";
    require_once "views/front/association/association.view.php";
}

function getPageNouvellesAdoptes(){
    $title = "Nouvelles des adoptés";
    require_once "views/front/actualites/actus.view.php";
}

function getPageTemperatures(){
    $title = "Conseil température";
    require_once "views/front/articles/temperatures.view.php";
}

function getPageEducateur(){
    $title = "Education";
    require_once "views/front/articles/educateur.view.php";
}

function getPageContact(){
    $title = "Page contact";
    require_once "views/front/contact/contact.view.php";
}

function getPageActus(){
    $title = "Page acualités";
    if(isset($_GET['type']) && !empty($_GET['type'])){
        $typeNews = Securite::secureHTML($_GET['type']);
        $actualites = getActualitesFromBD($typeNews);
        foreach($actualites as $key => $actualite){
            $image = getImageActualitesFromBD($actualite['id_image']);
            $actualites[$key]["image"] = $image;
        }
        
        require_once "views/front/actualites/actus.view.php";
    } else {
        throw new Exception("Le type d'actualité n'est pas renseigné, vous ne pouvez pas accéder à la page");
    }
}

function getPageEvenements(){
    $title = "Page des évenements";
    if(isset($_GET['type']) && !empty($_GET['type'])){
        $typeNews = Securite::secureHTML($_GET['type']);
        $actualites = getActualitesFromBD($typeNews);
        foreach($actualites as $key => $actualite){
            $image = getImageActualitesFromBD($actualite['id_image']);
            $actualites[$key]["image"] = $image;
        }
        
        require_once "views/front/actualites/evenements.view.php";
    } else {
        throw new Exception("Le type d'actualité n'est pas renseigné, vous ne pouvez pas accéder à la page");
    }
}
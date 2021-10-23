<?php
session_start();
require_once "controllers/backend.controller.php";
require_once "controllers/frontend.controller.php";
require_once "config/Securite.class.php";


try {
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = Securite::secureHTML($_GET['page']);
        switch ($page){
            case "accueil": getPageAccueil();
            break;
            case "pensionnaires": getPagePensionnaires();
            break;
            case "association": getPageAssociation();
            break;
            case "nouvellesDesAdoptes": getPageNouvellesAdoptes();
            break;
            case "temperatures": getPageTemperatures();
            break;
            case "education": getPageEducateur();
            break;
            case "contact": getPageContact();
            break;
            case "actus": getPageActus();
            break;
            case "evenements": getPageEvenements();
            break;
            case "animal": getPageAnimal();
            break;
            case "login": getPageLogin();
            break;
            case "admin": getPageAdmin();
            break;
            case "genererNewsAdmin": getPageNewsAdmin();
            break;
            case "genererNewsAdminAjout": getPageNewsAdminAjout();
            break;
            case "genererNewsAdminModif": getPageNewsAdminModif();
            break;
            case "genererNewsAdminSup": getPageNewsAdminSup();
            break;
            case "error404":
            default: throw new Exception("La page n'existe pas");
        }
    } else {
        getPageAccueil();
    }
} catch(Exception $e){
    $errorMessage = $e->getMessage();
    require "views/commons/erreur.view.php";
}



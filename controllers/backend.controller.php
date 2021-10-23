<?php
require_once "public/utile/gestionImage.php"; 
require_once "models/animal.dao.php";
require_once "models/actualite.dao.php";
require_once "models/admin.dao.php";
require_once "models/image.dao.php";
require_once "config/config.php";

function getPageLogin(){
    // Page de login du site
        $title = "Page de connexion administrateur";
    
        if(Securite::verificationAccess()){
            header ("Location: ?page=admin");
        }
        $alert = "";
        if(isset($_POST['login']) && !empty($_POST['login']) &&
        isset($_POST['password']) && !empty($_POST['password'])){
            $login = Securite::secureHTML($_POST['login']);
            $password = Securite::secureHTML($_POST['password']);
            if(isConnexionValid($login,$password)){
                echo "<h2>Vous êtes bien connecté en tant qu'administrateur</h2>";
                $_SESSION['acces'] = "admin";
                Securite::genereCookiePassword();
                header ("Location: ?page=admin");
            } else {
                $alert = "Mot de passe invalide";
            }
        }
    
        require_once "views/back/login.view.php";
    }
    
    function getPageAdmin(){
        $title = "Page d'administration du site";
        $alert = "";
        if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
            session_destroy();
            header("Location: ?page=accueil");
        }
    
        if(Securite::verificationAccess()){
            Securite::genereCookiePassword();
    
            require_once "views/back/adminAccueil.view.php";
        } else {
            throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
        }
    }
// *********************************************************************  //

function getPageNewsAdmin(){
    $title = "Page de gestion des news";
    $alert="";
    $alertSuccess="";
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $typeActualites = getTypesActualite();

        require_once "views/back/adminNews.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPageNewsAdminAjout(){
    $title = "Page ajout d'une actualité";
    $alert="";
    $alertSuccess="";
    if(isset($_POST['titreActu']) && !empty($_POST['titreActu']) &&
    isset($_POST['typeActu']) && !empty($_POST['typeActu']) &&
    isset($_POST['contenuActu']) && !empty($_POST['contenuActu'])) {
        $titreActu = Securite::secureHTML($_POST['titreActu']);
        $typeActu = Securite::secureHTML($_POST['typeActu']);
        $contenuActu = Securite::secureHTML($_POST['contenuActu']);
        $fileImage = $_FILES['imageActu'];
        $repertoire = "public/sources/images/news/";
        $date = date("Y-m-d H:i:s", time());
        try{
            $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
            $idImage = insertImageNewsIntoBD($nomImage, "news/".$nomImage);

            if(insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$idImage)){
                $alertSuccess = "La création de l'actualité est effectuée";
            } else {
               throw new Exception("L'insertion en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La création de l'actualité na pas fonctionnée <br />". $e->getMessage();
        }
      
    }

    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $typeActualites = getTypesActualite();

        require_once "views/back/adminNewsAjout.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPageNewsAdminModif(){
    $title = "Page modification d'une actualité";
    $alert="";
    $alertSuccess="";
    if(isset($_POST['etape']) && (int)$_POST['etape']>=2){
        $typeActu  = Securite::secureHTML($_POST['typeActu']);
        $data['actualites'] = getActualitesFromBD((int) $typeActu);
    }

    if(isset($_POST['etape']) && (int)$_POST['etape']>=3){
        $actualite  = Securite::secureHTML($_POST['actualites']);
        $data['actualite'] = getActualiteFromBD($actualite);
    }

    if(isset($_POST['etape']) && (int)$_POST['etape']>=4){
        $titreActu = Securite::secureHTML($_POST['titreActu']);
        $typeActu = Securite::secureHTML($_POST['typeActu']);
        $contenuActu = Securite::secureHTML($_POST['contenuActu']);
        $idImage = $data['actualite']['id_image'];
        $idActualite = $data['actualite']['id_actualite'];
        try{
            // pour tester si un fichier à été ajouté
            if($_FILES['imageActu']['size'] > 0){
                $fileImage = $_FILES['imageActu'];
                $repertoire = "public/sources/images/news/";
                $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
                $idImage = insertImageNewsIntoBD($nomImage, "news/".$nomImage);
            }

            if(updateActualiteIntoBD($idActualite,$titreActu,$typeActu,$contenuActu,$idImage)){
                $alertSuccess = "La modification de l'actualité est effectué";
            } else {
               throw new Exception("La modification en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La modificatoin de l'actualité na pas fonctionnée <br />". $e->getMessage();
        }
    }

    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $typeActualites = getTypesActualite();
 
        require_once "views/back/adminNewsModif.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPageNewsAdminSup(){
    $title = "Page suppression d'une actualité";
    $alert="";
    $alertSuccess="";
    if(isset($_POST['etape']) && (int)$_POST['etape']>=2){
        $typeActu  = Securite::secureHTML($_POST['typeActu']);
        $data['actualites'] = getActualitesFromBD((int) $typeActu);
    }

    if(isset($_POST['etape']) && (int)$_POST['etape']>=3){
        $actualite  = Securite::secureHTML($_POST['actualites']);
        $data['actualite'] = getActualiteFromBD($actualite);

    }
    if(isset($_POST['etape']) && (int)$_POST['etape']>=4){

        $idActualite = $data['actualite']['id_actualite'];
        try{
            if(deleteActuFromBD($idActualite)){
                $alertSuccess = "La suppression de l'actualité a été effectué";
            } else {
               throw new Exception("La modification en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La modificatoin de l'actualité na pas fonctionnée <br />". $e->getMessage();
        }
    }

    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $typeActualites = getTypesActualite();
 
        require_once "views/back/adminNewsSup.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}
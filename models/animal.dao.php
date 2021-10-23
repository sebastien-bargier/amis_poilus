<?php
require_once "pdo.php";

function getAnimalFromStatut($idStatut){ // je recupere le statut de l'animal
                                    
    $bdd = connexionPDO(); // connexion à la base de données
    $req = '
    SELECT * 
    FROM animal 
    where id_statut = :idStatut';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idStatut",$idStatut);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}


// je creer une fonction pour récupérer la première image d'un animal
function getFirstImageAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('
        SELECT image.id_image,libelle_image,url_image,description_image
        FROM image
        inner join contient on image.id_image = contient.id_image
        inner join animal on animal.id_animal = contient.id_animal
        where animal.id_animal= :idAnimal
        LIMIT 1
        '); // :idAnimal est une variable pour l'utiliser dans la requête
    $stmt->bindValue(":idAnimal",$idAnimal); // bindValue permet de sécuriser et d'éviter injection sql
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC); // je recupère 1 seul element l'image
    $stmt->closeCursor();
    return $image;
}

function getCaracteresFromAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('
        select caractere.libelle_caractere
        from caractere
        inner join dispose on caractere.id_caractere = dispose.id_caractere
        where id_animal = :idAnimal
        ');
    $stmt->bindValue(":idAnimal",$idAnimal);
    $stmt->execute();
    $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $caracteres;
}

function getAnimalFromIdAnimalBD($idAnimal){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM animal 
    where id_animal = :idAnimal';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal);
    $stmt->execute();
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animal;
}

function getImagesFromAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('
    select image.id_image,libelle_image,url_image,description_image
    from image
    inner join contient on image.id_image = contient.id_image
    inner join animal on animal.id_animal = contient.id_animal
    where animal.id_animal= :idAnimal
    LIMIT 1
    ');
    $stmt->bindValue(":idAnimal",$idAnimal);
    $stmt->execute();
    $images = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $images;
}

function getStatutsAnimal(){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM statut';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $statuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $statuts;
}


function insertIntoContient($idImage,$idAnimal){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO contient values(:idImage, :idAnimal)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idImage",$idImage,PDO::PARAM_INT);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}

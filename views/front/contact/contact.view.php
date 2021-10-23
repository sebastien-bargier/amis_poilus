<?php ob_start(); ?>

<h1>Contact</h1>

<div class="contact">
    <h2>Suivez-nous</h2>
    <p>
        Sur notre page :<a href="https://www.facebook.com"><span class="badge">facebook</span></a>
    </p>
    <br />

    <h2>Contactez-nous</h2>
    <p>
        Par mail : <a href="mailto:associationdelaprotectionanimal@gmail.com">associationdelaprotectionanimal@gmail.com</a>
    </P>
    <p>
        Par téléphone : 04 00 00 00 00</a>
    </P>
    <p>
    ou par notre formulaire de contact ci-dessous
    </P>
</div>
<br />

<h2>formulaire de contact</h2>

<div class="formulaire">
    <form method="POST" action="#">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" class="form-control" required/>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" required/>
        </div>
        <div class="form-group">
            <label for="objet">Objet :</label>
            <select name="objet" class="form-control">
                <option value="question">Question</option>
                <option value="adoption">Adoption</option>
                <option value="donnation">Donnation</option>
                <option value="autres">Autres</option>
            </select>
        </div>
        <div  class="form-group">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" name="message" required></textarea>
        </div>
        <div class="form-group">
            <label for="captcha">Combien font 3+5 :</label>
            <input type="text" name="captcha" class="form-control" required/>
        </div>
        <input type="submit" class="btn-form" value="Valider le formulaire" />
    </form>
</div>

<?php

if(isset($_POST['nom']) && !empty($_POST['nom']) &&
isset($_POST['email']) && !empty($_POST['email']) &&
isset($_POST['objet']) && !empty($_POST['objet']) &&
isset($_POST['message']) && !empty($_POST['message']) &&
isset($_POST['email']) && !empty($_POST['email'])
) {
    $captcha = (int) $_POST['captcha'];
    if($captcha === 8){
        $nom = htmlentities($_POST['nom']);
        $email = htmlentities($_POST['email']);
        $objet = htmlentities($_POST['objet']);
        $message = htmlentities($_POST['message']);
        $destinataire = "extremesauvetage@gmail.com";
        //mail($destinataire, $objet . " - " . $nom, "Mail" . $mail . "message" . $message);
        echo '<div class="alert-succes">Votre message à bien été envoyé.</div>';
    } else {
        echo '<div class="alert-danger">Votre message n\'a pas pu être envoyé !</div>';
    }
}
?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>   
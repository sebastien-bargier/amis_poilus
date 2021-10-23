<?php ob_start();  ?>

<h1>Login</h1>

<div class="login">
    <form action="" method="POST">
        <div class="form-group">
            <label for="login">Nom : </label>
            <input type="text" id="login" name="login" required/>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe : </label>
            <input type="password" id="password" name="password" required/>
        </div>
        </div class="form-group">
            <input type="submit" value="Valider" class="btn">
        </div>
    </form>
</div>
<?php if($alert !== ""){ ?>
<div class="alert-danger">
    <?= $alert ?>
</div>
<?php } ?>


<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/css/main.css" rel="stylesheet"/>

    <title><?= $title ?></title>
     
</head>

<body>
    <!-- le header du site -->
    <header>
        <div class="logo"><img src="public/sources/logo/logo_amis_poilus.png"alt='logo du site' />
        </div>
        <?php include("views/commons/menu.php") ?>
    </header>

    <!-- Contenu du site -->
    <main class="container">
        <!-- le code mis en temporisation est affiché ici -->
        <?= $content ?>

    </main >

    <!-- footer du site -->
    <footer>
        <p class="copyright">&copy; Association Extrême Sauvetage</p>
    </footer>

</body>

</html>
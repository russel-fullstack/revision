<?php
    declare(strict_types=1);
    include 'database.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un étudiant</title>
</head>
<body>

    <h1>Ajouter un nouvel étudiant</h1>

    <?php if ($message): ?>
        <p style="color: red;"><?= $message ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <div>
            <label>Nom :</label><br>
            <input type="text" name="nom" >
        </div>
        <br>
        <div>
            <label>Prénom :</label><br>
            <input type="text" name="prenom" >
        </div>
        <br>
        <div>
            <label>Email :</label><br>
            <input type="email" name="email" >
        </div>
        <br>
        <button type="submit" name="soumettre">Enregistrer</button>
        <a href="index.php">Annuler</a>
    </form>

</body>
</html>
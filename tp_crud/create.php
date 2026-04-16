<?php 
declare(script_types=1);

include 'database.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de création d'un étudiant</title>
</head>
<body>
    <form action="" method="POST">
    <label for="name">Nom</label><br>
    <input type="text" name="nom" id="name" placeholder="Entrez votre nom"><br><br>
    <label for="prenom">Prenom</label><br>
    <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prénom"><br><br>
    <label for="mail">Email</label><br>
    <input type="text" name="mail" id="mail" placeholder="Entrez votre Email"><br><br>
    <label for="adresse">Adresse</label><br>
    <input type="text" name="adresse" id="adresse" placeholder="Entrez votre adresse"><br><br>
    <label for="phone">Téléphone</label><br>
    <input type="text" name="phone" id="phone" placeholder="Entrez votre numéro de téléphone"><br><br>
    <label for="date">Date</label><br>
    <input type="date" name="date" id="date" placeholder="aaaaa-mm-jj"><br><br>
    <label for="genre">Genre</label><br>
    <input type="radio" name="genre" id="genre2" value="Masculin">
    <label for="genre2">masculin</label>
    <input type="radio" name="genre" id="genre1" value="Féminin">
    <label for="genre1">feminin</label><br>
    <p>Langues préférées</p>
    <input type="checkbox" name="" id="french">
    <label for="french">Français</label>
    <input type="checkbox" name="" id="english">
    <label for="english">Anglais</label>
    <input type="checkbox" name="" id="espagnol">
    <label for="espagnol">Espagnol</label><br>

    <label for="etude">Niveau d'études</label>
    <select name="" id="etude">
        <option value="">Sélectionner votre niveau d'étude</option>
        <option value="">licence professionnelle</option>
    </select>
    </form>
</body>
</html>
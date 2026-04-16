<?php 
declare(strict_types=1);

include 'database.php';

session_start();

$error ='';

if(isset($_POST['soumettre'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    // $niveau = $_POST['etude'];
    $interet = htmlspecialchars($_POST['text']);
    $photo = $_POST['photo'];
    $document = $_POST['document'];
    $genre = $_POST['genre'];
    $langue = $_POST['langue'];

    if(!empty($nom) || !empty($prenom) || !empty($mail) || !empty($adresse) || !empty($phone) || !empty($date) || !empty($genre) || !empty($langue)){
        $sql = 'INSERT INTO students (nom, prenom, mail, adresse, telephone, date_naissance, genre, langue, niveau_etude, interets, photo, document)
        VALUES(:nom, :prenom, :mail, :adresse, :telephone, :date_naissance, :genre, :langue, :niveau_etude, :interets, :photo, :document)';
        $req = $pdo -> prepare($sql);
        $req -> execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':mail' => $mail,
            ':adresse' => $adresse,
            ':telephone' => $phone,
            ':date_naissance' => $date,
            ':genre' => $genre,
            ':langue' => $langue,
            // ':niveau_etude' => $niveau,
            ':interets' => $interet,
            ';photo' => $photo,
            ':document' => $document

        ]);
        //  $_SESSION['error'] = "Création du nouvel étudiant réussie !";
        header("Location: index.php");
        exit();
    } else {
        $error = "<p style='color: red;'> Veuillez remplir tous les champs</p>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de création d'un étudiant</title>
</head>
<body>
    <h1>Créer un nouveau Étudiant</h1>
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
    <input type="date" name="date" id="date"><br><br>
    <label for="genre">Genre</label><br>
    <input type="radio" name="genre" id="genre2" value="Masculin">
    <label for="genre2">masculin</label>
    <input type="radio" name="genre" id="genre1" value="Féminin">
    <label for="genre1">feminin</label><br>
    <p>Langues préférées</p>
    <input type="checkbox" name="langue" id="french">
    <label for="french">Français</label>
    <input type="checkbox" name="langue" id="english">
    <label for="english">Anglais</label>
    <input type="checkbox" name="langue" id="espagnol">
    <label for="espagnol">Espagnol</label><br><br>

    <label for="etude">Niveau d'études</label>
    <select name="niveau" id="etude">
        <option value="">Sélectionner votre niveau d'étude</option>
        <option value="">licence professionnelle</option>
    </select><br><br>
    <label for="text">Vos intérêts</label><br>
    <textarea name="text" id="text" placeholder="vos intérêts"></textarea><br><br>
    <label for="photo">Photo</label>
    <input type='file' name="photo"><br><br>
    <label for="document">Documents</label>
    <input type="file" name="document" id="document"><br><br>
    <button name="soumettre">Ajouter à la liste d'étudiants</button><br><br>
    </form>

    <a href="index.php">Annuler</a>
</body>
</html>
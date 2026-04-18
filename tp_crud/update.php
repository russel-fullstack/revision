<?php 
declare(strict_types=1);

include 'database.php';

session_start();

$message = '';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->execute([':id' => $id]);
    $student = $req->fetch();

    if(!$student){
        header("Location: index.php");
        exit();
    }
}


if(isset($_POST['modifier'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $niveau = $_POST['niveau'];
    $interet = htmlspecialchars($_POST['text']);
    $photo = $_POST['photo'];
    $document = $_POST['document'];
    $genre = $_POST['genre'] ?? '';
    // Pour les checkboxes : utiliser un tableau et implode() pour stocker
    $langue = $_POST['langue'] ?? '';

    if(!empty($nom) && !empty($prenom) && !empty($mail) && !empty($adresse) && !empty($phone) && !empty($date) && !empty($genre) && !empty($langue)){
        $sql = 'UPDATE students SET nom=:nom, prenom=:prenom, mail=:mail, adresse=:adresse, telephone=:telephone, date_naissance=:date_naissance, genre=:genre, langue=:langue, niveau_etude=:niveau_etude, interets=:interets, photo=:photo, document=:document WHERE id=:id';
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
            ':niveau_etude' => $niveau,
            ':interets' => $interet,
            ':photo' => $photo,
            ':document' => $document

        ]);
        header("Location: index.php");
        exit();
    } else {
        $message = "<p style='color: red;'> Veuillez remplir tous les champs</p>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de modification d'un étudiant</title>
</head>
<body>
    <h1>Modifier un étudiant</h1>
    <?php if(!empty($message)) : ?>
        <?= $message ?>
    <?php endif; ?>
    <form action="" method="POST">
    
        
    <label for="name">Nom</label><br>
    <input type="text" name="nom" id="name" value="<?= htmlspecialchars($student['nom'] ?? '') ?>"><br><br>
    <label for="prenom">Prenom</label><br>
    <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($student['prenom'] ?? '') ?>"><br><br>
    <label for="mail">Email</label><br>
    <input type="text" name="mail" id="mail" value="<?= htmlspecialchars($student['mail'] ?? '') ?>"><br><br>
    <label for="adresse">Adresse</label><br>
    <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($student['adresse'] ?? '') ?>"><br><br>
    <label for="phone">Téléphone</label><br>
    <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($student['telephone'] ?? '') ?>"><br><br>
    <label for="date">Date</label><br>
    <input type="date" name="date" id="date" value="<?= htmlspecialchars($student['date_naissance'] ?? '') ?>"><br><br>
    <label for="genre">Genre</label><br>
    <input type="radio" name="genre" id="genre2" value="Masculin" <?= ($student['genre'] == 'Masculin') ? 'checked' : '' ?>>
    <label for="genre2">masculin</label>
    <input type="radio" name="genre" id="genre1" value="Féminin" <?= ($student['genre'] == 'Féminin') ? 'checked' : '' ?>>
    <label for="genre1">feminin</label><br>
    <p>Langues préférées</p>
    <input type="checkbox" name="langue[" id="french" value="<?=  $student['langue'] ? 'checked' : '' ?>" >
    <label for="french">Français</label>
    <input type="checkbox" name="langue" id="english" value="<?=  $student['langue'] ? 'checked' : '' ?>" >
    <label for="english">Anglais</label>
    <input type="checkbox" name="langue" id="espagnol" value="<?=  $student['langue'] ? 'checked' : '' ?>">
    <label for="espagnol">Espagnol</label><br><br>

    <label for="etude">Niveau d'études</label>
    <select name="niveau" id="etude">
        <option value="">Sélectionner votre niveau d'étude</option>
        <option value="licence professionnelle" <?= $student['niveau_etude'] === 'licence professionnelle' ? 'selected' : '' ?>>licence professionnelle</option>
        <option value="Master 2" <?= $student['niveau_etude'] === 'Master 2' ? 'selected' : '' ?>>Master 2</option>
        <option value="Master 1" <?= $student['niveau_etude'] === 'Master 1' ? 'selected' : '' ?>>Master 1</option>
        <option value="BTS" <?= $student['niveau_etude'] === 'BTS' ? 'selected' : '' ?>>BTS</option>
        <option value="DQP" <?= $student['niveau_etude'] === 'DQP' ? 'selected' : '' ?>>DQP</option>
    </select><br><br>
    <label for="text">Vos intérêts</label><br>
    <textarea name="text" id="text" placeholder="vos intérêts"><?= $student['interets'] ?? '' ?></textarea><br><br>
    <label for="photo">Photo</label>
    <input type='file' name="photo"><br><br>
    <label for="document">Documents</label>
    <input type="file" name="document" id="document"><br><br>
    <button type="submt" name="modifier">Modifier</button><br><br>
    </form>

    <a href="index.php">Annuler</a>
</body>
</html>
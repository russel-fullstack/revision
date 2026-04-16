<?php
 declare(strict_types=1);
 include 'database.php';
 session_start();

$message = '';

if(isset($_POST['soumettre'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $pseudo = htmlspecialchars($_POST['pseudo']);

    if(!empty($nom) || !empty($prenom) || !empty($email) || !empty($pseudo)){
    $sql_email = "SELECT * FROM etudiants WHERE email = ?";
    $check_email = $pdo->prepare($sql_email);
    $check_email->execute([$email]);
    $email_exist = $check_email->fetchColumn();

    $sql_pseudo = "SELECT * FROM etudiants WHERE pseudo = ?";
    $check_pseudo = $pdo->prepare($sql_pseudo);
    $check_pseudo->execute([$pseudo]);
    $pseudo_exist = $check_pseudo->fetchColumn();
    
    if($pseudo_exist){
        $message = '<p style="color: red;">Le pseudo est déjà utilisée .</p>';
    }elseif($email_exist){
        $message = '<p style="color: red;">L\'email est déjà utilisée .</p>';
    }else{


        $sql = "INSERT INTO etudiants (nom, prenom, pseudo, email) VALUES (:nom, :prenom, :pseudo, :email)";
        $req = $pdo->prepare($sql);
        $req ->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':pseudo' => $pseudo,
            ':email' => $email
        ]);
        $_SESSION['message'] = "Création du nouvel étudiant réussie !";
        header("Location: index.php");
        exit();
    }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}



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
            <label>Pseudo:</label><br>
            <input type="text" name="pseudo" >
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
<?php
declare(strict_types=1);
session_start();

include 'database.php';

$sql= "SELECT * FROM etudiants";

$req = $pdo->prepare($sql);

$req->execute();

$etudiants = $req->fetchAll();

// echo "<pre>";
// var_dump($etudiants);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste des étudiants</h1>

    <?php if (isset($_SESSION['message'])): ?>
        <p style="color: green; padding: 10px; background-color: #d4edda; border: 1px solid #c3e6cb;">
            <?= $_SESSION['message'] ?>
        </p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <a href="create.php">Ajouter un étudiant</a><br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
            <tr>
                <td><?= $etudiant['id'] ?></td>
                <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                <td><?= htmlspecialchars($etudiant['email']) ?></td>
                <td>
                    <a href="update.php?id=<?= $etudiant['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $etudiant['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">Delete</a>
                </td>
            </tr>   
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
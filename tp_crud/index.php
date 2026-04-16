<?php
declare(strict_types=1);
include 'database.php';


$sql = "SELECT * FROM students";

$req = $pdo -> prepare($sql);

$req -> execute();

$students = $req -> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp CRUD</title>
</head>
<body>
    <h1>Listes des Étudiants (Student2)</h1>
    <form method="GET" action="">
        <a href="create.php">Créer un nouvel étudiant</a>
        <a href="index.php">Actualiser</a>
        <input type="text" name="search" placeholder="Entrer le nom de l'étudiant ou son email">
        <button class="search">Rechercher</button>
    </form>
    <table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Dte de naissance </th>
            <th>Genre</th>
            <th>Langues</th>
            <th>NIveau d'études</th>
            <th>Interets</th>
            <th>Photo</th>
            <th>Document</th>
            <th>Crée le </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student) :?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= htmlspecialchars($student['nom'])?></td>
                <td><?= htmlspecialchars($student['prenom'])?></td>
                <td><?= htmlspecialchars($student['mail'])?></td>
                <td><?= htmlspecialchars($student['adresse'])?></td>
                <td><?= htmlspecialchars($student['telephone'])?></td>
                <td><?= htmlspecialchars($student['date_naissance'])?></td>
                <td><?= htmlspecialchars($student['genre'])?></td>
                <td><?= htmlspecialchars($student['langue'])?></td>
                <td><?= htmlspecialchars($student['niveau_etude'])?></td>
                <td><?= htmlspecialchars($student['interets'])?></td>
                <td><?= htmlspecialchars($student['photo'])?></td>
                <td><?= htmlspecialchars($student['document'])?></td>
                <td><?= htmlspecialchars($student['created_at'])?></td>
                <td>
                    <a href="update.php">Modifier</a>
                    <a href="delete.php">supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>
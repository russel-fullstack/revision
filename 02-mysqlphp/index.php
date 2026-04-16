<?php
//  declare(strict_types=1);
session_start();  // Indispensable pour utiliser les sessions
include "database.php";

// Initialisation de la variable de recherche
$search = $_GET['search'] ??'';
// 0. Base de la requête
$sql = "SELECT * FROM etudiants";
$params =[];

// Si une recherche est lancée, on ajoute le WHERE
if (!empty($search)) {
    $sql .= " WHERE nom LIKE ? OR email LIKE ?";
}

// On ajoute TOUJOURS le tri à la fin
$sql .= " ORDER BY id DESC";

// 1. Préparation
$req = $pdo->prepare($sql);

// 2. Liaison du paramètre (uniquement si nécessaire)
if (!empty($search)) {
    $terme = '%' . $search . '%';
   $params =[
    $terme,
    $terme
   ];
}

// 3. Exécution
$req->execute( $params);

// 4. Récupération
$etudiants = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mysql php connect DB</title>
</head>

<body>
    <h1>Liste des étudiants</h1>

    <?php if (isset($_SESSION['succes'])) : ?>
        <p style="color: green; padding: 5px; background:rgba(0,255,0,0.3)"><?= $_SESSION['succes'] ?></p>
        <?php unset($_SESSION['succes'])  ?>
    <?php endif; ?>
    <!-- Formulaire de recherche -->
    <form method="GET" action="" class="mb-4">
        <a class="" href="create.php">Créer un
            nouvel étudiant</a>
        <a class=""
            href="index.php">Actualiser
        </a>
        <input type="text" name="search" placeholder="Rechercher par nom ou email"
            value="<?= $search ?>" class="">
        <button type="submit" class="">Rechercher</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Pseudo</th>
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
                    <td><?= htmlspecialchars($etudiant['pseudo']) ?></td>
                    <td>
                        <a href="update.php?id=<?= $etudiant['id'] ?>">Edit </a>
                        <a href="delete.php?id=<?= $etudiant['id'] ?>" onClick=" return confirm('Êtes-vous sûr de vouloir supprimer ?')">
                            Supprimer
                        </a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
</body>

</html>
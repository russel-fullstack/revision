<?php

declare(strict_types=1);
session_start();

include 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->execute([
        ':id' => $id
    ]);

    header('Location: index.php');
    exit();
}

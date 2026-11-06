<?php
require_once 'config_blog.php';

// Ce script n'affiche rien : il enregistre puis redirige.
$id          = filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT);
$nom         = trim($_POST['nom'] ?? '');
$commentaire = trim($_POST['commentaire'] ?? '');

if (!$id || $nom === '' || $commentaire === '') {
    die('Paramètres invalides.');
}

// Vérifier que le billet existe bien
$stmt = $pdo->prepare('SELECT COUNT(*) FROM billets_blog WHERE ID = ?');
$stmt->execute([$id]);
if ($stmt->fetchColumn() == 0) {
    die('Ce billet n\'existe pas.');
}

// Insertion (date_comment se remplit toute seule grâce au TIMESTAMP)
$stmt = $pdo->prepare(
    'INSERT INTO commentaires_blog (nom, comment, ID) VALUES (?, ?, ?)'
);
$stmt->execute([$nom, $commentaire, $id]);

header('Location: afficher_blog.php?ID=' . $id);
exit;
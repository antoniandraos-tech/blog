<?php
require_once 'config_blog.php';

// 1. Vérifier le paramètre ID (doit être un entier)
$id = filter_input(INPUT_GET, 'ID', FILTER_VALIDATE_INT);
if (!$id) {
    die('Identifiant invalide.');
}

// 2. Chercher le billet
$stmt = $pdo->prepare(
    "SELECT ID, titre, contenu, categorie,
            DATE_FORMAT(date_billet, '%d/%m/%Y %H:%i') AS date_fr
     FROM billets_blog WHERE ID = ?"
);
$stmt->execute([$id]);
$billet = $stmt->fetch();

if (!$billet) {
    die('Ce billet n\'existe pas.');
}

// 3. Chercher ses commentaires, du plus ancien au plus récent
$stmt = $pdo->prepare(
    "SELECT nom, comment,
            DATE_FORMAT(date_comment, '%d/%m/%Y %H:%i') AS date_fr
     FROM commentaires_blog WHERE ID = ? ORDER BY date_comment"
);
$stmt->execute([$id]);
$commentaires = $stmt->fetchAll();

// 4. Envoyer les données au template
$smarty->assign('titre', $billet['titre']);
$smarty->assign('billet', $billet);
$smarty->assign('commentaires', $commentaires);
$smarty->display('afficher_blog.tpl');

<?php
require_once 'config_blog.php';

// Mode 2 : le formulaire a été envoyé (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyage : trim() enlève les espaces autour
    $titre     = trim($_POST['titre'] ?? '');
    $contenu   = trim($_POST['contenu'] ?? '');
    $categorie = trim($_POST['categorie'] ?? '');

    if ($titre === '' || $contenu === '' || $categorie === '') {
        die('Tous les champs sont obligatoires.');
    }

    // L'annonce = extrait du billet SANS balises (strip_tags), 100 caractères max
    $annonce = mb_substr(strip_tags($contenu), 0, 100);

    // Requête préparée : les ? sont remplacés de façon sûre (anti injection SQL)
    $stmt = $pdo->prepare(
        'INSERT INTO billets_blog (titre, contenu, annonce, date_billet, categorie)
         VALUES (?, ?, ?, NOW(), ?)'
    );
    $stmt->execute([$titre, $contenu, $annonce, $categorie]);

    // Redirection vers l'affichage du billet qu'on vient de créer
    header('Location: afficher_blog.php?ID=' . $pdo->lastInsertId());
    exit;
}

// Mode 1 : on affiche simplement le formulaire vide
$smarty->assign('titre', 'Nouveau billet');
$smarty->display('edition_blog.tpl');
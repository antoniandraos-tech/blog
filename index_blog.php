<?php
require_once 'config_blog.php';

// Filtre optionnel par catégorie (?categorie=test)
$categorie = trim($_GET['categorie'] ?? '');

$sql = "SELECT ID, titre, annonce, categorie,
               DATE_FORMAT(date_billet, '%d/%m/%Y %H:%i') AS date_fr
        FROM billets_blog";
$params = [];

if ($categorie !== '') {
    $sql .= ' WHERE categorie = ?';   // la valeur passe par un paramètre, jamais collée dans le SQL
    $params[] = $categorie;
}
$sql .= ' ORDER BY date_billet DESC LIMIT 10';

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$smarty->assign('titre', 'Mon blog');
$smarty->assign('billets', $stmt->fetchAll());
$smarty->display('index_blog.tpl');
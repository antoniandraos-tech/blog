<?php
use Smarty\Smarty;
require_once __DIR__ . '/smarty/libs/Smarty.class.php';

$pdo = new PDO(
    'mysql:host=localhost;dbname=blog;charset=utf8mb4',
    'root',
    '',   
    [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);

$smarty = new Smarty();
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/templates_c');
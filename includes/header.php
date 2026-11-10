<?php
/**
 * includes/header.php
 * En-tête commun. Variable optionnelle : $titrePage (titre de l'onglet).
 */
require_once __DIR__ . '/fonctions.php';

$titrePage    = $titrePage ?? 'Accueil';
$pageCourante = basename($_SERVER['SCRIPT_NAME']);

// Menu : fichier => libellé
$menu = [
    'index.php'     => 'Accueil',
    'catalogue.php' => 'Catalogue',
    'apropos.php'   => 'À propos',
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($titrePage) ?> | Médiathèque IPNET</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="site-header">
    <div class="conteneur">
        <h1 class="logo">📚 Médiathèque IPNET</h1>
        <nav>
            <ul>
                <?php foreach ($menu as $fichier => $libelle): ?>
                    <li>
                        <a href="<?= e($fichier) ?>"
                           class="<?= $pageCourante === $fichier ? 'actif' : '' ?>"><?= e($libelle) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</header>
<main class="conteneur">

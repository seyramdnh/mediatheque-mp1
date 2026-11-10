<?php
/**
 * index.php – Page d'accueil
 */
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage   = 'Accueil';
$totalLivres = count($livres);                       // nombre total calculé depuis le tableau
$totalDispo  = compterLivresDisponibles($livres);

require __DIR__ . '/includes/header.php';
?>
<section class="hero">
    <h2>Bienvenue à la Médiathèque IPNET</h2>
    <p>Découvrez notre catalogue de livres : romans, science-fiction, informatique, histoire et bien plus encore.</p>
    <p class="stats">
        <strong><?= e($totalLivres) ?></strong> livres au catalogue,
        dont <strong><?= e($totalDispo) ?></strong> disponibles actuellement.
    </p>
    <a class="bouton" href="catalogue.php">Consulter le catalogue →</a>
</section>
<?php require __DIR__ . '/includes/footer.php'; ?>

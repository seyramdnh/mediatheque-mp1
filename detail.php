<?php
/**
 * detail.php – Détail d'un livre via detail.php?id=3
 */
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage = 'Détail du livre';
$livre     = null;
$erreur    = '';

if (!isset($_GET['id'])) {
    // Identifiant absent
    http_response_code(400);
    $erreur = 'Aucun identifiant de livre n\'a été fourni.';
} else {
    // filter_var renvoie false si la valeur n'est pas un entier valide
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($id === false || $id < 1) {
        http_response_code(400);
        $erreur = 'L\'identifiant fourni est invalide.';
    } else {
        $livre = trouverLivreParId($livres, $id);
        if ($livre === null) {
            http_response_code(404);
            $erreur = 'Aucun livre ne correspond à l\'identifiant ' . $id . '.';
        } else {
            $titrePage = $livre['titre'];
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<?php if ($livre === null): ?>
    <h2>Livre introuvable</h2>
    <p class="message erreur"><?= e($erreur) ?></p>
    <p><a class="bouton" href="catalogue.php">← Retour au catalogue</a></p>
<?php else: ?>
    <h2><?= e($livre['titre']) ?></h2>
    <dl class="fiche">
        <dt>Identifiant</dt>   <dd><?= e($livre['id']) ?></dd>
        <dt>Auteur</dt>        <dd><?= e($livre['auteur']) ?></dd>
        <dt>Année</dt>         <dd><?= e($livre['annee']) ?></dd>
        <dt>Catégorie</dt>
        <dd>
            <a href="catalogue.php?categorie=<?= e(urlencode($livre['categorie'])) ?>">
                <?= e(libelleCategorie($livre['categorie'])) ?>
            </a>
        </dd>
        <dt>Prix</dt>          <dd><?= e(formaterPrix($livre['prix'])) ?></dd>
        <dt>Disponibilité</dt>
        <dd>
            <span class="badge <?= $livre['disponible'] ? 'badge-oui' : 'badge-non' ?>">
                <?= $livre['disponible'] ? 'Disponible' : 'Emprunté' ?>
            </span>
        </dd>
    </dl>
    <p><a class="bouton" href="catalogue.php">← Retour au catalogue</a></p>
<?php endif; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

<?php
/**
 * catalogue.php – Liste des livres avec filtrage par catégorie (?categorie=roman)
 */
require_once __DIR__ . '/data/livres.php';
require_once __DIR__ . '/includes/fonctions.php';

$titrePage  = 'Catalogue';
$categories = obtenirCategories($livres);

$livresAffiches   = $livres;   // par défaut : affichage complet
$categorieActive  = '';        // catégorie valide actuellement filtrée
$erreur           = '';

// --- Validation du paramètre GET "categorie" ---
if (isset($_GET['categorie'])) {
    $saisie = $_GET['categorie'];

    if (!is_string($saisie)) {
        // ex. ?categorie[]=roman : paramètre invalide
        $erreur         = 'Le paramètre de catégorie est invalide.';
        $livresAffiches = [];
    } else {
        $saisie = strtolower(trim($saisie));

        if ($saisie === '') {
            // Paramètre vide : on affiche tout le catalogue
        } elseif (in_array($saisie, $categories, true)) {
            $categorieActive = $saisie;
            $livresAffiches  = filtrerParCategorie($livres, $saisie);
        } else {
            // Catégorie inexistante : message d'erreur, aucun livre affiché
            http_response_code(404);
            $erreur         = 'La catégorie « ' . $saisie . ' » n\'existe pas.';
            $livresAffiches = [];
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<h2>Catalogue des livres</h2>

<!-- Filtre par liens -->
<nav class="filtres" aria-label="Filtrer par catégorie">
    <a href="catalogue.php" class="<?= ($categorieActive === '' && $erreur === '') ? 'actif' : '' ?>">Tous</a>
    <?php foreach ($categories as $cat): ?>
        <a href="catalogue.php?categorie=<?= e(urlencode($cat)) ?>"
           class="<?= $categorieActive === $cat ? 'actif' : '' ?>"><?= e(libelleCategorie($cat)) ?></a>
    <?php endforeach; ?>
</nav>

<!-- Filtre par menu déroulant -->
<form method="get" action="catalogue.php" class="form-filtre">
    <label for="categorie">Filtrer par catégorie :</label>
    <select name="categorie" id="categorie">
        <option value="">Toutes les catégories</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= e($cat) ?>" <?= $categorieActive === $cat ? 'selected' : '' ?>>
                <?= e(libelleCategorie($cat)) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Filtrer</button>
</form>

<?php if ($erreur !== ''): ?>
    <p class="message erreur"><?= e($erreur) ?> <a href="catalogue.php">Revenir à l'affichage complet</a></p>
<?php else: ?>
    <p class="compteur">
        <strong><?= e(count($livresAffiches)) ?></strong> livre(s) affiché(s)
        <?php if ($categorieActive !== ''): ?>
            dans la catégorie « <?= e(libelleCategorie($categorieActive)) ?> »
            – <a href="catalogue.php">Voir tout le catalogue</a>
        <?php endif; ?>
    </p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Titre</th><th>Auteur</th><th>Année</th>
                    <th>Catégorie</th><th>Prix</th><th>Disponibilité</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livresAffiches as $livre): ?>
                    <?= afficherLivre($livre) ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>

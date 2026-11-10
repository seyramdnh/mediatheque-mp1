<?php
/**
 * includes/fonctions.php
 * Fonctions utilitaires du site « Médiathèque IPNET ».
 */

/**
 * Échappe une valeur avant affichage (protection contre les failles XSS).
 */
function e(string|int|float $valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

/**
 * Retourne le libellé lisible d'un slug de catégorie (ex. "science-fiction" => "Science fiction").
 */
function libelleCategorie(string $categorie): string
{
    return ucfirst(str_replace('-', ' ', $categorie));
}

/**
 * Formate un prix en FCFA (ex. 4500 => "4 500 FCFA").
 */
function formaterPrix(int|float $prix): string
{
    return number_format($prix, 0, ',', ' ') . ' FCFA';
}

/**
 * Retourne la liste (sans doublon) des catégories présentes dans le tableau de livres.
 */
function obtenirCategories(array $livres): array
{
    $categories = array_unique(array_column($livres, 'categorie'));
    sort($categories);
    return $categories;
}

/**
 * Génère la ligne de tableau HTML (<tr>) d'un livre.
 * Toutes les données passent par htmlspecialchars() via e().
 */
function afficherLivre(array $livre): string
{
    $classeDispo = $livre['disponible'] ? 'badge-oui' : 'badge-non';
    $texteDispo  = $livre['disponible'] ? 'Disponible' : 'Emprunté';

    $html  = '<tr>';
    $html .= '<td>' . e($livre['id']) . '</td>';
    $html .= '<td><a href="detail.php?id=' . e($livre['id']) . '">' . e($livre['titre']) . '</a></td>';
    $html .= '<td>' . e($livre['auteur']) . '</td>';
    $html .= '<td>' . e($livre['annee']) . '</td>';
    $html .= '<td>' . e(libelleCategorie($livre['categorie'])) . '</td>';
    $html .= '<td>' . e(formaterPrix($livre['prix'])) . '</td>';
    $html .= '<td><span class="badge ' . $classeDispo . '">' . e($texteDispo) . '</span></td>';
    $html .= '</tr>';

    return $html;
}

/**
 * Retourne uniquement les livres appartenant à la catégorie donnée.
 * array_values() réindexe le tableau résultant.
 */
function filtrerParCategorie(array $livres, string $categorie): array
{
    $categorie = strtolower(trim($categorie));

    return array_values(array_filter(
        $livres,
        fn(array $livre): bool => strtolower($livre['categorie']) === $categorie
    ));
}

/**
 * Cherche un livre par son identifiant. Retourne null s'il n'existe pas.
 */
function trouverLivreParId(array $livres, int $id): ?array
{
    foreach ($livres as $livre) {
        if ($livre['id'] === $id) {
            return $livre;
        }
    }
    return null;
}

/**
 * Compte le nombre de livres disponibles à l'emprunt.
 */
function compterLivresDisponibles(array $livres): int
{
    $compteur = 0;
    foreach ($livres as $livre) {
        if ($livre['disponible']) {
            $compteur++;
        }
    }
    return $compteur;
}

/**
 * Retourne la date du jour en français (ex. "lundi 9 novembre 2026").
 */
function dateDuJour(): string
{
    $jours = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
    $mois  = ['', 'janvier', 'février', 'mars', 'avril', 'mai', 'juin',
              'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];

    $maintenant = new DateTime('now', new DateTimeZone('Africa/Lome'));

    return $jours[(int) $maintenant->format('w')] . ' '
         . $maintenant->format('j') . ' '
         . $mois[(int) $maintenant->format('n')] . ' '
         . $maintenant->format('Y');
}

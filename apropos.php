<?php
/**
 * apropos.php – Présentation statique de la médiathèque + date du jour (fonction PHP)
 */
$titrePage = 'À propos';
require __DIR__ . '/includes/header.php';
?>
<h2>À propos de la Médiathèque IPNET</h2>
<p>
    La Médiathèque de l'IPNET Institute of Technology met à la disposition des étudiants
    et du personnel un fonds documentaire varié : ouvrages littéraires, manuels techniques,
    références en informatique et ouvrages d'histoire et de culture générale.
</p>
<p>
    Sa mission est de favoriser la lecture, la recherche et l'autonomie des apprenants
    en offrant un accès simple et rapide à ses ressources.
</p>
<h3>Informations pratiques</h3>
<ul>
    <li>Ouverture : du lundi au vendredi, de 8h à 17h.</li>
    <li>Lieu : campus IPNET, Lomé (Togo).</li>
    <li>Emprunt : réservé aux étudiants et personnels de l'établissement.</li>
</ul>
<p class="date-jour">📅 Nous sommes le <strong><?= e(dateDuJour()) ?></strong>.</p>
<?php require __DIR__ . '/includes/footer.php'; ?>

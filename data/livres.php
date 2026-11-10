<?php
/**
 * data/livres.php
 * Source de données du catalogue (aucune base de données : tableau associatif PHP).
 * Clés de chaque livre : id, titre, auteur, annee, categorie, prix, disponible.
 * Les prix sont exprimés en FCFA.
 */
$livres = [
    [
        'id'         => 1,
        'titre'      => 'Une si longue lettre',
        'auteur'     => 'Mariama Bâ',
        'annee'      => 1979,
        'categorie'  => 'roman',
        'prix'       => 4500,
        'disponible' => true,
    ],
    [
        'id'         => 2,
        'titre'      => "L'Enfant noir",
        'auteur'     => 'Camara Laye',
        'annee'      => 1953,
        'categorie'  => 'roman',
        'prix'       => 3500,
        'disponible' => true,
    ],
    [
        'id'         => 3,
        'titre'      => 'Dune',
        'auteur'     => 'Frank Herbert',
        'annee'      => 1965,
        'categorie'  => 'science-fiction',
        'prix'       => 8000,
        'disponible' => false,
    ],
    [
        'id'         => 4,
        'titre'      => 'Clean Code',
        'auteur'     => 'Robert C. Martin',
        'annee'      => 2008,
        'categorie'  => 'informatique',
        'prix'       => 25000,
        'disponible' => true,
    ],
    [
        'id'         => 5,
        'titre'      => 'Sapiens : Une brève histoire de l\'humanité',
        'auteur'     => 'Yuval Noah Harari',
        'annee'      => 2011,
        'categorie'  => 'histoire',
        'prix'       => 9500,
        'disponible' => true,
    ],
    [
        'id'         => 6,
        'titre'      => 'Cahier d\'un retour au pays natal',
        'auteur'     => 'Aimé Césaire',
        'annee'      => 1939,
        'categorie'  => 'poesie',
        'prix'       => 3000,
        'disponible' => false,
    ],
    [
        'id'         => 7,
        'titre'      => 'Le Petit Prince',
        'auteur'     => 'Antoine de Saint-Exupéry',
        'annee'      => 1943,
        'categorie'  => 'jeunesse',
        'prix'       => 3500,
        'disponible' => true,
    ],
    [
        'id'         => 8,
        'titre'      => 'Le Monde s\'effondre',
        'auteur'     => 'Chinua Achebe',
        'annee'      => 1958,
        'categorie'  => 'roman',
        'prix'       => 5000,
        'disponible' => true,
    ],
    [
        'id'         => 9,
        'titre'      => 'The Pragmatic Programmer',
        'auteur'     => 'Andrew Hunt & David Thomas',
        'annee'      => 1999,
        'categorie'  => 'informatique',
        'prix'       => 22000,
        'disponible' => false,
    ],
    [
        'id'         => 10,
        'titre'      => 'Fondation',
        'auteur'     => 'Isaac Asimov',
        'annee'      => 1951,
        'categorie'  => 'science-fiction',
        'prix'       => 7000,
        'disponible' => true,
    ],
];

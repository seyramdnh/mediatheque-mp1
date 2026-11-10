# Médiathèque IPNET – Catalogue dynamique (TP 1 – IT 231)

## Description du projet
Mini-site en **PHP 8+ natif** (sans framework, sans base de données) qui affiche le catalogue de livres
de la médiathèque IPNET. Les livres sont stockés dans un tableau associatif PHP (`data/livres.php`)
et les pages HTML sont générées dynamiquement.

Projet réalisé dans le cadre de l'UE **IT 231 – Développement Web I** (Licence, année 2026-2027).

## Prérequis
- PHP **8.0 ou supérieur** (vérifier avec `php -v`)
- Soit un serveur local (XAMPP, WAMP, MAMP), soit le serveur intégré de PHP
- Un navigateur web et Git

## Installation et lancement

### Option 1 – Serveur intégré de PHP (recommandé)
```bash
git clone <url-du-depot> mediatheque-mp1
cd mediatheque-mp1
php -S localhost:8000
```
Puis ouvrir <http://localhost:8000> dans le navigateur.

### Option 2 – XAMPP / WAMP / MAMP
1. Copier le dossier `mediatheque-mp1` dans `htdocs` (XAMPP/MAMP) ou `www` (WAMP).
2. Démarrer Apache.
3. Ouvrir <http://localhost/mediatheque-mp1/>.

## Structure du projet
```
mediatheque-mp1/
├── index.php          # Accueil
├── catalogue.php      # Catalogue + filtrage par catégorie
├── detail.php         # Détail d'un livre (?id=3)
├── apropos.php        # Page « À propos »
├── includes/
│   ├── header.php     # En-tête et menu communs
│   ├── footer.php     # Pied de page commun
│   └── fonctions.php  # Fonctions du site
├── data/
│   └── livres.php     # Tableau $livres (10 livres)
├── css/
│   └── style.css
└── README.md
```

## Fonctionnalités réalisées
- [x] **Accueil** : message de bienvenue, lien vers le catalogue, nombre total de livres (et de livres disponibles) calculé en PHP.
- [x] **Catalogue** : tableau HTML de tous les livres (titre, auteur, année, catégorie, prix, disponibilité) et nombre de livres affichés.
- [x] **Filtrage par catégorie** : liens et menu déroulant (`catalogue.php?categorie=roman`), validation du paramètre, message si la catégorie n'existe pas, retour à l'affichage complet.
- [x] **Détail d'un livre** : `detail.php?id=3`, vérification de l'existence de l'identifiant, messages d'erreur propres (identifiant absent, invalide ou inexistant).
- [x] **À propos** : présentation statique et date du jour affichée via une fonction PHP (`dateDuJour()`).
- [x] **Sécurité de base** : toutes les données affichées passent par `htmlspecialchars()` (fonction `e()`), les paramètres GET sont validés (`in_array`, `filter_var`).

## Fonctions (`includes/fonctions.php`)
| Fonction | Rôle |
|---|---|
| `afficherLivre(array $livre): string` | Génère la ligne HTML d'un livre |
| `filtrerParCategorie(array $livres, string $categorie): array` | Filtre les livres par catégorie |
| `trouverLivreParId(array $livres, int $id): ?array` | Retrouve un livre par son id (ou `null`) |
| `compterLivresDisponibles(array $livres): int` | Compte les livres disponibles |
| `e()`, `libelleCategorie()`, `formaterPrix()`, `obtenirCategories()`, `dateDuJour()` | Fonctions utilitaires |

## Auteur
DONHISSOU Seyram Fabrice - Design numérique multimédia et marketing digital  – IPNET Institute of Technology

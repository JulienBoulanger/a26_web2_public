<?php
// Le contrôleur est responsable de la gestion des requêtes et de la logique métier.
// Il interagit avec les modèles (BD) pour récupérer ou modifier des données,
// et prépare les données à afficher dans les vues.

function afficherPageAccueil()
{
    // Ici on se contente d'afficher la page d'accueil
    require 'vue/accueil.php';
}

function afficherPageFormulaire()
{
    // Affiche la page contenant le formulaire Bootstrap
    require 'vue/formulaire.php';
}

function inscrireAUnCours()
{
    // 1. Validation de la présence des données POST obligatoires
    if (empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['cours'])) {
        // Redirection sécurisée vers la page du formulaire en cas d'omission
        header('Location: index.php?action=afficherPageFormulaire');
        exit();
    }

    // 2. Tableau associatif servant à valider et faire correspondre la clé reçue avec son titre officiel
    $listeDesCours = [
        'web1'      => 'Développement Web 1 (PHP & MySQL)',
        'interface' => "Design d'interfaces (Bootstrap 5)",
        'prog1'     => 'Programmation 1 (JavaScript)'
    ];

    // Sécurité supplémentaire : s'assure que la valeur POST transmise correspond bien à une clé existante
    if (!array_key_exists($_POST['cours'], $listeDesCours)) {
        header('Location: index.php?action=afficherPageFormulaire');
        exit();
    }

    // Extraction du libellé du cours pour affichage
    $nomDuCoursSelectionne = $listeDesCours[$_POST['cours']];

    // 3. Routage vers la vue de confirmation
    require 'vue/confirmation.php';
}
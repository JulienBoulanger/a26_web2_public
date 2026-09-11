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
    // ==========================================
    // ÉTAPE 1 : Vérification de la présence des champs
    // ==========================================
    if (empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['cours'])) {
        header('Location: index.php?action=afficherPageFormulaire');
        exit();
    }

    // Récupération et nettoyage des espaces blancs inutiles
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $coursCle = trim($_POST['cours']);

    // Liste des cours autorisés pour la validation de correspondance
    $listeDesCours = [
        'web1'      => 'Développement Web 1 (PHP & MySQL)',
        'interface' => "Design d'interfaces (Bootstrap 5)",
        'prog1'     => 'Programmation 1 (JavaScript)'
    ];

    // ==========================================
    // ÉTAPE 2 & 3 : Vérification du format et des contraintes
    // ==========================================

    // 1. Validation du champ 'nom' : de 3 à 50 caractères
    $longueurNom = mb_strlen($nom);
    if ($longueurNom < 3 || $longueurNom > 50) {
        header('Location: index.php?action=afficherPageFormulaire');
        exit();
    }

    // 2. Validation du champ 'email' : format valide et max 255 caractères
    if (strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: index.php?action=afficherPageFormulaire');
        exit();
    }

    // 3. Validation du champ 'cours' : doit obligatoirement être un choix proposé
    if (!array_key_exists($coursCle, $listeDesCours)) {
        header('Location: index.php?action=afficherPageFormulaire');
        exit();
    }

    // Si toutes les validations passent, on prépare la variable pour la vue
    $nomDuCoursSelectionne = $listeDesCours[$coursCle];

    // Routage vers la vue de confirmation
    require 'vue/confirmation.php';
}

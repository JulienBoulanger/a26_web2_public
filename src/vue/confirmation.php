<?php
// Validation du typage pour le débogueur / éditeur VS Code
/** @var string $nomDuCoursSelectionne */

// Définition du titre de l'onglet.
$titreOnglet = 'Confirmation';
?>

<?php
// Démarrage de la mise en tampon de sortie.
ob_start();
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Confirmation</h1>
            
            <div class="alert alert-success p-4 shadow-sm" role="alert">
                <p class="fs-5">
                    Merci, <strong><?php echo htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'); ?></strong>, 
                    vous êtes inscrit au cours <strong><?php echo htmlspecialchars($nomDuCoursSelectionne, ENT_QUOTES, 'UTF-8'); ?></strong>.
                </p>
                <hr>
                <p class="mb-0 text-muted">
                    Un email de confirmation a été envoyé à l'adresse <strong><?php echo htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); ?></strong>.
                </p>
            </div>
            
            <div class="text-center mt-4">
                <a href="index.php?action=afficherPageAccueil" class="btn btn-primary">Retour à l'accueil</a>
            </div>
        </div>
    </div>
</div>

<?php
// Récupération de tout le contenu généré.
$contenu = ob_get_clean();
?>

<?php
// Chargement de la vue gérant l'ossature HTML globale de l'application.
require 'vue/gabarit.php';
?>

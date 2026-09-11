<?php
// Définition du titre de l'onglet.
$titreOnglet = 'Formulaire';
?>

<?php
// Démarrage de la mise en tampon de sortie.
ob_start();
?>

<div class="container col-md-6 offset-md-3">
    <h1 class="text-center my-4">Formulaire d'inscription</h1>
    
    <!-- Formulaire configuré pour POST et ciblant l'action inscrireAUnCours -->
    <form action="index.php?action=inscrireAUnCours" method="post">
        
        <!-- Champ 1 : Nom (input avec attribute name="nom") -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="nom" name="nom" required placeholder="Ex: Jean Tremblay">
        </div>

        <!-- Champ 2 : Courriel (input avec attribut name="email") -->
        <div class="mb-3">
            <label for="email" class="form-label">Adresse courriel</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Ex: jean.tremblay@email.com">
        </div>

        <!-- Champ 3 : Choix de cours (select avec attribut name="cours") -->
        <div class="mb-3">
            <label for="cours" class="form-label">Choix du cours</label>
            <select class="form-select" id="cours" name="cours" required>
                <option value="" selected disabled>Choisissez un cours...</option>
                <option value="web1">Développement Web 1 (PHP & MySQL)</option>
                <option value="interface">Design d'interfaces (Bootstrap 5)</option>
                <option value="prog1">Programmation 1 (JavaScript)</option>
            </select>
        </div>

        <!-- Bouton Soumettre -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Soumettre</button>
        </div>
        
    </form>
</div>

<?php
// Récupération de tout le contenu généré.
$contenu = ob_get_clean();
?>

<?php
// Chargement de la vue gabarit.php
require 'vue/gabarit.php';
?>

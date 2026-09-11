<?php
// Définition du titre de l'onglet.
$titreOnglet = 'Formulaire';
?>

<?php
// Démarrage de la mise en tampon de sortie.
ob_start();
?>

<div class="container col-md-6 offset-md-3 my-4">
    <h1 class="text-center mb-4">Formulaire d'inscription</h1>
    
    <!-- La classe Bootstrap 'needs-validation' et l'attribut 'novalidate' permettent 
         d'activer les styles d'erreur personnalisés de Bootstrap 5 -->
    <form action="index.php?action=inscrireAUnCours" method="post" class="needs-validation" novalidate>
        
        <!-- Champ 1 : Nom (3 à 50 caractères, obligatoire) -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom complet</label>
            <input 
                type="text" 
                class="form-control" 
                id="nom" 
                name="nom" 
                required 
                minlength="3" 
                maxlength="50" 
                placeholder="Ex: Jean Tremblay">
            <!-- Message Bootstrap en cas d'erreur -->
            <div class="invalid-feedback">
                Le nom est obligatoire et doit contenir entre 3 et 50 caractères.
            </div>
        </div>

        <!-- Champ 2 : Courriel (Format courriel, max 255 caractères, obligatoire) -->
        <div class="mb-3">
            <label for="email" class="form-label">Adresse courriel</label>
            <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                required 
                maxlength="255" 
                placeholder="Ex: jean.tremblay@email.com">
            <!-- Message Bootstrap en cas d'erreur -->
            <div class="invalid-feedback">
                Veuillez fournir une adresse courriel valide (maximum 255 caractères).
            </div>
        </div>

        <!-- Champ 3 : Choix de cours (Obligatoire) -->
        <div class="mb-3">
            <label for="cours" class="form-label">Choix du cours</label>
            <select class="form-select" id="cours" name="cours" required>
                <option value="" selected disabled>Choisissez un cours...</option>
                <option value="web1">Développement Web 1 (PHP & MySQL)</option>
                <option value="interface">Design d'interfaces (Bootstrap 5)</option>
                <option value="prog1">Programmation 1 (JavaScript)</option>
            </select>
            <!-- Message Bootstrap en cas d'erreur -->
            <div class="invalid-feedback">
                Veuillez sélectionner un cours dans la liste.
            </div>
        </div>

        <!-- Bouton Soumettre -->
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Soumettre</button>
        </div>
        
    </form>
</div>

<!-- Script JavaScript natif de Bootstrap pour activer la validation visuelle interactive -->
<script>
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

<?php
// Récupération de tout le contenu généré.
$contenu = ob_get_clean();
?>

<?php
// Chargement de la vue gabarit.php
require 'vue/gabarit.php';
?>

/* ************* Jeune et referent ************* */

function maxChoix(){
    var max = 4;
    var cb = document.querySelectorAll('input[type=checkbox]');

    for (var i = 0; i < cb.length; i++) {
        cb[i].onclick = function(){
        var count = document.querySelectorAll('input[type=checkbox]:checked').length;

        if (count > max) {
          alert("Vous ne pouvez choisir que " + max + " options.");
          this.checked = false;
        }
      }
    }
}

/* ************* Jeune ************* */

function verifierFormulaire(event) {
  var checkboxes = document.getElementsByName('qualites[]');
  var cocher = false;

  for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
          cocher = true;
          break;
      }
  }
  if (!cocher) {
      alert("Veuillez cocher au moins une option.");
      document.getElementById("ajouterBtn").disabled = true;
      event.preventDefault(); // Empêcher la soumission du formulaire

      // Réactiver le bouton après 2 secondes
      setTimeout(function() {
      document.getElementById("ajouterBtn").disabled = false;
      }, 2000);
  }else{
    alert("Votre demande de référence a été envoyé.");
  }
}
        /* ************* Connexion ************* */
function affichage(){
  var afficher = document.getElementById("mdp");
  if(afficher.type === "password"){
      afficher.type = "texte";
  }
  else{
      afficher.type = "password";
  }
}

/* ************* Profil ************* */

function affichage_eye() {
  var afficher = document.getElementById("mdp");
  var eye = document.getElementById("eye");

  if (afficher.type === "password") {
      afficher.type = "text";
      eye.src = "/boutton/eye.svg";
  } else {
      afficher.type = "password";
      eye.src = "/boutton/eye-closed.svg";
  }
}

/* ************* Liste reference ************* */

function envoyer(){
  alert("Votre mail a été envoyé au consultant.");
}

function MontrerDetails(element) {
  const details = element.querySelector('.reference-details');
  if (details.style.display === 'block') {
      details.style.display = 'none';
  } else {
      details.style.display = 'block';
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var boutonsSuppression = document.querySelectorAll('.supprimer-reference');
  boutonsSuppression.forEach(function(bouton) {
      bouton.addEventListener('click', function() {
      var referenceId = this.getAttribute('data-reference-id');
      if (confirm('Êtes-vous sûr de vouloir supprimer cette référence ?')) {
          supprimerReference(referenceId);
      }
      });
  });

  function supprimerReference(referenceId) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'supprimer_reference.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // Recharger la page après la suppression
          location.reload();
      }
      };
      xhr.send('referenceId=' + encodeURIComponent(referenceId));
  }
});

/* ************* Page Référent ************* */

function promptValidation() {
  var commentaire = prompt("Veuillez expliquer le refus de référence");
  if (commentaire) { // Le commentaire a été saisi dans la boîte de dialogue prompt
    
    document.getElementById("message").value = commentaire;// Envoyer le commentaire en tant que champ POST

    return true; // Soumet le formulaire
  } else {
    return false; // Annule la soumission du formulaire
  }
}

function verifierFormulaire_ref(event) {
  var checkboxes = document.getElementsByName('qualites[]');
  var cocher = false;

  for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
          cocher = true;
          break;
      }
  }
  if (!cocher) {
      alert("Veuillez cocher au moins une option.");
      document.getElementById("ajouterBtn").disabled = true;
      event.preventDefault(); // Empêcher la soumission du formulaire

      // Réactiver le bouton après 2 secondes
      setTimeout(function() {
      document.getElementById("ajouterBtn").disabled = false;
      }, 2000);
  }else{
    alert("La confirmation de référence a été envoyé.");
  }
}

/* ************* Toutes les pages ************* */

function Statut(categorie) {
    if (categorie === 'jeune') {
        alert("Veuillez vous connecter à l'espace jeune.");
    } else if (categorie === 'referent') {
        alert("Vous ne pouvez pas accéder à l'espace référent.");
    } else if (categorie === 'consultant') {
        alert("Vous ne pouvez pas accéder à l'espace consultant.");
    }
    else if (categorie === 'jeune2') {
      alert("Vous ne pouvez pas accéder à l'espace jeune.");
  }
}


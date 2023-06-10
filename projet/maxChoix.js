
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


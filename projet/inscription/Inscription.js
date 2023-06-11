document.getElementById("inscription").addEventListener("submit", function(e) {
	e.preventDefault(); 
 
	var data = new FormData(this); // Crée un objet FormData pour collecter les données du formulaire
 
	var xhr = new XMLHttpRequest(); // Crée un objet XMLHttpRequest pour effectuer des requêtes HTTP
 
	xhr.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//console.log(this.response);
			window.location.href = "/connexion/connexion.php";
		} else if (this.readyState == 4) {
			// La requête a été terminée, mais il y a eu une erreur
			alert("Une erreur est survenue...");
		}
	};
 
	xhr.open("POST", "Inscription.php", true);
	xhr.responseType = "json";
	// xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(data);
 
	return false; // Empêche le formulaire de se soumettre normalement
	
});

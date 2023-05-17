<?php
	include("session.php");
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Jeunes 6.4 </title>
        <link rel="stylesheet" type="text/css" href="jeune.css">
        <script src="maxChoix.js" type="text/javascript"> </script>
    </head>
    
    <body>

        <div class="bande-grise">
            
            <div class="bande-centree">
                <div class="texte2">
                    <a href="jeune.php" class="aj">
                        <span> <button class="jeune"> JEUNE </button> </span>
                    </a>
                    
                    <a href="referent.html" class="ar">
                        <span class="referent">RÉFÉRENT</span>
                    </a>
                    
                    
                    <a href="consultant.html" class="ac">
                        <span class="consultant">CONSULTANT</span>
                    </a>
                    
                    <a href="partenaire.html">
                        <span> <button class="partenaires"> PARTENAIRES </button> </span>
                    </a>
                </div>
            </div>

            <div class="contenu">
                <a href="accueil.html">
                    <img src="/image/jeunes.PNG" alt="Image">
                </a>
                    
                <div class="texte">
                    <p> JEUNE </p>
                </div>
                <div class="t2">
                    <p> Je donne de la valeur à mon engagement</p>
                </div>
                <div class="deconnexion">
                <a href="deconnexion/deconnexion.php" class="button">Déconnexion</a>
                </div>
            </div>
            
        </div>
        
        <p class="dec"> Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</p>
        
        <img src="/image/traitRose.jpg" alt="traitrose" class="traitrose">
            
        <form  action="mis_a_jour.php" method="post">

            <div class="container">

                <fieldset class="cadreInfo">
                    <label for="nom"> Nom : </label>
                    <input type="text" id="nom" name="nom" maxlenght="50" onclick="test()" required value="<?php echo $nom; ?>">
                            
                    <br><label for="prenom"> Prénom : </label>
                    <input type="text" id="prenom" name="prenom" maxlenght="50" required value="<?php echo $prenom; ?>">
                        
                    <br>
                    <label for="date">Date de naissance : </label>
                    <input type="date" id="date" name="date"  pattern="\d{2}/\d{2}/\d{4}" required maxlenght="4" value="<?php echo $date; ?>">
                    <br>
                    <label for="email"> Email : </label>
                    <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
                            
                    <br>
                    <label for="reseau"> Réseau Social :  </label>
                    <input type="text" id="reseau" name="reseau" required value="<?php echo $reseau; ?>">
                        
                    <br><br>
                    <label for="engagement"> Mon engagement : </label>
                    <input type="text" id="engagement" name="engagement" value="<?php echo $engagement; ?>">
                            
                    <br>
                    <label for="duree"> Durée : </label>
                    <input type="text" id="duree" name="duree" value="<?php echo $duree; ?>">    
                        
                </fieldset>
            </div>


            <div class="checkboxes">    
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Autonome" onclick="maxChoix()" <?php if (in_array('Autonome', $qualites)) echo 'checked'; ?>>Autonme</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Passionné" onclick="maxChoix()" <?php if (in_array('Passionné', $qualites)) echo 'checked'; ?>>Passioné</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Réfléchi" onclick="maxChoix()" <?php if (in_array('Réfléchi', $qualites)) echo 'checked'; ?>>Réfléchi</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="A l'écoute" onclick="maxChoix()" <?php if (in_array("A l'écoute", $qualites)) echo 'checked'; ?>>A l'écoute</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Organisé" onclick="maxChoix()" <?php if (in_array('Organisé', $qualites)) echo 'checked'; ?>>Organisé</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Fiable" onclick="maxChoix()" <?php if (in_array('Fiable', $qualites)) echo 'checked'; ?>>Fiable</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Patient" onclick="maxChoix()" <?php if (in_array('Patient', $qualites)) echo 'checked'; ?>>Patient</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Responsable" onclick="maxChoix()" <?php if (in_array('Responsable', $qualites)) echo 'checked'; ?>>Responsable</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Social" onclick="maxChoix()" <?php if (in_array('Social', $qualites)) echo 'checked'; ?>>Social</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Optimiste" onclick="maxChoix()" <?php if (in_array('Optimiste', $qualites)) echo 'checked'; ?>>Optimiste</label> 


                <div class="demande">
                <a href="creation_refrence.html" class="button" onclick="verifierFormulaire()">Demande</a>
                </div>
                <button type="submit" class="valider">Valider</button>
        
            </div>
            

        </form>  
        <script>
	function verifierFormulaire() {
        var engagement = document.getElementById('engagement');
        var duree = document.getElementById('duree');
        var checkboxes = document.getElementsByName('qualites');
        var vide = true;

        for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
        vide = false;
        break;
         }
        }
      
        if (engagement.value !== '' && duree.value !== '') {
            if(!vide){
                // Les champs requis sont remplis, permettre à l'utilisateur de cliquer sur le bouton
                document.getElementById('monFormulaire').submit();
            }
         
        } else {
          // Afficher un message d'erreur ou effectuer une autre action appropriée
          alert('Veuillez remplir tous les champs requis.');
          event.preventDefault(); // Annuler l'action par défaut du lien
        }
      }
      
</script>

          
        
        <div class="bandeRose">
            <p class="jss"> Je suis* </p>
        </div>
    
        <p class="maxChoix"> * Faire 4 choix maximum </p>
        
    </body>
</html>


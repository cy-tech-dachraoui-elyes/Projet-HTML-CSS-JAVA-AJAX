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
                    <input type="text" id="prenom" name="prenom" maxlenght="50" value="<?php echo $prenom; ?>">
                        
                    <br>
                    <label for="date">Date de naissance : </label>
                    <input type="date" id="date" name="date"  pattern="\d{2}/\d{2}/\d{4}" required maxlenght="4" value="<?php echo $date; ?>">
                    <br>
                    <label for="email"> Email : </label>
                    <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
                            
                    <br>
                    <label for="reseau"> Réseau Social :  </label>
                    <input type="text" id="reseau" name="reseau" value="<?php echo $reseau; ?>">
                        
                    <br><br>
                    <label for="engagement"> Mon engagement : </label>
                    <input type="text" id="engagement" name="engagement" value="<?php echo $engagement; ?>">
                            
                    <br>
                    <label for="duree"> Durée : </label>
                    <input type="text" id="duree" name="duree" value="<?php echo $duree; ?>">    
                        
                </fieldset>
            </div>


            <div class="checkboxes">    
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Autonome" onclick="maxChoix()">Autonme</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Passionné" onclick="maxChoix()">Passioné</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Réfléchi" onclick="maxChoix()">Réfléchi</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="A l'écoute" onclick="maxChoix()">A l'écoute</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Organisé" onclick="maxChoix()">Organisé</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Passioné" onclick="maxChoix()">Passioné</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Fiable" onclick="maxChoix()">Fiable</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Patient" onclick="maxChoix()">Patient</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Réfléchi" onclick="maxChoix()">Réfléchi</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Responsable" onclick="maxChoix()">Responsable</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Social" onclick="maxChoix()">Social</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Optimiste" onclick="maxChoix()">Optimiste</label> 

                <button type="submit" class="valider">Valider</button>
        
            </div>
            

        </form>    
          
        
        <div class="bandeRose">
            <p class="jss"> Je suis* </p>
        </div>
    
        <p class="maxChoix"> * Faire 4 choix maximum </p>
        
    </body>
</html>


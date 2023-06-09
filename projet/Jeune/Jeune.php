<?php
    include("session.php"); //Inclusion d'un fichier qui utilise les paramètres de la session en cours.
   
    // ... votre code PHP ...
    echo '<script>var userReferences = ' . json_encode($user['references']) . ';</script>';


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Jeunes 6.4 </title>
        <link rel="stylesheet" type="text/css" href="Jeune.css">
        <script src="../maxChoix.js" type="text/javascript"> </script>
    </head>
    
    <body>

        <div class="bande-grise">
            
            <div class="bande-centree">
                <div class="texte2">
                    <a href="Jeune.php" class="aj">
                        <span> <button class="jeune"> JEUNE </button> </span>
                    </a>
                    
                    <a href="../referent.php" class="ar">
                        <span class="referent">RÉFÉRENT</span>
                    </a>
                    <a href="../consultant.php" class="ac">
                        <span class="consultant">CONSULTANT</span>
                    </a>
                    
                    <a href="../partenaire.html">
                        <span> <button class="partenaires"> PARTENAIRES </button> </span>
                    </a>
                </div>
            </div>

            <div class="contenu">
                <a href="../accueil.html">
                    <img src="/image/jeunes.PNG" alt="Image">
                </a>
                    
                <div class="texte">
                    <p> JEUNE </p>
                </div>
                <div class="t2">
                    <p> Je donne de la valeur à mon engagement</p>
                </div>
                
            </div>
            <div class="commande">
                <div class="profil">
                    <a href="/profil/profil.php" class="button">Profil</a>
                </div>
                <div class="liste">
                    <a href="/Jeune/liste_reference.php" class="button" onclick="verifierRef(event)">Voir références</a>
                </div>
                <div class="deconnexion">
                    <a href="/deconnexion/deconnexion.php" class="button">Déconnexion</a>
                </div>
            </div>

        </div>
        
        <p class="dec"> Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</p>
        
        <img src="/image/traitRose.jpg" alt="traitrose" class="traitrose">
            
        <form action="reference.php" method="post">

            <div class="container">
            <fieldset class="cadreInfo1">
            <legend>Jeune</legend>
                    <label for="email"> Email : </label>
                    <input type="email" id="email" name="mail" required value="<?php echo $email; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">        
                </fieldset>
                <fieldset class="cadreInfo">
                <legend>Referent</legend>
                    <label for="nom"> Nom : </label>
                    <input type="text" id="nom" name="nomR" maxlenght="50" required>
                            
                    <br><label for="prenom"> Prénom : </label>
                    <input type="text" id="prenom" name="prenomR" maxlenght="50" required >
                        
                    <br>
                    <label for="email"> Email : </label>
                    <input type="email" id="email" name="mailR" required >
                            
                    <br><br>
                    <label for="engagement"> Mon engagement : </label>
                    <input type="text" id="engagement" name="engagement" required>
                            
                    <br>
                    <label for="duree"> Durée : </label>
                    <input type="text" id="duree" name="duree" required>
                    <br>
                    <label for="milieu"> Milieu : </label>
                    <input type="text" id="milieu" name="milieu" required >       

                </fieldset>
            </div>


            <div class="checkboxes">    
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Autonome" onclick="maxChoix()">Autonme</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Passionné" onclick="maxChoix()" >Passioné</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Réfléchi" onclick="maxChoix()">Réfléchi</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="A l'écoute" onclick="maxChoix()">A l'écoute</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Organisé" onclick="maxChoix()">Organisé</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Fiable" onclick="maxChoix()" >Fiable</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Patient" onclick="maxChoix()" >Patient</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Responsable" onclick="maxChoix()">Responsable</label> 
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Social" onclick="maxChoix()">Social</label>
                <label class="qualite"><input type="checkbox" name="qualites[]" value="Optimiste" onclick="maxChoix()">Optimiste</label> 

                <button type="submit" class="valider" onclick="verifierFormulaire(event)" id="ajouterBtn">Valider</button>
        
            </div>
            

        </form>
        <script>
             var userReferences = <?php echo $nbref; ?>;
            function verifierFormulaire(event) { //  Vérifie si au moins une case "qualité" est cochée.
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
                }

            }

            function verifierRef(event) {
                if (userReferences == null) {
                    alert("Vous n'avez pas de référent.");
                    event.preventDefault();
                }
            }

        </script>   

        <div class="bandeRose">
            <p class="jss"> Je suis* </p>
        </div>
    
        <p class="maxChoix"> * Faire 4 choix maximum </p>
        
    </body>
</html>


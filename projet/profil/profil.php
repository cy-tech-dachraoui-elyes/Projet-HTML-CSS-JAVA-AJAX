<?php
	include("session.php");
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Jeunes 6.4 </title>
        <link rel="stylesheet" type="text/css" href="profil.css">
	<script src="../fonction.js" type="text/javascript"> </script>
    </head>
    
    <body>

        <div class="bande-grise">
            
            <div class="bande-centree">
                <div class="texte2">
                    <a href="../accueil.html" class="aj" >
                        <span class="accueil">Accueil</span>
                    </a>
                    
                    <a href="profil.php" class="ar">
                        <span class="profil">Profil</span>
                    </a>
                    
                    
                    <a href="/Jeune/Jeune.php" class="ac">
                        <span class="demande" valeur="3">Demandes de Référent</span>
                    </a>
                    
                    <a href="/Jeune/liste_reference.php">
                        <span> <button class="liste" onclick="verifierRef(event)">Liste des Référents</button> </span>
                    </a>
                </div>
            </div>

            <div class="contenu">
                <a href="../accueil.html">
                    <img src="/image/jeunes.PNG" alt="Image" class="jeune">
                </a>
                    
                <div class="texte">
                    <p>JEUNE </p>
                </div>
                
            </div>
            <div class="deconnexion">
                <a href="/deconnexion/deconnexion.php" class="button">Déconnexion</a>
            </div>
        </div>
        
        <p class="dec">Personnalisez votre profil : exprimez votre identité, partagez vos informations.</p>

        <img src="/image/logo_jeune.png" alt="Image" class="dec">
        
        <img src="/image/traitRose.jpg" alt="traitrose" class="traitrose">
            
        <form  id="monFormulaire" action="mis_a_jour.php" method="post">

            <div class="container">

                <fieldset class="cadreInfo">
                 <!-- valeur "id" sera envoyée par POST mais ne passe pas par le bloc formulaire -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <label for="nom"> Nom : </label>
                    <input type="text" id="nom" name="nom" maxlenght="50" required value="<?php echo $nom; ?>">
                            
                    <br><label for="prenom"> Prénom : </label>
                    <input type="text" id="prenom" name="prenom" maxlenght="50" required value="<?php echo $prenom; ?>">
                        
                    
                    <br>
                    <label for="email"> Email : </label>
                    <input type="email" id="email" name="email" required value="<?php echo $email; ?>">     
                    <br>
                    <label for="reseau"> Réseau Social :  </label>
                    <input type="text" id="reseau" name="reseau" required value="<?php echo $reseau; ?>">
                    <br><br>
                    <label for="date">Date de naissance : </label>
                    <input type="date" id="date" name="date"  pattern="\d{2}/\d{2}/\d{4}" required maxlenght="4" value="<?php echo $date; ?>">
                    <br>
                    <label for="tel"> Tel :  </label>
                    <input type="tel" id="tel" name="telephone" value="<?php echo $tel; ?>" placeholder="Format : 07 04 23 17 01">
                    <br>
                    <label for="Mdp"> Mot de passe :  </label>
                    <img class="imgs" width="16px" height="16px" src="/bouton/eye-closed.svg" alt="password" onclick="affichage_eye()" id="eye">
                    <input type="password" id="mdp" name="mdp" required value="<?php echo $mdp; ?>">
                    <br><br>
                    <button type="submit" class="valider">Valider</button>
                </fieldset>
            </div>
                
        </form>
        <script>
    </script> 
    </body>
</html>
<script>
    var userReferences = <?php echo $nbref; ?>;

    function verifierRef(event) {
        if (userReferences == null) {
            alert("Vous n'avez pas de référent.");
            event.preventDefault();
        }
    }
</script>


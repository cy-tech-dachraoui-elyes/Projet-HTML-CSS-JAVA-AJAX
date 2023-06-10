<?php
$emailC = urldecode($_GET['emailC']);
$id = $_GET['id'];
// Charger le contenu du fichier utilisateurs.json dans une variable
$json = file_get_contents('../utilisateurs.json');

// Convertir le contenu JSON en tableau associatif PHP
$utilisateurs = json_decode($json, true);

foreach ($utilisateurs['jeune'] as $utilisateur) {
    if ($utilisateur['id'] == $id) {// Vérifier le compte utilisateur jeune
        // Afficher les informations de l'utilisateur
            $id = $utilisateur['id'];
            $prenom = $utilisateur['prenom'];
            $nom = $utilisateur['nom'];
            $email = $utilisateur['email'];
            $date = $utilisateur['date'];
            $reseau = $utilisateur['reseau'];
            $tel = $utilisateur['tel'];
            $mdp = $utilisateur['mdp'];

            // Récupérer les références de l'utilisateur
            $references = $utilisateur['references'];
            $qualites = array_column($references, 'qualites');



            
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Jeunes 6.4 </title>
        <link rel="stylesheet" type="text/css" href="consultant.css">
    </head>
    
    <body>

        <div class="bande-grise">
            
        <div class="bande-centree">
                <div class="texte2">
                    <a href="/Jeune/Jeune.php" class="aj">
                        <span> <button class="jeune"> JEUNE </button> </span>
                    </a>
                    
                    <a href="/referent/referent.php" class="ar">
                        <span class="referent">RÉFÉRENT</span>
                    </a>
                    <a href="/consultant/consultant.php" class="ac">
                        <span class="consultant">CONSULTANT</span>
                    </a>
                    
                    <a href="../partenaire.html">
                        <span> <button class="partenaires"> PARTENAIRES </button> </span>
                    </a>
                </div>
        </div>

            <div class="contenu">
                <a href="../accueil.html">
                    <img src="/image/jeunes.PNG" alt="Image" class="jeune">
                </a>
                    
                <div class="texte">
                    <p>CONSULTANT </p>
                </div>
                <div class="t2">
                    <p> Je donne de la valeur à mon engagement</p>
                </div>
                
            </div>
            <div class="commande">
                <div class="refus">
                <form method="POST" action="/mail/mailC_refus.php">

                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="nom" value="<?php echo $nom; ?>">
                    <input type="hidden" name="prenom" value="<?php echo $prenom; ?>">

                    <button type ="submit" class="bouton" >Refuser</button>
                </form>
                </div>

                <div class="validation">
                <form method="POST" action="/mail/mailC_valide.php">

                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="nom" value="<?php echo $nom; ?>">
                    <input type="hidden" name="prenom" value="<?php echo $prenom; ?>">

                    <button type ="submit" class="bouton" >Valider</button>
                </form>
                </div>
            </div>
        </div>
        
        <p class="dec">Valider cet engagement en prenant en compte sa valeur.</p>


        
        <img src="/image/traitBleu.jpg" alt="traitBleu" class="traitBleu">
            

            <div class="container">

                <fieldset class="cadreInfo1">
                 <!-- valeur "id" sera envoyée par POST mais ne passe pas par le bloc formulaire -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="jeune" class="Titre">JEUNE</label>
                    <br><br>

                    <label for="Jeune"> Nom</label>
                    <input type="text" id="nom" name="nom" maxlenght="50" readonly value="<?php echo $nom; ?>">
                            
                    <br><label for="prenom"> Prénom : </label>
                    <input type="text" id="prenom" name="prenom" maxlenght="50" readonly value="<?php echo $prenom; ?>">
                    
                    <br>
                    <label for="date">Date de naissance : </label>
                    <input type="date" id="date" name="date"  pattern="\d{2}/\d{2}/\d{4}" readonly maxlenght="4" value="<?php echo $date; ?>">    
                    
                    <br>
                    <label for="email"> Email : </label>
                    <input type="email" id="email" name="email" readonly value="<?php echo $email; ?>">     
                    <br>
                    <label for="reseau"> Réseau Social :  </label>
                    <input type="text" id="reseau" name="reseau" readonly value="<?php echo $reseau; ?>">
                    
                </fieldset></div>
        <div class="references-contain">  
        <?php foreach($references as $reference): ?>
        <?php if ($reference['cochee'] == true): ?>
        <div class="references-container">
        <fieldset class="cadreInfo2">
            <!-- valeur "id" sera envoyée par POST mais ne passe pas par le bloc formulaire -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="jeune" class="Titre">REFERENT</label>
            <br><br>

            <label for="nom"> Nom :</label>
            <input type="text" id="nom" name="nom" maxlength="50" readonly value="<?php echo $reference['nom_ref']; ?>">
                                
            <br><label for="prenom"> Prénom : </label>
            <input type="text" id="prenom" name="prenom" maxlength="50" readonly value="<?php echo $reference['prenom_ref']; ?>">
                        
            <br>
            <label for="email"> Email : </label>
            <input type="email" id="email" name="email" readonly value="<?php echo $reference['email_ref']; ?>">     
            <br><br>
            <label for="engagement"> Engagement : </label>
            <input type="text" id="engagement" name="engagement" readonly value="<?php echo $reference['engagement']; ?>">
            <br>
            <label for="duree"> Durée : </label>
            <input type="text" id="duree" name="duree" readonly value="<?php echo $reference['duree']; ?>">  
            <br>
            <label for="milieu">Milieu : </label>
            <input type="text" id="milieu" name="milieu" readonly value="<?php echo $reference['milieu']; ?>">  
            <br><br>


            <label for="milieu">Qualite: </label>
            <div class="qualites-container">
            <?php foreach($reference['qualites_ref'] as $qualite_ref): ?>

                <div class="checkbox-container">
                    <input type="checkbox" name="<?php echo $qualite_ref; ?>" checked onclick="return false;" disabled>
                    <label class="checkbox-label"><?php echo $qualite_ref; ?></label>
                </div>

            <?php endforeach; ?> 
            </div>    
            <label for="appreciation"> Appréciation : </label>
            <textarea id="appreciation" name="appreciation" readonly><?php echo $reference['Commentaire']; ?></textarea>
        </fieldset>
        </div><?php endif; ?> <?php endforeach; ?>
</div>

    </body>
</html>

<script>

// Cette fonction affiche le mot de passe et l'oeil ouvert/fermé

        function affichage(){
            var afficher = document.getElementById("mdp");
            var eye = document.getElementById("eye");
            if(afficher.type === "password"){
                afficher.type = "texte";
                eye.src = "/boutton/eye.svg";
            }
            else{
                afficher.type = "password";
                eye.src = "/boutton/eye-closed.svg";
            }
        }

</script>

<?php
$emailR = urldecode($_GET['emailR']);
$id = $_GET['id'];
// Charger le contenu du fichier utilisateurs.json dans une variable
$json = file_get_contents('utilisateurs.json');

// Convertir le contenu JSON en tableau associatif PHP
$utilisateurs = json_decode($json, true);

foreach ($utilisateurs['jeune'] as $utilisateur) {
    if ($utilisateur['id'] == $id) {// Vérifier le compte utilisateur jeune
        $email = $utilisateur['email'];
        foreach ($utilisateur['references'] as $referent) {
            if ($referent['email_ref'] == $emailR) {
                $nomR = $referent['nom_ref'];
                $prenomR = $referent['prenom_ref'];
                $engagement = $referent['engagement'];
                $duree = $referent['duree'];
                $milieu = $referent['milieu'];
                $qualites = $referent['qualites'];
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Jeunes 6.4 </title>
        <link rel="stylesheet" type="text/css" href="referent.css">
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
            
        
            
            <div class="commentaire">
                <p class="comment"> COMMENTAIRES </p>
            </div>
            
            <div class="contenu">
                <a href="accueil.html">
                    <img src="/image/jeunes.PNG" alt="Image">
                </a>
                
                
                <div class="texte">
                    <p> RÉFÉRENT </p>
                </div>
                <div class="t2">
                    <p> Je confirme la valeur de ton engagement</p>
                </div>
            </div>
            
        </div>
        
        <p class="dec">  Confirmez cette expérience et ce que vous avez <br>pu constater au contact de ce jeune. </p>

        <img src="/image/traitvert.jpg" alt="traitvert" class="traitvert">

        <div class="container">
            
            <div class="checkboxes">
                
                <form method="POST" action="validation_reference.php">
                    <div class="info">
                    <fieldset class="infos">
                        <!-- valeur "id" sera envoyée par POST mais ne passe pas par le bloc formulaire -->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <label for="prenom"> Nom : </label>
                        <input type="text" id="nom" name="nom" maxlenght="50" value="<?php echo $nomR; ?>">
                            
                        <br><label for="prenom"> Prénom : </label>
                        <input type="text" id="prenom" name="prenom" maxlenght="50" value="<?php echo $prenomR; ?>">
                        
                        <br>
                        <label for="date"> Milieu: </label>
                        <input type="text" id="prenom" name="prenom" maxlenght="50" value="<?php echo $milieu; ?>">
                        <br>
                        <label for="email"> Email : </label>
                        <input type="email" id="email" name="email" value="<?php echo $emailR; ?>">
                            
                        <br>
                        <label for="reseau"> Réseau Social :  </label>
                        <input type="text" id="reseau" name="reseau" value="<?php echo $email; ?>">
                            
                        <br><br>
                        <label for="engagement"> Mon engagement: </label>
                        <input type="text" id="engagement" name="engagement" value="<?php echo $engagement; ?>">
                            
                        <br>
                        <label for="duree"> Durée : </label>
                        <input type="text" id="duree" name="duree" value="<?php echo $duree; ?>">
                            
                        
                    </fieldset>
                    </div>
                    </div>
                    <div>
<!--                <label for="commentaire">Commentaire:</label>-->
                <textarea id="commentaire" name="commentaire" required class="comm"></textarea><br>
            </div>
                    <label><input type="checkbox" name="qualites[]" value="Autonome" onclick="maxChoix()">Autonome</label>
                    <label><input type="checkbox" name="qualites[]" value="Passioné" onclick="maxChoix()">Passioné</label>
                    <label><input type="checkbox" name="qualites[]" value="Réfléchi" onclick="maxChoix()">Réfléchi</label>
                    <label><input type="checkbox" name="qualites[]" value="A l'écoute" onclick="maxChoix()">A l'écoute</label>
                    <label><input type="checkbox" name="qualites[]" value="Organisé" onclick="maxChoix()">Organisé</label>
                    <label><input type="checkbox" name="qualites[]" value="Fiable" onclick="maxChoix()">Fiable</label>
                    <label><input type="checkbox" name="qualites[]" value="Patient" onclick="maxChoix()">Patient</label>
                    <label><input type="checkbox" name="qualites[]" value="Responsable" onclick="maxChoix()">Responsable</label>
                    <label><input type="checkbox" name="qualites[]" value="Social" onclick="maxChoix()">Social</label>
                    <label><input type="checkbox" name="qualites[]" value="Optimiste" onclick="maxChoix()">Optimiste</label>

                    <button type="submit" class="valider">Valider</button>
                </form>
    
            
            </div>
        
        
        
        <div class="bandeVerte">
            <p class="ilEst"> Je confirme son/sa* </p>
        </div>
    
        <p class="maxChoix"> * Faire 4 choix maximum </p>
        
    </body>
</html>


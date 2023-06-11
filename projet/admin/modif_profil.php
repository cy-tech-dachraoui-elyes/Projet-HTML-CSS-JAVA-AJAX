<?php
session_start();

// Vérifier si l'utilisateur est connecté et s'il est un administrateur
if($_SESSION['role'] === 'admin') {
    $users = json_decode(file_get_contents("../utilisateurs.json"), true);
} else {
    header("Location: ../accueil.html");
    exit;
}
// Initialise $user_to_edit
$user_to_edit = null;

$userId = intval($_GET['id']);  // convertir l'id en un entier

// Si le formulaire a été soumis, mettez à jour l'utilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach($users['jeune'] as &$user) {
        if($user['id'] === $userId){
            // Mettre à jour les informations de l'utilisateur
            $user['nom'] = $_POST['nom'];
            $user['prenom'] = $_POST['prenom'];
            $user['email'] = $_POST['email'];
            $user['date'] = $_POST['date'];
            $user['reseau'] = $_POST['reseau'];
            // Enregistrer les modifications dans le fichier JSON
            file_put_contents("../utilisateurs.json", json_encode($users,JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT));
            // Mettre à jour l'utilisateur à modifier
            $user_to_edit = $user;
            break;
        }
    }
} else {
    // Trouver l'utilisateur à modifier
    foreach($users['jeune'] as $user) {
        if($user['id'] === $userId){
            $user_to_edit = $user;
            break;
        }
    }
}

if($user_to_edit === null){
    echo "Aucun utilisateur trouvé";
    exit();
}
?>

<style>
body{
    margin: 10;
    padding: 0;
    box-sizing: border-box;
}

form.user {
    border: 1px solid #ff007f;
    background-color: #ffffff;
    padding: 20px;
    width: 300px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
}

input[type="text"], input[type="date"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
}

input[type="submit"] {
    display: inline-block;
    margin-top: 10px;
    background-color: #ff007f;
    color: #ffffff;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

input[type="submit"]:hover {
    background-color: #e77fb1;
}
</style>


<!-- Afficher un formulaire pour modifier l'utilisateur -->
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $user_to_edit['id']; ?>">
    Nom: <input type="text" name="nom" value="<?php echo $user_to_edit['nom']; ?>"><br>
    Prénom: <input type="text" name="prenom" value="<?php echo $user_to_edit['prenom']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $user_to_edit['email']; ?>"><br>
    Date de naissance: <input type="date" name="date" value="<?php echo $user_to_edit['date']; ?>"><br>
    Réseau: <input type="text" name="reseau" value="<?php echo $user_to_edit['reseau']; ?>"><br>
    <input type="submit" value="Modifier">
</form>
<button onclick="location.href='admin.php'">Retour à la page administrateur</button>

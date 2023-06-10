<?php
session_start();

if (isset($_POST['referenceId'])) {
  $referenceId = $_POST['referenceId'];

  // Récupérer les données des utilisateurs depuis le fichier JSON
  $users = json_decode(file_get_contents("../utilisateurs.json"), true);

  // Trouver l'utilisateur connecté dans le tableau des utilisateurs
  foreach ($users['jeune'] as &$user) {
    if ($user['id'] === $_SESSION['user']) {
      // Trouver l'index de la référence à supprimer
      $index = -1;
      foreach ($user['references'] as $key => $reference) {
        if ($reference['email_ref'] === $referenceId) {
          $index = $key;
          break;
        }
      }

      // Supprimer la référence du tableau
      if ($index !== -1) {
        array_splice($user['references'], $index, 1);
      }

      break;
    }
  }

  // Enregistrer les modifications dans le fichier JSON
  file_put_contents("../utilisateurs.json", json_encode($users,JSON_UNESCAPED_UNICODE| JSON_PRETTY_PRINT));
}
?>

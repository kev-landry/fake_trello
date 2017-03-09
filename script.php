<?php
  session_start();
  try {    //Connexion  BDD via PDO
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root'); //le array sert à montrer les erreurs
  } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
  }



  if (isset($_POST['pseudo']) and isset($_POST['password'])) {
      $pseudo = $_POST['pseudo'];
      $password = $_POST['password'];

    //On compte combien de fois on retrouve le pseudo avec COUNT
    $verif_pseudo = $bdd->query('SELECT COUNT(*) FROM user WHERE pseudo = \''.$pseudo.'\' ');
      if ($verif_pseudo->fetchColumn() == 0) { // on check le pseudo de colonne en colonne

        // Si aucun pseudo on redirige
        header('Location: wrong.html');
      } else {    //Pseudo existant

        //query dans la BDD pour capturer le pseudo
          $reponse_login = $bdd->query('SELECT password FROM user WHERE pseudo = \''.$pseudo.'\' LIMIT 1');
          $donnees = $reponse_login->fetch();// On recupere la ligne du pseudo

        //compare le mdp
        if ($password == $donnees['password']) { //Si dans cette ligne il y a le bon ppassword
            $_SESSION['pseudo'] = $_POST['pseudo'];
            header('Location: trello.php');
        } else {
            header('Location: wrong.html');
        }
          $reponse_login->closeCursor(); //fermeture de la requête
      }
  }

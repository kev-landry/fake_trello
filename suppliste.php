<?php


    try {    //Connexion  BDD via PDO
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root'); //le array sert à montrer les erreurs
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    if (isset($_POST['suppliste'])) {
      if (empty($_POST['suppliste'])) {
        return false;
      }else{
        $req = $bdd->prepare('DELETE FROM `liste` WHERE `id` = ?');
        $req->execute(array($_POST['suppliste']));
      }
    }

    header('Location:trello.php');
?>

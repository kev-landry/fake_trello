<?php
try {    //Connexion  BDD via PDO
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


    if (isset($_POST['liste'])) {
        $liste= $_POST['liste'];
      //Méthode prepare + execute plus safe
        $req = $bdd->prepare('INSERT INTO liste(titre) VALUES(:liste)');
        $req->execute(array('liste' => $liste));

        $req->closeCursor();
    }
    header('Location:trello.php');

?>

<?php
try {    //Connexion  BDD via PDO
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=trello;charset=utf8', 'root', 'root'); //le array sert à montrer les erreurs
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


    $reponse = $bdd->query('SELECT titre FROM liste');
    while ($donnees = $reponse->fetch()) {
        ?>
      <div class="col-lg-3">
        <p>Liste : <?php echo $donnees['titre']; ?></p>
      </div>
      <?php
    }
        $reponse->closeCursor();

    if (isset($_POST['liste'])) {
        $liste= $_POST['liste'];
      //Méthode prepare + execute plus safe
        $req = $bdd->prepare('INSERT INTO liste(titre) VALUES(:liste)');
        $req->execute(array('liste' => $liste));

        $req->closeCursor();
    }
    header('Location:trello.php');
?>

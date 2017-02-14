<div class="row">
  <div class="col-lg-12 tableau">
    <h2> Board</h2>
    <form method="post" action="trello.php">
      <button class="btn btn-primary" type="submit" name="liste">Créer liste</button>
      <input name="liste" required/>
      <form>
  </div>
</div>
<?php

    if (isset($_POST['liste'])){
      $liste= $_POST['liste'];
      //Méthode prepare + execute plus safe
      $req = $bdd->prepare('INSERT INTO liste(titre) VALUES(:liste)');
      $req->execute(array('liste' => $liste));

      echo $liste;
    }
    // Quand on clique sur créer liste query to bdd avec INSERT
    //begin session
    /*
session start()

$_SESSION pseudo


session_destroy*/
    ?>

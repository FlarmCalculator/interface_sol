<?php
//PROJET : FLARM
//BTS SNIR - LP2I
//URBAIN AXEL
//JANVIER-MAI 2019

require('function/function.php');
require_once ('function/db-config.php');

$result = Traitement_Connexion($bdd);
?>

<!doctype html>
<html lang="fr">
  <?php include('include/membre/header.php'); ?>
  <body>

    <?php include('include/navbar.php'); ?>

    <div class="row form-space">
      <div class="col-lg-4 col-md-4"></div>

      <div class="formulaire col-lg-4 col-md-4">
        <h2 class="form-title">Connexion</h2>
        <!-- MESSAGE ERREUR OU DE SUCCES -->
        <div class="form-group">
        <div class="col-sm-12 col-sm-offset-2">
          <center>  <?php echo $result; ?> </center>
        </div>
        </div>

        <form action="connect.php" method="post">
          <div class="form-group">
            <label for="user" class="label-title">Utilisateur</label>
            <input class="form-control" type="text" name="login" placeholder="Nom.Prénom" required>
          </div>
          <div class="form-group">
            <label for="password" class="label-title">Mot de Passe</label>
            <input class="form-control" type="password" name="password" required>
          </div>
          <button type="submit" class="btn btnConnect" name="button">CONNEXION</button>
        </form>
      </div>

      <div class="col-lg-4 col-md-4"></div>
    </div>

    <?php include('include/footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

<div id="menu">
  <nav class="navbar navbar-expand-lg">
    <a class="color-menu" href="../index.php">Suivi de vol - <?php echo $_SESSION['login']; ?> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars fa-2x"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="item-menu" href="add_adm_fly.php">Ajouter vol</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="#">Historique</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="#">Matériels</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="#">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="item-menu" href="../function/script_disconnect.php">Deconnexion</a>
        </li>
      </ul>
    </div>
  </nav>

</div>

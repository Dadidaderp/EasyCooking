<header>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Easy Cooking</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Comment ca marche ?</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rechercher <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Par liste</a></li>
            <li><a href="#">Par ingredient</a></li>
          </ul>
        </li>
        <li><a href="#">Proposer une recette</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if (isset($_SESSION['utilisateur'])) {
      $user = unserialize($_SESSION['utilisateur']);
      echo "<li><a>Bonjour ".$user->getPrenom()." </a></li>";
      echo '<li><a href="?p=deconnexion"><span class="glyphicon glyphicon-user"></span> Deconnexion</a></li>';
    } else {
    echo '<li><a href="?p=inscription"><span class="glyphicon glyphicon-user"></span> S\'incrire</a></li>';
    echo '<li><a href="?p=connexion"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>';
} ?>
</ul>
    </div>
  </div>
</nav>
</header>

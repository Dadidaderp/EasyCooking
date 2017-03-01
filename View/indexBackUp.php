<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="View/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <title>Easy Cooking</title>
    </head>
    <body>
        <div class="container">
                <div class="navbar navbar-default" role="navigation">
          <!-- Partie de la barre toujours affichée -->
          <div class="navbar-header">
            <!-- Bouton d'accès affiché à droite si la zone d'affichage est trop petite -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                <span class="sr-only">Activer la navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Easy Cooking</a>
          </div>
          <!-- Partie de la barre masquée si la surface d'affichage est insuffisante -->
          <div class="collapse navbar-collapse" id="navbar-collapse-target">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Recettes</a></li>
                <li><a href="#">Recherche par ingredient</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Mon compte</a></li>
            </ul>
          </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

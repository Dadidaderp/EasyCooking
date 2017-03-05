<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo Configuration::$APPLICATION_TITLE; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="View/css/style.css">
</head>

<body>
  <?php include('View/menu.php'); ?>
  <div class="container">
    <form class="form">
      <input type="hidden" name="p" value="recherche-liste" />
      <div class="row">
        <div class="rechercheBox col-md-6 col-md-offset-3">
          <h1>Recherche par nom</h1>
          <input type="text"  class="form-control" name='recherche' value="<?php echo $q; ?>" />
          <button type="submit" class="btn btn-warning">Recherche</button>
        </div>
      </div>
    </form>
    <ul>
      <?php
          foreach($listeRecette as $recette){
            echo '<li><h2> '.$recette->getNom().' </h2>';
            echo '<div>  '.$recette->getDesc().' <a href="?p=fiche-recette&id='.$recette->getId().'">savoir plus</a></div></li>';
          }
      ?>
    </ul>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

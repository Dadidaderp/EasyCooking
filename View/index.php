<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo Configuration::$APPLICATION_TITLE; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include('View/menu.php'); ?>
  <div class="container">
  <?php if (isset($deco_msg)) {
  echo $deco_msg;
} ?>
    <h3>Bienvenue sur Easy Cooking</h3>
    <p>Rechercher de recette de cuisine par la sélection d'ingrédient.
    <p>Rapide et simple d'utilisation</p>
    <?php foreach($liste as $recette){
    echo '<h2> '.$recette->getNom().' </h2>';
    echo '<div>  '.$recette->getDesc().' <a href="?p=fiche-recette&id='.$recette->getId().'">savoir plus</a></div>';
} ?>
  </div>
</body>
</html>

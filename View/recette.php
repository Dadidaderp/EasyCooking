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

<h2> Types Recette: </h2>
<ul><?php foreach ($recette->getLstType() as $type) {
    echo "<li> ".$type->getNom()." </li>";
} ?></ul>
  <h2> Ingredient: </h2>
  <ul><?php foreach ($recette->getLstIngredient() as $ingredient) {
    echo "<li> ".$ingredient->getQuantite().$ingredient->getUnite()." ".$ingredient->getIngredient()->getNom()." </li>";
} ?></ul>
    <h2> Commentaire: </h2>
    <ul><?php foreach ($recette->getLstCommentaire() as $commentaire) {
    echo "<li> ".$commentaire->getCommentaire()." </li>";
} ?></ul>
  <?php if (isset($_SESSION['utilisateur'])) {
    echo '<h2> Ajouter un commentaire: </h2>
    <form method="post" action="?p=commentaire"><textarea name="commentaire"></textarea>
    <input type="hidden" name="id" value="'.$recette->getId().'"/>
    <input type="submit" value="Envoyer"/>
    </form>';
} ?>
  </div>

</body>
</html>

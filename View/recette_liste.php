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
    <table class="table">
      <thead>
        <tr>
          <th>#Id</th> 
          <th>Nom</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody> 
        <?php
          foreach($listeRecette as $recette){
            $visible = $recette->getStatus() == 0 ? '<div class="bg-danger">Caché</div>' : '<div class="bg-success">Afficher</div>';
            echo '<tr><td>'.$recette->getId().' </td><td>'.$recette->getNom().' </td><td>'. $visible .'</td><td><a class="btn btn-danger" href="?p=validation-recette&visible=0&id_recette='. $recette->getId().'">Cacher cette recette</a> <a class="btn btn-success" href="?p=validation-recette&visible=1&id_recette='. $recette->getId().'">Afficher cette recette</a></td></tr>';
          }
        ?>
      </tbody>
    </table>
      
    </ul>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

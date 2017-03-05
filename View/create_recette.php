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
    <form action="?p=creation-recette" method="POST" id="formCreation" enctype="multipart/form-data">
        <?php if (isset($err)) {
          echo $err;
        } ?>
       <div class="form-group">
        <label for="exampleInputNom">Nom</label>
        <input type="text" class="form-control" name="nom" id="exampleInputNom" placeholder="Nom">
      </div>
      <div class="form-group">
        <label for="exampleInputDescription">Description</label>
        <textarea class="form-control" id="exampleInputDescription" name="description" placeholder="Description"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputImage">Image</label>
        <input type="file"name="image" id="exampleInputImage">
      </div>
      <div class="form-group">
       <label for="exampleInputNb">Nombre de personne</label>
       <input type="text" class="form-control" name="nb" id="exampleInputNb" placeholder="Nombre de personne">
     </div>
     <div class="form-group">
       <label for="exampleInputNb">Type</label>
       <div class="">
         <select class="form-control" multiple name="type[]" id="type" size="5">
              <?php foreach ($listeType as $type) {
                echo "<option value=". $type->getId()."> ".$type->getNom()." </li>";
              } ?>
          </select>
      </div>
     </div>
     <div class="form-group">
       <label for="exampleInputNb">Ingredient</label>
       <div class="rechercheBox text-left">
         <select class="form-control" name="ingredient" id="ingredient">
              <?php foreach ($listeIngredient as $ingr) {
                echo "<option value=". $ingr->getId()."> ".$ingr->getNom()." </li>";
              } ?>
          </select>
          <button type="button" class="btn btn-default" id="addIngredient">Ajouter ingredient</button>
          <ul class="ingredients row">
          </ul>
      </div>
     </div>
     <button type="submit" class="btn btn-warning">Création</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        /* METHODE POUR AJOUTER UN INGREDIENT DANS LA LISTE*/
        $('#addIngredient').click(function(){
          var id =  $('#ingredient option:selected').val();
          $('.ingredients').append('<li class="col-md-4 marginLeft" data-id="'+ id +'"> \
                                      <span class="close">X</span> \
                                      <div class="form-group"> \
                                        <label>Ingrédient :</label> \
                                        '+ $('#ingredient option:selected').text() +'\
                                      </div> \
                                      <div class="form-group"> \
                                        <label for="exampleInputQuantite'+ id +'">Quantite</label> \
                                        <input type="text" class="form-control" name="recette_quantite_'+ id +'" id="exampleInputQuantite'+ id +'"> \
                                      </div> \
                                      <div class="form-group"> \
                                        <label for="exampleInputUnite'+ id +'">Unite de mesure</label> \
                                        <input type="text" class="form-control" name="recette_unite_'+ id +'" id="exampleInputUnite'+ id +'"> \
                                      </div> \
                                    </li>');
          $('#ingredient option:selected').attr('disabled', 'disabled');
          $('#ingredient option:not([disabled])').first().prop('selected',true); //Selectionne le premier option non disabled                          
        });

         /* METHODE POUR SUPPRIMER UN INGREDIENT DANS LA LISTE */
        $('.ingredients').on('click', '.close' , function(){
          $('#ingredient option[value='+ $(this).parent().attr('data-id') +']').removeAttr('disabled');
          $(this).parent().remove();
          $('#ingredient option:not([disabled])').first().prop('selected',true); //Selectionne le premier option non disabled
        });
     });
   </script>
</body>
</html>

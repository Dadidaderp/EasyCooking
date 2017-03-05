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
      <input type="hidden" name="p" value="recherche-ingredient" />
      <div class="row">
        <div class="rechercheBox col-md-6 col-md-offset-3">
          <h1>Recherche par ingrédient</h1>
          <select class="form-control" name="ingredient" id="ingredient">
              <?php foreach ($listeIngredient as $ingre) {
                echo "<option value=". $ingre->getId()."> ".$ingre->getNom()." </li>";
              } ?>
          </select>
          <button type="button" class="btn btn-default" id="addIngredient">Ajouter ingredient</button>
          <ul class="listeIngredient">
              <?php foreach ($listeIngredientSelected as $ingreSelected) {
                echo "<li data-id=". $ingreSelected->getId()."> ".$ingreSelected->getNom()."<span class='close'>X</span></li>";
              } ?>
          </ul>
          <input type="hidden" name="inputListeIngredient" />
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
  <script type="text/javascript">
    $(document).ready(function(){
        /* METHODE POUR AJOUTER UN INGREDIENT DANS LA LISTE*/
        $('#addIngredient').click(function(){
          $('.listeIngredient').append('<li data-id="'+ $('#ingredient option:selected').val() +'">'+ $('#ingredient option:selected').text() +'<span class="close">X</span></li>');
          $('#ingredient option:selected').attr('disabled', 'disabled');
          initValue();
        });

         /* METHODE POUR SUPPRIMER UN INGREDIENT DANS LA LISTE */
        $('.listeIngredient').on('click', '.close' , function(){
          $('#ingredient option[value='+ $(this).parent().attr('data-id') +']').removeAttr('disabled');
          $(this).parent().remove();
          initValue();
        });

        /**
        * INIt page
        */
        function initPage(){
          $.each($('.listeIngredient li'), function(li){
            $('#ingredient option[value='+ $(this).attr('data-id') +']').attr('disabled', 'disabled');
          });
          initValue();
        }

        /**
        * INIT value
        */
        function initValue(){
          var value = '';
          $.each($('.listeIngredient li'), function(li){
              value += $(this).attr('data-id') + '__';
          });
          $('input[name=inputListeIngredient]').val(value);
          $('#ingredient option:not([disabled])').first().prop('selected',true); //Selectionne le premier option non disabled
        }

        initPage();
    });
  </script>
</body>
</html>

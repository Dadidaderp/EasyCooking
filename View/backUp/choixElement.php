<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Configuration::$APPLICATION_TITLE; ?></title>
        <meta charset="UTF-8">
            
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans|Pacifico" rel="stylesheet" type="text/css" />
        <link href="View/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="View/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" />
    </head>



    <body class="index">

        <div class="container">




                <?php
                if(count($tabElement) <= 1)
                {
                    ?> <div class="row"><div class="col-md-3"><p>il n\'y a aucun element</p></div></div><?php
                }
                else
                {
                   ?><div class="row"><div class="col-md-12 titreComparaison"> <p class="titreCH">S&eacutelectionner 2 astres</p>
        			<button class="btn comparerElement">COMPARER !</button>
        			</div></div><?php


                    //Bboucle sur tous les elements
                    echo '<div class="row">';

                    	foreach ($tabElement as $element)
                    	{
                        echo '<div class="col-md-3 col-xs-3">
                                <div class="boxImage">
                                    <i class="glyphicon glyphicon-info-sign plusInfoElement" data-id="'.$element['id'].'"></i>
                                    <img src="View/image/element/'.$element['image'].'" data-toggle="tooltip" data-placement="bottom" title="'.$element['libelle'].'" />
                                </div>
                             </div>';
                   		}
                    echo '</div>';
                }?>
        </div>



      <img src="View/image/bulle.png" id='aide' class ="nop" data-toggle="tooltip" data-placement="top" title="AIDE" />
      <img src="View/image/helpmaestrocut.png" class ="popguy" data-toggle="tooltip" data-placement="top" title="AIDE" />
      <img src="View/image/maestro2left.png" class ="go"/>
      <img src="View/image/bulleGo.png" class ="nopAlt"/>

      <a href="<?php echo $this->getUrl('?p=index'); ?>" class="buttonAccueil" >Retour &agrave l'accueil</a>
      <a href="<?php ?>" id="deselec" class="buttonVert" >D&eacutes&eacutelectionner</a>






        <div class="modalMaison">
            <div class="corp">
                <i class="glyphicon glyphicon-remove close"></i>
                <div class="contenuTexte"></div>
            </div>
        </div>


        <input type="hidden" value="<?php echo $type; ?>" name="type" />
        <script type="text/javascript" src="View/js/jquery-1.11.3.min.js" ></script>
        <script type="text/javascript"  src="View/js/bootstrap.min.js" ></script>
        <script type="text/javascript"  src="View/js/choixElement.js" ></script>


    </body>
</html>

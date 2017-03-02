<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Configuration::$APPLICATION_TITLE; ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

        <link href="http://fonts.googleapis.com/css?family=Open+Sans|Pacifico" rel="stylesheet" type="text/css" />
        <link href="View/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="View/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    
    
    <body>
    <?php
    
    	if (strstr($element->getUnite(),'AL'))
    	{
    	?><h2><?php echo $element->getLibelle() .', rayon :  '. afficherChiffreEspace(round($element->getValeur(),2)).' '. $element->getUnite() . ' (ann&eacutees lumi&egravere)';
    	}

    	else 
    	{
    	?><h2><?php echo $element->getLibelle() .', rayon :  '. afficherChiffreEspace(round($element->getValeur(),2)).' '. $element->getUnite().' '. $element->getTypeT(); 
    	}
 
    	?></h2>
    
    
    <div class="">
    	<img class="gros" src="View/image/elemdet/<?php echo $element->getImageDet(); ?>" />
    </div>
    
    <div class="texteD">
    	<p class="txtPres"><?php echo $element->getDescriptionHTML(); ?></p>
    </div>

</body>
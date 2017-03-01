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
    
    
    
    <body class="index">
        <div class="container-fuild comparaisonContainer">
            <div class="row">
                <div class="col-xs-6 col-md-3 center">
                    <a href="<?php echo $this->getUrl("?p=choix-element&type=taille"); ?>">
                        <div class="contenu">
                            <p class="titre" >
                           		 <h1>Commencer</h1>
                            </p> 
                        </div>
                    </a>
                </div>
                
                
                <div class="col-xs-6 col-md-6 center">                  
                    <div class="presentation">										
                      <p>
						 <h1> Bienvenue </h1><br>
Astro-compare est un site qui te permettra de mieux comprendre les proportions des plan&egravetes, des &eacutetoiles ou encore de l'univers&nbsp;!
<br>
En ramenant leur dimentions &agrave des &eacutechelles du quotidien.
<br><br>
Quel plan&egravete est la plus grande&nbsp? Venus ou Neptune&nbsp?
<br><br>
Que repr&eacutesente notre Terre par rapport &agrave la Voie Lact&eacutee&nbsp;?
<br><br>
Notre soleil, est il une &eacutetoile majeure du ciel ?
<br><br>
Existe-t-il des astres plus grand que les galaxies ? 
<br><br>
Toute tes questions trouveront des r&eacuteponses&nbsp;!
<br><br>
Bonnes d&eacutecouvertes !
<br><br>

                    </p>
                    
                    
                    
                    </div>
                
                </div>
                
                
                
                <div class="col-xs-6 col-md-3 center">
                    <a href="https://www.google.fr">
                        <div class="contenu">
                            <p class="titre"><h1>Quitter</h1></p>  
                        </div>
                    </a>
                </div>
                
                
               
                
                
            </div>
        </div>
        
        
        <img src="View/image/maestro2.png" class ="popguyCri"  />        
        <img src="View/image/bulleBonjour.png" id='bonjour'class ="nop" />

        <script type="text/javascript" src="View/js/jquery-1.11.3.min.js" ></script>
        <script type="text/javascript"  src="View/js/bootstrap.min.js" ></script>
        <script type="text/javascript"  src="View/js/choixCritere.js" ></script>
    </body>
</html>

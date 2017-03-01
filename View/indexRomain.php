<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Configuration::$APPLICATION_TITLE; ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />

       
        <link href="View/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="View/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    
  
    <body class="indexMain">
    
                <div class = "titreMain">
                </div>
                               
               <div class = "titreContent">
                	<div class = "titreElem">
                		<h4> ASTRO-COMPARE </h4><br><br><br>
                
                   		<a href="<?php echo $this->getUrl('?p=choix-critere'); ?>" class="buttonStart">Entrer</a>
                    
                    </div>
               </div>
        
        
         <a href="http://www.fichier-zip.com/2016/05/02/astrocompare/"><img src="View/image/cclogo.png" id='' class ="logo" title="" /></a> 
        
        
         <div class="modalMaison">  
            <div class="corp">
          
                
                <div class="contenuTexte"></div>
  <form action="#" method="post">
 <p>Votre nom : <input type="text" name="nom" /></p>
 <p>Votre âge : <input type="text" name="age" /></p>
 <p><input type="submit" value="OK" class="ok"></p>
</form>
            </div>
        </div>

        <script type="text/javascript" src="View/js/jquery-1.11.3.min.js" ></script>
        <script type="text/javascript"  src="View/js/bootstrap.min.js" ></script>  
        <script type="text/javascript"  src="View/js/index.js" ></script>
        
    </body>
    
    
    
</html>

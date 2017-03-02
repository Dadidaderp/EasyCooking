<?php


	if (isset($tabElement['error']) && $tabElement['error'] == true) 
	{
    echo '<h2>erreur</h2>';
	} 

	else 
	{
    $element1 = $tabElement['element1'];
    $element2 = $tabElement['element2'];
    ?>
    
    <h2>Comparaison entre : <?php echo $element1->getLibelle(); ?> et <?php echo $element2->getLibelle(); ?></h2>
   
   
   
  	 <table class='tabComparaison'>
        <tr>
            <td><img class="gros" src="View/image/element/<?php echo $element1->getImage(); ?>" /></td>
            <td><img class="gros" src="View/image/arrow.png" /></td>
            <td><img class="gros" src="View/image/element/<?php echo $element2->getImage(); ?>" /></td>
        </tr>
        
        
        <?php

            //S'il n'y a pas de comparaison on affiche la diff
            if($type == 'taille')
            { $mot = 'grand'; }
            if($type == 'poids')
            { $mot = 'lourd'; }
            if($type == 'age')
            { $mot = 'age'; }
            ?>
            
            
         <tr>
                <td colspan="3" class="explicationComparaison">
                    <p> 
                    	<strong><?php echo $element1->getLibelle(); ?></strong>
                        est <strong><?php 
 
                       echo $tabElement['echelle'];
                        ?></strong>  
                        
                        <?php echo trad($tabElement['echelle']); ?>
                        fois plus <?php echo $mot; ?> que  <strong><?php echo $element2->getLibelle(); ?></strong></p></td>
         </tr>
                <?php 
                
                
                foreach ($tabComper AS $tabc)
                {
                	
                	$i = 0;
                	
                	foreach ($tabc as $cel)
                	{
                		if($i%2 == 0)
                		{                		
                		$l1 =  $cel['LibelleDeCompa']; 	
                		$ima1 = $cel['ImageDecompa'];
                			
                			if(isset($cel['tailleMax']))
                			{
                			$t1 = $cel['tailleMax'];
                			}
                			
                		}
 
                		
                	 	if ($i%2 != 0)
                	 	{
                	 		$l2 = $cel['LibelleDeCompa'];
                	 		$ima2 = $cel['ImageDecompa'];
                	 		
                	 		
                	 		if(isset($cel['tailleMin']))
                	 		{
                	 			$t2 = $cel['tailleMin'];
                	 		}
                	    }
                	    
                	    
                	    
                	    if(isset($t1) && isset($t2))
                	    {
						$dif =    ceil ($tabElement['echelle'] / ($t1 / $t2));	
						
						
							if ($dif == 0 || $dif == 1 )
							{
							$dif =    round ($tabElement['echelle'] / ($t1 / $t2) , 4);							
							}
											
                	    }
                	
                
                		$i++;
                		
                		
                		if(isset($l1) && isset($l2))
                		{
   
                			?>
                			<tr>
                				<td colspan="3" class="explicationComparaison">
                			
                					<p> Si <?php echo $element1->getLibelle(); ?> était <?php echo $l1; ?>,
                					Alors <?php echo $element2->getLibelle(); ?> serait 
                					<?php 
                					
                					
                					if(isset($dif) && $dif > 1)
                					{
                					echo ' '.afficherChiffreEspace($dif).' fois plus petit que ';
                					}
                					echo $l2; ?> <br><br>
                			
                			<tr>
								<td><img class="gros" src="View/image/compIma/<?php echo $ima1; ?>" /></td>
								<td><img class="gros" src="View/image/arrow.png" /></td>
								<td><img class="gros" src="View/image/compIma/<?php echo $ima2; ?>" /></td>
						</tr>            	                 	                
                			<?php 
                			unset($l1);
                			unset($l2);
                		}
                	}
                }   
                ?>

          
    </table>



<?php
}
?>


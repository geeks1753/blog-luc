<!DOCTYPE html>
	<html>    
		<head>        
			<meta charset="utf-8" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			<link rel="stylesheet" href="style1.css" />  
			<title>perso</title>    
		</head>
		
		<body>   
               
			           
        <?php
                require_once("fonctions.php");
                $fonction = new site('127.0.0.1','root','','journal');
        ?> 
		<header> 
        <?php
               
                $fonction->menu();  
        ?>                
					                 
		</header> 

    	<div class="titre">Actualités</div>
        <div class="container">
                <div class="row">
                    <div class="col-3">
                        ddd
                    </div>
                    <div class="col-7">
                        dddd
                    </div>
                </div>
            </div>  

        <?php
        $requete="SELECT `Image`,`Texte`,`Titre`,`Date` FROM `articles` ORDER BY `Date` DESC; "; // Creation de la requete
        $resultat=$fonction->effectuerRequete($requete); // appel de fonction qui permet d effectuer la requete
        while($row = $resultat->fetch_assoc()) {
            ?>
                   
		<div class="box">	               
        <div class=image>
            <?php echo"<img src='images/".$row["Image"].".jpg' height='208' width='500'/>" ?>
        </div>
            <div style="display:inline-block;">
               <?php echo"<a href=''> <h1 class=titreArt>".$row['Titre']."</h1></a>" ?>  
                <?php echo" <p class=texte>".$row['Texte']."</p> "?>
            </div><br><br><br>

            <?php
          }
          ?>

        </div>        
		   
		
               
                
             <footer>
                <?php
                // appel de la fonction footer
                    
                        $fonction->footer();  
                ?>                
            </footer>
		</body>
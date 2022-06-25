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
			    <div class="titre">Votre pojet de sites</div>             
		<div class="box">
							
        <p>
            

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vulputate augue ipsum, ut viverra magna tempus ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi ac volutpat enim. Donec ex massa, cursus ut sodales eu, pretium ut justo. Praesent sagittis, ex sed porta auctor, lacus purus dictum dolor, et bibendum quam metus et mauris. Ut non hendrerit orci. Donec tristique tristique nunc, id ornare urna semper porta. Cras imperdiet lacinia ex. Curabitur at iaculis dui. Vestibulum eu libero eget tortor venenatis feugiat. Integer pulvinar lacus non porttitor faucibus. Sed vel ante in velit ornare volutpat ac non augue.

Sed tristique, nibh vel fermentum ultrices, tellus libero suscipit quam, quis cursus ex diam non lorem. Donec sed massa viverra, lacinia nulla et, pretium urna. Vestibulum eget venenatis augue. Quisque fringilla in lorem rhoncus sagittis. Pellentesque eu metus in turpis porttitor varius non et urna. Praesent at tempus diam, vitae semper justo. Donec sed purus libero. Quisque sed massa id mi egestas egestas at id risus. Mauris gravida leo sit amet luctus tincidunt. Maecenas id magna quis diam pretium tempus. Curabitur lobortis mauris mi, quis consectetur massa gravida fermentum. Cras pretium, ligula sodales accumsan accumsan, ligula tellus pulvinar nisi, quis rhoncus felis lacus eget nisl. Ut metus mi, blandit et quam et, semper gravida odio. Quisque pulvinar velit id urna vulputate tristique. Nam sodales egestas porta.

Interdum et malesuada fames ac ante ipsum primis in faucibus. In nisi nibh, ultrices sit amet pulvinar quis, ornare ac lacus. Ut posuere vitae nibh tincidunt pharetra. Quisque efficitur erat sit amet purus pulvinar, vel condimentum justo mattis. Pellentesque at justo at ipsum congue finibus. In hac habitasse platea dictumst. Mauris ullamcorper facilisis nisl, at facilisis tortor dictum eget. Cras eget varius dolor. Phasellus sit amet fringilla ligula. Nunc sollicitudin nisi vel urna tincidunt ornare. Sed iaculis neque nibh, ut viverra felis volutpat id. Sed finibus magna et augue sagittis suscipit non in nisi. Praesent non tortor non erat luctus elementum. Suspendisse mollis tempor arcu vitae sodales. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus at dignissim eros, sit amet vestibulum dolor. 
        </p>
                        
                
             <footer>
                <?php
                // appel de la fonction footer
                    
                        $fonction ->footer();  
                ?>                
            </footer>
		</body>
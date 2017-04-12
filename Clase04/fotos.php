


<html>      
    <body>
       
       <?php
        $arrayDir = scandir("fotos/");      

        foreach($arrayDir as $key)
        {
            echo "<img src=fotos/$key alt="">> </img>"; 
        }
        ?>
        
   
    </body>







</html>


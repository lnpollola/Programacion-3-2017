 <?php
 
 
 $acum = 0;
    $contador = 0;
    $auxAcum=0;

    for($i=0;$acum<1000;$i++)
    {  
            $acum = $acum+$i;
            $contador++;

            if($acum > 1000)
            {
                $auxAcum= $acum-$i;
            }

    }
     
     echo $acum."<br>";
     echo $contador;

?>
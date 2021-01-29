<?php
     $counter = file_get_contents("../counter.dat");  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("../counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp); 
?>

<?php
    function get_db(){
        $fichero = fopen("config.ini", "r");
        $DB_Vars = array();
        while (!feof($fichero)){ 
            $linea = fgets($fichero);
            $linea = explode("=",$linea );
            $DB_Vars[$linea[0]]= $linea[1];
            
        }  
        
        fclose($fichero); 
        return $DB_Vars;
    }
    
    
   
?>      
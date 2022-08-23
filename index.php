<?php

    function get_db(){//rescata las variables de BBDD
        $fichero = fopen("config.ini", "r");
        $DB_Vars = array();
        while (!feof($fichero)){ 
            $linea = trim(fgets($fichero), "\r\n");
            $linea = str_replace(" ", "", $linea);
            $linea = explode("=",$linea);
            $DB_Vars[$linea[0]]=$linea[1];
        }  
        
        fclose($fichero); 
        return $DB_Vars;
    }

    function conectar(){ //crea conexión con la bbdd
        $db = get_db();
        
        //$connect = new mysqli("localhost","demo","1234","sidetours");        
        $connect = new mysqli($db['URL'],$db['USER'],$db['DBPASS'],$db['DATABASE']);            
        if($connect->connect_errno){
        
        exit("Error al conectar con la base de datos");
        }else{
            $connect->set_charset("utf8");
            return $connect;//devolvemos el objeto conexion para poder trabajar posteriormente con el
        }
    }

    function get_entradas_by_date($date){//lanzará una query que obtenga todas las entradas solicitadas por parámetro
        $sql = "SELECT * FROM `reservas` WHERE `fecha_entrada` ='".$date."'";
        $enlace = conectar();
        $result = $enlace->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    function get_estancias_by_interval($date1, $date2){
        $sql = "SELECT * FROM `reservas` WHERE fecha_entrada <'".$date1."' AND fecha_salida > '".$date2."'";
        $enlace = conectar();
        $result = $enlace->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
   
    
   
?>      
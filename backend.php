<?php

    function get_db(){//rescata las variables de BBDD del fichero
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

    function get_entradas_by_date($date){//lanzará una query que obtenga todas las entradas solicitadas por parámetro de determinada fecha
        $sql = "SELECT * FROM `reservas` WHERE `fecha_entrada` ='".$date."'";
        $enlace = conectar();
        $result = $enlace->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    function get_estancias_by_interval($date1, $date2){//devolverá las estancias entre dos fechas
        //date1 = la fecha mas lejana
        //date2 = la fecha mas temprana
        $sql = "SELECT * FROM `reservas` WHERE fecha_entrada <'".$date1."' AND fecha_salida > '".$date2."'";
        $enlace = conectar();
        $result = $enlace->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
   
    function get_persons_reserved($month='m'){//devolverá la suma de personas que han entrado cada mes agrupadas por mes
        $date = date("Y-".$month."-01");  
        $sql = "SELECT SUM(personas) as 'Total Personas', MONTH(fecha_entrada) as 'Mes Entrada' FROM reservas WHERE fecha_entrada > '".$date."' GROUP BY MONTH(fecha_entrada)";
        $enlace = conectar();
        $result = $enlace->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }

    function get_reservas_by_filters($params){
        $sqlWhere = "Where ";        
        if(isset($params['id_hotel'])){
            $sqlWhere.= "id_hotel = ".$params['id_hotel'];
        }
        if(isset($params['fe_ini'])){
            if($sqlWhere != substr($sqlWhere,-6)){
                $sqlWhere.= " AND ";
            }
            $sqlWhere.= 'fecha_entrada BETWEEN "'.$params['fe_ini'].'" AND "'. $params['fe_fin'].'"';
        }
        if(isset($params['fc_ini'])){
            if($sqlWhere != substr($sqlWhere,-6)){
                $sqlWhere.= " AND ";
            }
            $sqlWhere.= 'fecha_creacion BETWEEN "'.$params['fc_ini'].'" AND "'. $params['fc_fin'].'"';
        }        
        $sql = "SELECT * FROM reservas ". $sqlWhere;        
        $enlace = conectar();
        $result = $enlace->query($sql);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
?>      
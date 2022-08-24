<?php
include_once "backend.php";
if(isset($_POST['test'])){
    switch ($_POST['num']) {
        case '1':
            e1();
            break;
        case '2':
            e2();
            break;
        case '3':
            e3();
            break;
                    
        default:
            exit("error");
            break;
    }
}else{

    $json =  get_reservas_by_filters($_POST);
    echo json_encode($json);
}


function e1(){
    $result = get_entradas_by_date("2022/09/01");
    $result = json_encode($result);
    echo $result;
}

function e2(){
    $result = get_estancias_by_interval("2022/09/15","2022/09/10"); 
    $result = json_encode($result);
    echo $result;
}

function e3(){
    $result = get_persons_reserved(); 
    $result = json_encode($result);
    echo $result;
}

?>
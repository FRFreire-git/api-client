<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: POST");
    header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $nome = $data["nome"];
    $dt_nasc = $data["dt_nasc"];
    $cpf = $data["cpf"];
    $rg = $data["rg"];

    // print_r($data);
    // die();

    require_once "dbconfig.php";

    $query = "INSERT INTO tbl_clientes(nome, dt_nasc, cpf, rg) 
                VALUES ('".$nome."', '".$dt_nasc."', '".$cpf."', '".$rg."')";

    if(mysqli_query($conn, $query) or die ("Cliente não pode ser inserido")){
        echo json_encode(array(
            "message" => "Cliente adicionado com sucesso",
            "status" => true,
            "cliente:" => $data,
            "status:" => "status:" => http_response_code(200, 201)
        ));
    }
    else {
        echo json_encode(array(
            "message" => "Falha ao adicionar cliente",
            "status" => false,
            "status:" => http_response_code(401)
        ));
    }
?>
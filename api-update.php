<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: PUT");
    header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $nome = $data["nome"];
    $dt_nasc = $data["dt_nasc"];
    $cpf = $data["cpf"];
    $rg = $data["rg"];

    require_once "dbconfig.php";
    
    $query = "UPDATE `tbl_clientes` SET `nome`= '".$nome."',`dt_nasc`='".$dt_nasc."',`rg`='".$rg."' 
                WHERE cpf = '".$cpf."'";

    if(mysqli_query($conn, $query) or die ("Falha na tentativa de alterar o cliente.")){
        echo json_encode(array(
            "message" => "Cliente atualizado com sucesso.",
            "status" => true,
            "cliente" => $data,
            "status:" => "status:" => http_response_code(200, 201)
        ));
    }
    else{
        echo json_encode(array(
            "message" => "Não foi possível atualizar o cliente.",
            "status" => false,
            "status:" => http_response_code(401)
        ));
    }
?>
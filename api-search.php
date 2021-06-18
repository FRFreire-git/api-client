<?php 
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: POST");
    header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $nome = $data["nome"];
    $cpf = $data["cpf"];

    require_once "dbconfig.php";

    $query = "SELECT nome, dt_nasc, cpf, rg FROM tbl_clientes
                WHERE nome = '".$nome."' OR cpf = '".$cpf."'";

    if(mysqli_query($conn, $query) or die ("Cliente não pode ser encontrado")){
        echo json_encode(array(
                                "sucesso" => true,
                                "mensagem" => "Cliente encontrado com sucesso", 
                                "dados:" => $data,
                                "status:" => http_response_code(200)
                            ));
    }
    else {
        echo json_encode(array(
            "message" => "Falha ao encontrar cliente",
            "status" => false,
            "status:" => http_response_code(401)
        ));
    }
?>
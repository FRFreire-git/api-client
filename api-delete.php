<?php 
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: POST");
    header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type, Acess-Control-Allow-Methods, Authorization");

    $data = json_decode(file_get_contents("php://input"), true);

    $cpf = $data["cpf"];

    require_once "dbconfig.php";

    $query = "DELETE FROM tbl_clientes
                WHERE cpf = '".$cpf."'";

    if(mysqli_query($conn, $query) or die ("Cliente não pode ser deletado")){
        echo json_encode(array(
            "message" => "Cliente deletado com sucesso",
            "status" => true,
            "cliente:" => $data,
            "status:" => "status:" => http_response_code(200)
        ));
    }
    else {
        echo json_encode(array(
            "message" => "Falha ao deletar cliente",
            "status" => false,
            "status:" => http_response_code(401)
        ));
    }
?>
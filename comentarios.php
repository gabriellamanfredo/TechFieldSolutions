<?php
// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"]) && isset($_POST["message"])) {
    // Carrega os comentários existentes
    $comentarios = json_decode(file_get_contents("comentarios.json"), true);
    
    // Adiciona o novo comentário
    $novoComentario = [
        "name" => $_POST["name"],
        "message" => $_POST["message"]
    ];
    $comentarios[] = $novoComentario;
    
    // Salva os comentários atualizados no arquivo JSON
    file_put_contents("comentarios.json", json_encode($comentarios));
}

// Retorna os comentários como JSON
header("Content-type: application/json");
echo file_get_contents("comentarios.json");
?>

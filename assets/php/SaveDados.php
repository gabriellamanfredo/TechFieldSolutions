<?php

  if(! isset($_SESSION)) {
    session_start();
    ob_start();
  }

  if ($_GET) {

    $email = $_GET['email'];
    $comentario = $_GET['comentario'];
       
    $Opened = "../json/TextInput.json";
    $arquivo = fopen($Opened, 'r');
    $InputText = fgets($arquivo, 8192);

    fclose($arquivo);

    echo $InputText;
        
    $data = json_decode($InputText);

    $datas = array(
      'email' => $email,
      'comentario' => $comentario
    );
    
    $json = $datas.$data;
    $FileWrite = "../json/TextInput.json";

    $jsons = json_encode($json);
    $InputText = fopen($FileWrite, 'w');
    fwrite($InputText, $jsons);
    fclose($InputText);

  }
?>
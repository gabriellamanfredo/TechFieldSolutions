<?php

  if(! isset($_SESSION)) {
    session_start();
    ob_start();
  }

  if ($_GET) {

    $elemento = $_GET['nome'];
    $email = $_GET['email'];
    $comentario = $_GET['comentario'];
       
    $Opened = "../json/TextInput.json";
    $arquivo = fopen($Opened, 'r');
    $InputText = fgets($arquivo, 8192);
    fclose($arquivo);

    echo $InputText;
        
    $data = json_decode($InputText);

    $data = array(
      'email' => $email,
      'comentario' => $comentario
    );

    if(!is_dir("../json/")) {
      mkdir('../json/TextInput.json', 0777, true);
    }
        
    if(!is_dir("../json/TextInput.json" . $elemento)) {
      mkdir('../json/TextInput.json' . $elemento, 0777, true);
    }
    
    $FileWrite = "../json/" . $elemento . '/TextInput.json';

    $json = json_encode($data);
    $InputText = fopen($FileWrite, 'w');
    fwrite($InputText, $json);
    fclose($InputText);

  }
?>
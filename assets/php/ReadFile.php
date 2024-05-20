<?php

if (!isset($_SESSION)) {
  session_start();
  ob_start();
}

if ($_GET) {
  $fileget = $_GET['arquivo'];
  $tipo = $_GET['tipo'];
  $elemento = $_GET['elemento']; // Adicionando a recuperação do elemento

  if ($tipo === "Input Text") {
    $tipo = "InputText";
  }

  $FileGet = "../json/" . $tipo . "/" . $elemento . "/" . $fileget;

  if (!file_exists($FileGet)) {
    $FileGet = "../json/" . $tipo . "/Default/" . $fileget;
  }

  $arquivo = fopen($FileGet, 'r');
  $Inputs = fgets($arquivo, 8192);
  fclose($arquivo);

  echo $Inputs;

  $data = json_decode($Inputs);

  // Iterando sobre os dados decodificados
  foreach ($data as $proper) {
    // Armazenando na sessão PHP apenas se a propriedade for 'email' ou 'comentario'
    if ($proper->property === 'email' || $proper->property === 'comentario') {
      $_SESSION[$proper->property] = $proper->value;
    }
  }
}

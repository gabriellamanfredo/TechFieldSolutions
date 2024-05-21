<?php

  if (!isset($_SESSION)) {
    session_start();
    ob_start();
  }

  $FileGet = "../json/TextInput.json";

  $arquivo = fopen($FileGet, 'r');
  $Inputs = fgets($arquivo, 8192);
  fclose($arquivo);

  echo $Inputs;

  $data = json_decode($Inputs);

?>
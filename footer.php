<?php

$year = date('Y');

//validamos en que directorio debemos buscar los asset, para la validacion revisamos si existe el parametro page en el query string de la url
$directory = (isset($_GET['page'])) ? "../" : "";

$footer = <<<EOF
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#"><i class="fa fa-arrow-up"></i> volver arriba</a>
    </p>
    <p>Heroes © {$year}
  </div>
</footer>

<script type="text/javascript" src="{$directory}js\plugin\jquery\jquery.js"></script>
<script type="text/javascript" src="{$directory}js\bootstrap.bundle.js"></script>
<script type="text/javascript" src="{$directory}js\bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="{$directory}css\bootstrap-grid.css">
<link rel="stylesheet" type="text/css" href="{$directory}css\bootstrap-reboot.css">
<link rel="stylesheet" type="text/css" href="{$directory}css\bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
EOF;

function printFooter(){
    echo $GLOBALS['footer'];// debemos usar globals para acceder a las variables declarada fuera de la funcion
}
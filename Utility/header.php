<?php

$header = <<<cabeza
<header>

<div class="jumbotron">
<h1 class="display-4">Registro de Estudiantes ITLA</h1>
<p class="lead"> Registra tus datos para empezar a cursar tus materias</p>
</div>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/bootstrap-grid.css">
</header>
cabeza;

function printHeader(){
    echo $GLOBALS['header'];
}


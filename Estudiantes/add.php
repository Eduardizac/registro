<?php 

include '../Utility/header.php';
include '../Utility/libreria.php';
include '../footer.php';


session_start();

//Validamos si existen valores en la variable de $_POST 
if(isset($_POST['name']) && isset($_POST['carreraId'])){
    
   //Obtenemos el listado actual de heroes almacenado en la session
    $listadoestudiante = $_SESSION['estudiante'];

    $estudianteId = 1;//El Id del estudiante que vamos a crear

    if(!empty($listadoestudiante)){//validamos si ya hay un estudiante creado
        $lastElement = getLastElement($estudiante); //Obtenemos el ultimo elemento del listado de estudiante 
        $estudianteId =  $lastElement["id"] + 1;//como ya existen heroes el id del nuevo heroe debe ser el id el ultimo + 1
    }


    array_push($estudiante, ["id" => $estudianteId,"name" =>$_POST['name'],"carreraId" => $_POST['carreraId'] ]);//Agregamos el heroe al listado de heroes

    $_SESSION['estudiante'] = $estudiante; //guardamos en session el nuevo listado de heroes

    header("Location: ../index.php");//enviamos a la pagina principal del website
    exit();//esto detiene la ejecucion del php para que se realice el redireccionamiento
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <title>Añadir Estudiantes</title>
</head>
<body>

<?php printHeader(); ?>


    
<main role="main">

        <div class="card">
            <div class="card-header">
               <a href="../index.php" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Atras </a> Volver al Registro de Estudiantes
            </div>
            <div class="card-body">

                <form method="POST" action="add.php">

                    <div class="col-md-4">
                        <div class="form-group">

                            <label for="InputName">Nombre</label>
                            <input type="text" name="name" class="form-control" id="InputName" placeholder="Introduzca el nombre ">

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="carrera"> CARRERA </label>
                            <select name="carreraId" class="form-control" id="carrera">
                                <option value="1">SOFTWARE</option>
                                <option value="2">REDES</option>
                                <option value="3">MULTIMEDIA</option>
                                <option value="4">MECATRONICA</option>
                                <option value="5">HACK ETICO</option>
                                <option value="6">INTELIGENCIA ARTIFICIAL</option>
                                
                            </select>

                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> GUARDAR </button>
                        </div>
                    </div>



</main>

                    <?php printFooter(); ?>

</body>
</html>
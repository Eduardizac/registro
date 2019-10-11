
<?php 

include 'Utility\header.php';
include 'Utility/libreria.php';
include 'footer.php';




session_start();

$_SESSION['estudiante'] = isset($_SESSION['estudiante']) ? $_SESSION['estudiante']: array();

$listadoestudiante = $_SESSION['estudiante'];

if(!empty($listadoestudiante)) {

  if (isset($_GET['carreraId'])){

    $listadoestudiante = searchProperty($listadoestudiante, 'carreraId', $_GET['carreraId']);
  }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de estudiantes ITLA</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">

</head>
<body>



  

    <?php printHeader(); ?>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                
                <p class="lead text-muted">LISTA DE ESTUDIANTES REGISTRADOS</p>
                <p>
                    <a href="Estudiantes/add.php?page=true" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> REGISTRAR </a>
                </p>
            </div>
        </section>


<div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-9"></div>


                    <div class="col-md-3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="index.php?carreraId=1" class="btn btn-secondary">SOFTWARE</a>
                            <a href="index.php?carreraId=2" class="btn btn-secondary">MULTIMEDIA</a>
                            <a href="index.php?carreraId=3" class="btn btn-secondary">REDES</a>
                            <a href="index.php?carreraId=4" class="btn btn-secondary">MECATRONICA</a>
                            <a href="index.php" class="btn btn-secondary">TODOS</a>
                       
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php if (empty($listadoestudiante)) : ?>
                        <h2>No hay estudiantes registrados <a href="Estudiantes/add.php?page=true" class="btn btn-primary my-2"><i class="fa fa-plus-square"></i> REGISTRAR </a> </h2>

                    <?php else : ?>

                        <?php foreach ($listadoestudiante as $estudio) : ?>

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                    </svg>
                                    <div class="card-body">
                                        <p class="card-text"><strong> <?php echo $estudio['name']; ?> </strong></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="Estudiantes/editar.php?page=true&id=<?php echo $estudio['id'] ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
    </main>







<?php 
printFooter();
?>

<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>

</body>
</html>
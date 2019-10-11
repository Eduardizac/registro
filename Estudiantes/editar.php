
<?php 

include 'Utility\header.php';
include 'Utility/libreria.php';
include 'footer.php';
//include 'helpers\utilities.php';




session_start();

$estudiante = $_SESSION['estudiante'];

$containId = isset($_GET['id']);

$element = [];

if ($containId){

    $element = searchProperty($estudiante, 'id', $_GET['id'])[0];
    $elementIndex = getIndexElement($estudiante, 'id', $_GET['id']);

    $selectedSoftware = ($element['carreraId'] == 1) ? "selected" : "";
    $selectedMultimedia = ($element['carreraId'] == 2) ? "selected" : "";
    $selectedRedes = ($element['carreraId'] == 3) ? "selected" : "";
    $selectedMecatronica = ($element['carreraId'] == 4) ? "selected" : "";
    $selectedTodos = ($element['carreraId'] == 5) ? "selected" : "";
  }

  if (isset($_POST['name']) && isset($_POST['carreraId'])){

    $actualizaestudiante = ['id' => $_GET['id'], 'name' => $_POST['name'], 'carreraId' => $_POST['carreraId']]; //El heroe con los datos actualizados

    $estudiante[$elementIndex] =  $actualizaestudiante; //Actualizamos los datos del heroe en el listado de heroes utilizando el index obtenido del elemento

    $_SESSION['estudiante'] = $estudio; // Actualizamos la informacion en la session

    header("Location: ../index.php"); //enviamos a la pagina principal del website
    exit(); //esto detiene la ejecucion del php para que se realice el redireccionamiento
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

<?php if ($containId && !empty($element)) : ?>

    <div class="card">
        <div class="card-header">
            <a href="../index.php" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Volver atras </a> Editando  al estudiante <?php echo $element['name'] ?>
        </div>
        <div class="card-body">

            <form method="POST" action="edit.php?id=<?php echo $element["id"] ?>">

                <div class="col-md-4">
                    <div class="form-group">

                        <label for="InputName">Nombre</label>
                        <input type="text" value="<?php echo $element['name'] ?>" name="name" class="form-control" id="InputName" placeholder="Introduzca el nombre ">

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="company"> CARRERA </label>
                        <select name="companyId" class="form-control" id="company">
                            <option <?php echo $selectedSoftware; ?> value="1">SOFTWARE</option>
                            <option <?php echo $selectedMultimedia; ?> value="2">MULTIMEDIA</option>
                            <option <?php echo $selectedRedes; ?> value="3">MULTIMEDIA</option>
                            <option <?php echo $selectedMecatronica; ?> value="4">MULTIMEDIA</option>
                          

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
            </form>

        </div>
    </div>

<?php else : ?>

    <h2>No existe</h2>

<?php endif; ?>

</main>

<?php printFooter(); ?>

</body>

</html>
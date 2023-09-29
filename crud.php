<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/bootstrap-5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/styles/crud.css">
    <title>Sistema Asistencias</title>
</head>
<body>

<header class="container-fluid">
    <h1>Crud pelado</h1>

    <div class="container">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#insertar">insertar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#modificar">modificar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#eliminar">eliminar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#buscar">buscar</a>
            </li>

          </ul>
    </div>
</header>

<main class="container-fluid">
<section class="container" id="insertar">
    <form action="./insert.php" method="POST">
      <fieldset>
        <legend>Ingresar los datos del alumno: </legend>
        <label for="nombre">Nombre: </label>
          <input type="text" name="nombre">
        <label for="apellido">Apellido: </label>
          <input type="text" name="apellido">
        <label for="fecha_nacimiento">Fecha de nacimiento: </label>
          <input type="date" name="fecha_nacimiento">
        <label for="dni">DNI: </label>
          <input type="number" name="dni">
        <br>
        <br>
        <button class="btn btn-outline-primary" onclick="">Enviar</button>
      </fieldset>
    </form>
</section>


<section class="container" id="modificar">
  <form action="" method="">
    <fieldset>
      <legend>Ingrese el dni del alumno que desea modificar: </legend>
      <label for="dni">DNI: </label>
        <input type="number">
      <br>
      <br>
      <button class="btn btn-outline-primary" onclick="">Buscar Alumno</button>
    </fieldset>
  </form>
  

</section>


<section class="container" id="eliminar">
  <form action="./resources/php/delete.php" method="POST">
    <fieldset>
      <legend>Ingrese el dni del alumno a eliminar: </legend>
      <label for="dni">DNI: </label>
        <input type="number" name="dni">
      <br>
      <br>
      <br>
      <button class="btn btn-outline-primary" onclick="">Eliminar</button>
    </fieldset>
  </form>
</section>


<section class="container" id="buscar">
  <form action="">
    <fieldset>
      <legend>Buscar alumno (nombre y apellido): </legend>
      <label for="nombre">Nombre: </label>
        <input type="text">
      <label for="apellido">Apellido: </label>
        <input type="text">
      <br>
      <br>
      <button class="btn btn-outline-primary" onclick="">Buscar</button>
    </fieldset>
  </form>
</section>
</main>



</body>
</html>

<script src="./resources/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="./resources/Js/funciones.js"></script>
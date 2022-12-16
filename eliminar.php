<?php
try {
    $dbname = "productos";
    $user = "root";
    $password = "";
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } catch (PDOException $e){
    echo $e->getMessage;
    }

    // Prepare
    $query = $dbh->prepare("SELECT * FROM productos");
    // Bind
   
    // Excecute
    $query->execute();
    $productos = $query->fetchAll();

   // echo "<pre>";
   // print_r($productos);
   // echo "</pre>";
    
    $dbh = null;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de bases</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<header>
    <H1>Crud de productos</H1>
</header>
<body>
    <button type="button" class="btn btn-success btn-lg" >Crear Producto</button> 
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Foto</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
           
            <?php foreach($productos as $i => $producto){ ?>
            <tr>
                <th scope="row"> <?= $i+1 ?> </th>
                <td> <?= $producto['nombre'] ?> </td>
                <td> <?= $producto['descripcion'] ?> </td>
                <td> <?= $producto['imagen'] ?> </td>
                <td> <?= $producto['precio'] ?> </td>
                <td> <?= $producto['fecha_creacion'] ?> </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm">Editar</button>
                    <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                </td> 
            </tr>
            <?php } ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

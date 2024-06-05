
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de pagos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>Ingresar Pagos</h1>
  <form action="index.php" method="post">

            <div >
                <label for="deudor" class="form-label">Deudor</label>
                <input type="text" name="deudor" id="deudor" class="form-control">
            </div>
            <div>
                <label for="cuota" class="form-label">Número de Cuota</label>
                <input type="number" name="cuota" id="cuota" class="form-control">
            </div>
            <div>
                <label for="cuota_capital" class="form-label">Cuota Capital</label>
                <input type="number" name="cuota_capital" id="cuota_capital" class="form-control">
            </div>

            <div>
                <label for="fecha_pago" class="form-label">Fecha de Pago</label>
                <input type="date" name="fecha_pago" id="fecha_pago" class="form-select" multiple aria-label="Multiple select example">
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
        </form>

 <?php
 
    require_once 'db.php';
    
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $deudor = $_POST['deudor'];
        $cuota = $_POST['cuota'];
        $cuota_capital= $_POST['cuota_capital'];
        $fecha_pago= $_POST['fecha_pago'];

        agregarPago( $deudor, $cuota, $cuota_capital, $fecha_pago);
        $pagos = getInfo();
        header('Location: index.php');
    }
    if (isset($_GET['delete'])) {
        deletePago($_GET['delete']);
        header('Location: index.php');
    }
   
   ?>
     <table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Deudor</th>
            <th scope="col">Cuota</th>
            <th scope="col">Cuota Capital</th>
            <th scope="col">Fecha Pago </th>
            <th scope="col"></th>
            
        </tr>

    </thead>
    <tbody>
    <?php $pagos = getInfo(); ?>   
    <?php foreach ($pagos as $pago) { ?> 
            
        <tr>
            <th><?php echo $pago->id ?></th>
            <th><?php echo $pago->deudor ?></th>
            <th><?php echo $pago->cuota ?></th>
            <th><?php echo $pago->cuota_capital ?></th>
            <th><?php echo $pago->fecha_pago ?></th>
            <th><a href="index.php?delete=<?= $pago->id ?>">Eliminar</a></th>
        </tr>
        <?php } ?>
        
    </tbody>

    </table>

    

</div>
</body>
</html>
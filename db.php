<?php
function getDB(){
    $db = new PDO('mysql:host=localhost;dbname=db_labuno;charset=utf8', 'root', '');
    return $db;
}
function getInfo(){
    $db = getDB();
    $sentencia = $db->prepare("SELECT * FROM pagos");
    $sentencia->execute();
    $pagos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $pagos;
}

function agregarPago($deudor, $cuota, $cuota_capital, $fecha_pago){
    $db = getDB();
    $sentencia =  $db->prepare("INSERT INTO pagos(deudor, cuota, cuota_capital, fecha_pago) values(?, ?, ?,?)");
    $sentencia->execute([$deudor, $cuota, $cuota_capital,$fecha_pago]);
    return $db->lastInsertId();
}
function deletePago($id){
    $db = getDB();

    $sentencia = $db->prepare("DELETE FROM  pagos where id = ?");
    $sentencia->execute([$id]);
}

?>
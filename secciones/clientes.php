<?php

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

$id=isset($_POST['id'])?$_POST['id']:'';
$nombre_cliente=isset($_POST['nombre_cliente'])?$_POST['nombre_cliente']:'';
$ap_paterno=isset($_POST['ap_paterno'])?$_POST['ap_paterno']:'';
$ap_materno=isset($_POST['ap_materno'])?$_POST['ap_materno']:'';
$RFC=isset($_POST['RFC'])?$_POST['RFC']:'';
$Regimen_fiscal=isset($_POST['Regimen_fiscal'])?$_POST['Regimen_fiscal']:'';
$domicilio=isset($_POST['domicilio'])?$_POST['domicilio']:'';
$accion=isset($_POST['accion'])?$_POST['accion']:'';

if($accion!=''){
    switch($accion){
        case 'agregar':
            $sql="INSERT INTO clientes (id, nombre_cliente, ap_paterno, ap_materno, RFC, Regimen_fiscal, domicilio) VALUES (NULL, :nombre_cliente, :ap_paterno, :ap_materno, :RFC, :Regimen_fiscal, :domicilio)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_cliente',$nombre_cliente);
            $consulta->bindParam(':ap_paterno',$ap_paterno);
            $consulta->bindParam(':ap_materno',$ap_materno);
            $consulta->bindParam(':RFC',$RFC);
            $consulta->bindParam(':Regimen_fiscal',$Regimen_fiscal);
            $consulta->bindParam(':domicilio',$domicilio);
            $consulta->execute();
        
        break;

        case 'editar':
            $sql="UPDATE clientes SET nombre_cliente=:nombre_cliente, ap_paterno=:ap_paterno, ap_materno=:ap_materno, RFC=:RFC, Regimen_fiscal=:Regimen_fiscal, domicilio=:domicilio WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->bindParam(':nombre_cliente',$nombre_cliente);
            $consulta->bindParam(':ap_paterno',$ap_paterno);
            $consulta->bindParam(':ap_materno',$ap_materno);
            $consulta->bindParam(':RFC',$RFC);
            $consulta->bindParam(':Regimen_fiscal',$Regimen_fiscal);
            $consulta->bindParam(':domicilio',$domicilio);
            $consulta->execute();
        break;
        
        case 'borrar':
            $sql="DELETE FROM clientes WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            
        break;

        case 'Seleccionar':
            $sql="SELECT * FROM clientes WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            $cliente=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_cliente=$cliente['nombre_cliente'];
            $ap_paterno=$cliente['ap_paterno'];
            $ap_materno=$cliente['ap_materno'];
            $RFC=$cliente['RFC'];
            $Regimen_fiscal=$cliente['Regimen_fiscal'];
            $domicilio=$cliente['domicilio'];

        break;

    }
}




$sql="SELECT * FROM clientes";
$listaClientes=$conexionBD->query($sql);
$clientes=$listaClientes->fetchAll();



?>
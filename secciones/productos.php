<?php
//INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio`) VALUES (NULL, 'PARACETAMOL 500 MG', 'ORAL 20 TABLETAS', '31');
include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
//instancia para recepcionar 
$id=isset($_POST['id'])?$_POST['id']:'';
$nombre_producto=isset($_POST['nombre_producto'])?$_POST['nombre_producto']:'';
$descripcion=isset($_POST['descripcion'])?$_POST['descripcion']:'';
$precio=isset($_POST['precio'])?$_POST['precio']:'';
$accion=isset($_POST['accion'])?$_POST['accion']:'';



if($accion!=''){
    switch($accion){
        case 'agregar':
            $sql="INSERT INTO productos (id,nombre_producto, descripcion, precio) VALUES (NULL, :nombre_producto, :descripcion, :precio )";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_producto',$nombre_producto);
            $consulta->bindParam(':descripcion',$descripcion);
            $consulta->bindParam(':precio',$precio);
            $consulta->execute();
        break;
        
        case 'editar':
            $sql="UPDATE productos SET nombre_producto=:nombre_producto, descripcion=:descripcion, precio=:precio WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->bindParam(':nombre_producto',$nombre_producto);
            $consulta->bindParam(':descripcion',$descripcion);
            $consulta->bindParam(':precio',$precio);
            $consulta->execute();
        break;
        
        case 'borrar':
            $sql="DELETE FROM productos WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            
        break;

        case 'Seleccionar':
            $sql="SELECT * FROM productos WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id',$id);
            $consulta->execute();
            $producto=$consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_producto=$producto['nombre_producto'];
            $descripcion=$producto['descripcion'];
            $precio=$producto['precio'];
            
        break;

    }

}

//metodos para insertar datos 
$consulta=$conexionBD->prepare("SELECT * FROM productos");
$consulta->execute();
$listaProductos=$consulta->fetchAll();


?>


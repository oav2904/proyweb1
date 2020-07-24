<?php
require_once '../shared/guard.php';

if (isset($_POST['btnCarrito'])) {

    switch ($_POST['btnCarrito']) {

        case 'Agregar':
            if (is_numeric($_POST['id'])) {
                $id = $_POST['id'];
            }
            if (is_string($_POST['nombre'])) {
                $nombre = $_POST['nombre'];
            }
            if (is_numeric($_POST['precio'])) {
                $precio = $_POST['precio'];
            }
            if (is_numeric($_POST['cantidad'])) {
                $cantidad = $_POST['cantidad'];
            }


            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad
                );
                $_SESSION['CARRITO'][0] = $producto;
            } else {
                $numProductos = count($_SESSION['CARRITO']);
                $idProductos = array_column($_SESSION['CARRITO'], 'id');
                if(in_array($id,$idProductos)){
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['id']== $id){
                            $_SESSION['CARRITO'][$indice]['cantidad']+=1;
                        }
                    }
                

                } else{
                $producto = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad
                );
                $_SESSION['CARRITO'][$numProductos] = $producto;
            }
        }
            break;

        case "Eliminar":

            if (is_numeric($_POST['id'])) {
                $id = $_POST['id'];
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['id']== $id){
                        unset($_SESSION['CARRITO'][$indice]);
                    }
                }
            
            
            }
            break;

        case 'Restar':
            $id = $_POST['id'];
            $idProductos = array_column($_SESSION['CARRITO'], 'id');
                if(in_array($id,$idProductos)){
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['id']== $id){
                            if( $_SESSION['CARRITO'][$indice]['cantidad'] >1){
                            $_SESSION['CARRITO'][$indice]['cantidad']-=1;
                        }
                    }
                }
            }
        break;

        case 'Sumar':
            $id = $_POST['id'];
            $idProductos = array_column($_SESSION['CARRITO'], 'id');
                if(in_array($id,$idProductos)){
                    foreach($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['id']== $id){
                            $_SESSION['CARRITO'][$indice]['cantidad']+=1;


                        }
                    }
                }

        break;
    }
}

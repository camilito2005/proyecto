<?php

// require_once "../modelo/ModelValidacion.php";

class Carrito
{
    public function aggCarrito($id, $nombre, $foto, $descripcion, $precio, $stock)
    {
        if (!isset($_SESSION['correo'])) {
            $_SESSION['correo'] = array();
        }
        if (array_key_exists($id, $_SESSION['correo'])) {
            $_SESSION['correo'][$id]['stock'] += $stock;
            $_SESSION['correo'][$id]['precio'] += $precio;
        } else {
            $_SESSION['correo'][$id] = array(
                'nombre' => $nombre,
                'foto' => $foto,
                'descripcion' => $descripcion,  
                'precio' => $precio,
                'stock' => $stock,
                // 'cantidad' => $cantidad,
            );
        }
    }
    public function eliminarCarrito($id)
    {
        if (isset($_SESSION['correo'][$id])) {
            unset($_SESSION['correo'][$id]);
        }
    }
    public function eliminarTodo()
    {
        unset($_SESSION['correoo']);
    }
    public function ver(){
        if (empty($_SESSION['correo'])) {
            // echo 'no hay nada en el carrito';
            header('Location: ../catalogo/carrito.php');
        } else {
            return  $_SESSION['correo'];
        }
    }
    
}

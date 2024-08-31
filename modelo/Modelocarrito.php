<?php


class Carrito
{
    public function aggCarrito($id, $nombre, $foto, $descripcion, $precio, $stock)
    {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }
        if (array_key_exists($id, $_SESSION['carrito'])) {
            $_SESSION['carrito'][$id]['stock'] += $stock;
            $_SESSION['carrito'][$id]['precio'] += $precio;
        } else {
            $_SESSION['carrito'][$id] = array(
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
        if (isset($_SESSION['carrito'][$id])) {
            unset($_SESSION['carrito'][$id]);
        }
    }
    public function eliminarTodo()
    {
        unset($_SESSION['carrito']);
    }
    public function ver(){
        if (empty($_SESSION['carrito'])) {
            // echo 'no hay nada en el carrito';
            header('Location: ../catalogo/carrito.php');
        } else {
            return  $_SESSION['carrito'];
        }
    }
}

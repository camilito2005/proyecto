<?php
require_once("pChart2.1.4/class/pData.class.php");
require_once("pChart2.1.4/class/pDraw.class.php");
require_once("pChart2.1.4/class/pImage.class.php");

// Datos estáticos
function Graficas(){
    $categories = ["January", "February", "March", "April", "May"];
    $values = [10, 20, 30, 40, 50];

    // Crear un objeto de datos para pChart
    $data = new pData();
    $data->addPoints($values, "Values");
    $data->addPoints($categories, "Categories");
    $data->setSerieDescription("Categories", "Categories");
    $data->setAbscissa("Categories");

    // Crear el gráfico
    $image = new pImage(700, 230, $data);
    $image->setFontProperties(["FontName" => "pChart2.1.4/fonts/Forgotte.ttf", "FontSize" => 10]);
    $image->setGraphArea(60, 40, 650, 190);
    $image->drawScale(["CycleBackground" => TRUE]);
    $image->drawBarChart();

    // Enviar la imagen al navegador
    header("Content-Type: image/png");
    $image->render();
}

?>

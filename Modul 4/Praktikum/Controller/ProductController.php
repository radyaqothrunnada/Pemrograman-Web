<?php

namespace Controller;

include "Traits/ResponseFormatter.php";
include "Controller/Controller.php";

use Traits\ResponseFormatter;

// Disimulasikan ini adalah class controller product
class ProductController extends Controller {
    // Gunakan trait yang sudah dibuat
    use ResponseFormatter;

    // Magic Method, method ini akan diakses pada saat pembuatan object
    public function __construct() {
        // SET atribut controllerName pada parent class controller
        $this->controllerName = "Gett All Product";
        // SET atribut controllerMethod pada parent class controller
        $this->controllerMethod = "GET";
    }

    // Disimulasikan ini method untuk get data product
    public function getAllProduct() {
        // Array dummy data
        $dummyData = [
            "Air Mineral",
            "Kebab",
            "Spaghetti",
            "Jus Jambu"
        ];

        $response = [
            "controller_attribute" => $this->getControllerAttribute(), // Ambil method getControllerAtribute dari parent class
            "product" => $dummyData
        ];

        // Gunakan method dari trait yang sudah dibuat
        return $this->responseFormatter(200, "Success", $response);
    }
}
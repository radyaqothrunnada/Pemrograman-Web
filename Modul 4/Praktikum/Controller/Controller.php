<?php 

namespace Controller;

class Controller {
    // Variable Atribut
    var $controllerName;
    var $controllerMethod;

    // Method untuk mengambil semua Atribut
    public function getControllerAttribute() {
        return [
            "ControllerName" => $this->controllerName,
            "Method" => $this->controllerMethod
        ];
    }
}
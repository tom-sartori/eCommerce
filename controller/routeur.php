<?php
require_once File::build_path(array("controller","ControllerUtilisateur.php"));
require_once File::build_path(array("controller","ControllerFournisseur.php"));
require_once File::build_path(array("controller","ControllerBouleDeNoel.php"));
if (isset($_GET['controller'])) {
    $controller = ucfirst($_GET['controller']);
    $controllerClass = "Controller" . $controller;
    if (class_exists($controllerClass)) {
        if (isset($_GET['action'])) {
            if (in_array($_GET['action'], get_class_methods($controllerClass))) {
                $action = $_GET['action'];
                $controllerClass::$action();
            } else {
                $controllerClass::error();
            }
        }
    }
}else
    ControllerBouleDeNoel::readAll();
?>
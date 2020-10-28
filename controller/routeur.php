<?php
require_once File::build_path(array("controller","ControllerUtilisateur.php"));
require_once File::build_path(array("controller","ControllerFournisseur.php"));
require_once File::build_path(array("controller","ControllerBouleDeNoel.php"));
if (isset($_GET['controller'])) {
    $controller = ucfirst($_GET['controller']);
    $controller_Class = "Controller" . $controller;
    if (class_exists($controller_Class)) {
        if (isset($_GET['action'])) {
            if (in_array($_GET['action'], get_class_methods($controller_Class))) {
                $action = $_GET['action'];
                $controller_Class::$action();
            } else {
                $controller_Class::error();
            }
        } else
            ControllerBouleDeNoel::readAll();
    }
} else
    ControllerBouleDeNoel::errorController();
?>
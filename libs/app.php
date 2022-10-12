<?php

require_once 'controllers/Errores_Controller.php';

class App {
    public function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            $archivoController = 'controllers/Home_Controller.php';
            require_once $archivoController;
            $controller = new Home_Controller();
            $controller->loadModel('index');
            $controller->render();
            return false;
        } elseif (strtoupper($url[0]) == "API") {
            $nparam         = sizeof($url);
            if ($nparam > 1) {
                $archivoController = 'api/' . ucfirst($url[1]) . '_API_Controller.php';
                if (file_exists($archivoController)) {
                    require_once $archivoController;
                    $controllerName = ucfirst($url[1]) . '_API_Controller';
                    
                    if ($nparam > 2) {
                        $métodos_controler = get_class_methods($controllerName);
                        //if not existis url[1] in methods of controller
                        if (!in_array($url[2], $métodos_controler)) {
                            //if not existis url[1] in methods of controller execute error controller
                            $controller = new Errores_Controller();
                            $controller->E404();
                        } else {
                            $controller = new $controllerName();
                            $controller->loadModel($url[1]);
                            if ($nparam > 3) {
                                $param = [];
                                for ($i = 3; $i < $nparam; $i++) {
                                    array_push($param, $url[$i]);
                                }
                                $controller->{$url[2]}($param);
                            } else {
                                $controller->{$url[2]}();
                            }
                        }
                    }
                } else {
                    $controller = new Errores_Controller();
                    $controller -> APINotControler();
                }

            } else {
                $controller = new Errores_Controller();
                $controller->APIPage();
            }

        } else {
            $archivoController = 'controllers/' . ucfirst($url[0]) . '_Controller.php';

            if (file_exists($archivoController)) {
                require_once $archivoController;
                $controllerName = ucfirst($url[0]) . '_Controller';
                $nparam         = sizeof($url);
                if ($nparam > 1) {
                    $métodos_controler = get_class_methods($controllerName);
                    //if not existis url[1] in methods of controller
                    if (!in_array($url[1], $métodos_controler)) {
                        //if not existis url[1] in methods of controller execute error controller
                        $controller = new Errores_Controller();
                        $controller->E404();
                    } else {
                        $controller = new $controllerName();
                        $controller->loadModel($url[0]);
                        if ($nparam > 2) {
                            $param = [];
                            for ($i = 2; $i < $nparam; $i++) {
                                array_push($param, $url[$i]);
                            }
                            $controller->{$url[1]}($param);
                        } else {
                            $controller->{$url[1]}();
                        }
                    }
                } else {
                    $controller = new $controllerName();
                    $controller->loadModel($url[0]);
                    $controller->render();
                }

            } else {
                $controller = new Errores_Controller();
                $controller->E404();
            }

        }

        // if (file_exists($archivoController)) {
        //     require $archivoController;
        //     $controllerName = ucfirst($url[0]) . '_Controller';
        //     $nparam         = sizeof($url);
        //     if ($nparam > 1) {
        //         $métodos_controler = get_class_methods($controllerName);
        //         //if not existis url[1] in methods of controller
        //         if (!in_array($url[1], $métodos_controler)) {
        //             //if not existis url[1] in methods of controller execute error controller
        //             $controller = new Errores_Controller();
        //         } else {
        //             $controller = new $controllerName();
        //             $controller->loadModel($url[0]);
        //             if ($nparam > 2) {
        //                 $param = [];
        //                 for ($i = 2; $i < $nparam; $i++) {
        //                     array_push($param, $url[$i]);
        //                 }
        //                 $controller->{$url[1]}($param);
        //             } else {
        //                 $controller->{$url[1]}();
        //             }
        //         }
        //     } else {
        //         $controller = new $controllerName();
        //         $controller->loadModel($url[0]);
        //         $controller->render();
        //     }

        // } else {
        //     $controller = new Errores_Controller();
        // }
    }
}
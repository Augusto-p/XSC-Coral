<?php
require_once 'models/Usuario_Model.php';
require_once 'utilidades/Imagenes.php';

class Home_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function mod(){
        //del Compra
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador") {
            $date    = date("Y-m-d-H-i-s"); // se optiene la fecha actual
            $oldData = json_decode(file_get_contents('public/Recursos/Jsons/Home.json'), true);
            $BannerP = null;
            $BannerP1 = null;
            $BannerP2 = null;
            foreach ($data->Home->Banners as $key => $lista) {
                switch ($lista[0]) {
                    case "Banner_Principal":
                        $BannerP = $lista[1];
                        break;
                    case "Banner_Uno":
                        $BannerP1 = $lista[1];
                        break;
                    case "Banner_Dos":
                        $BannerP2 = $lista[1];
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }
            if ($BannerP) {
                $ImagenBanner = new Imagenes("public/imgs/Baners/Baner-Principal-" . $date);
                $PathBanner = $ImagenBanner->Upload64($BannerP);
            }
            if ($BannerP1) {
                $ImagenBanner = new Imagenes("public/imgs/Baners/Baner-Publisiatrio-1-" . $date);
                $PathBanner1 = $ImagenBanner->Upload64($BannerP1);
            }
            if ($BannerP2) {
                $ImagenBanner = new Imagenes("public/imgs/Baners/Baner-Publisiatrio-2-" . $date);
                $PathBanner2  = $ImagenBanner->Upload64($BannerP2);
            }

            $oldData["Pagina Principal"]["Baner Principal"]["img"] = $PathBanner ?? $oldData["Pagina Principal"]["Baner Principal"]["img"];
            $oldData["Pagina Principal"]["Baner Publisitario Uno"]["img"] = $PathBanner1 ?? $oldData["Pagina Principal"]["Baner Publisitario Uno"]["img"];
            $oldData["Pagina Principal"]["Baner Publisitario Dos"]["img"] = $PathBanner2 ?? $oldData["Pagina Principal"]["Baner Publisitario Dos"]["img"];
            $oldData["Pagina Principal"]["Slider Uno"] = $data->Home->Slider1;
            $oldData["Pagina Principal"]["Slider Dos"]=$data->Home->Slider2;
            file_put_contents('public/Recursos/Jsons/Home.json', json_encode($oldData, JSON_PRETTY_PRINT));
            $res = ["mensaje" => "Pagina Pricipal Actualizada con Exito", "code" => 200];
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Home/mod");

    }

}
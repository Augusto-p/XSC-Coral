<?php

require_once 'utilidades\Imagenes.php';

class Settings_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('home/index');
    }

    public function homemod(){
        $data = json_decode(file_get_contents('public\Recursos\Jsons\Home.json'), true);
        $UrlBanerP = constant('URL') . $data["Pagina Principal"]["Baner Principal"]["img"];
        $UrlBanerP1 = constant('URL') . $data["Pagina Principal"]["Baner Publisitario Uno"]["img"];
        $UrlBanerP2 = constant('URL') . $data["Pagina Principal"]["Baner Publisitario Dos"]["img"];
        $isbnsSlider1 = [];
        $isbnsSlider2 = [];
        foreach ($data["Pagina Principal"]["Slider Uno"] as $key => $value) {
            array_push($isbnsSlider1, $value['ISBN']);
        }
        foreach ($data["Pagina Principal"]["Slider Dos"] as $key => $value) {
            array_push($isbnsSlider2, $value['ISBN']);
        }
        $this->view->UrlBanerP = $UrlBanerP;
        $this->view->UrlBanerP1 = $UrlBanerP1;
        $this->view->UrlBanerP2 = $UrlBanerP2;
        $this->view->Slider1Isbns = $isbnsSlider1;
        $this->view->Slider2Isbns = $isbnsSlider2;
        $this->view->render('PanelAdmin/Home/mod');
    }

    public function savehomeMod(){
        $BanerP = $_FILES["PBaner"];
        $BanerP1 = $_FILES["PP1Baner"];
        $BanerP2 = $_FILES["PP2Baner"];
        $Slider1 = $_POST['Slider1'];
        $Slider2 = $_POST['Slider2'];
        $date = date("Y-m-d-H-i-s"); // se optiene la fecha actual
        if ($BanerP) {
            $BanerPrincipal = new Imagenes($BanerP, "public/imgs/Baners/Baner-Principal-".$date);
            $pathBanerPrincial = $BanerPrincipal->Upload();
        }else{
            $pathBanerPrincial = null;
        }
        
        if ($BanerP1) {
            $BanerPublicitario1 = new Imagenes($BanerP1, "public/imgs/Baners/Baner-Publisiatrio-1-".$date);
            $PathBanerPublisitario1 = $BanerPublicitario1->Upload();
        } else {
            $PathBanerPublisitario1 = null;
        }

        if ($BanerP2) {
            $BanerPublicitario2 = new Imagenes($BanerP2, "public/imgs/Baners/Baner-Publisiatrio-2-".$date);
            $PathBanerPublisitario2 = $BanerPublicitario2->Upload();
        } else {
            $PathBanerPublisitario2 = null;
        }

        $json = json_decode(file_get_contents('public\Recursos\Jsons\Home.json'), true);

        if ($pathBanerPrincial != null) {
            $json["Pagina Principal"]["Baner Principal"]["img"] = $pathBanerPrincial;
        }

        if ($PathBanerPublisitario1 != null) {
            $json["Pagina Principal"]["Baner Publisitario Uno"]["img"] = $PathBanerPublisitario1;
        }
        if ($PathBanerPublisitario2 != null) {
            $json["Pagina Principal"]["Baner Publisitario Dos"]["img"] = $PathBanerPublisitario2;
        }
        foreach ($Slider1 as $key => $value) {
            $json["Pagina Principal"]["Slider Uno"][$key]["ISBN"] = $value;
        }
        foreach ($Slider2 as $key => $value) {
            $json["Pagina Principal"]["Slider Dos"][$key]["ISBN"] = $value;
        }
        

        file_put_contents('public\Recursos\Jsons\Home.json', json_encode($json, JSON_PRETTY_PRINT));
        $this->view->render('PanelAdmin/Home/savemod');

        

        


        
        
    }

   
}

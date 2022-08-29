<?php
require_once 'models\Book_Model.php';
require_once 'DTO\book.php';

class Index_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $data = json_decode(file_get_contents('public\Recursos\Jsons\Home.json'), true);
        $Slider1list = [];
        $Slider2list = [];
        $bookModel = new Book_Model();
        foreach ($data["Pagina Principal"]["Slider Uno"] as $key => $value) {
            $ISBN = $value['ISBN'];
            $Book = $bookModel->get($ISBN);
            array_push($Slider1list, $Book);
        }
        foreach ($data["Pagina Principal"]["Slider Dos"] as $key => $value) {
            $ISBN = $value['ISBN'];
            $Book = $bookModel->get($ISBN);
            array_push($Slider2list, $Book);
        }


        $this->view->UrlBanerP1 = constant('URL') . $data["Pagina Principal"]["Baner Publisitario Uno"]["img"];
        $this->view->UrlBanerP2 = constant('URL') . $data["Pagina Principal"]["Baner Publisitario Dos"]["img"];
        $this->view->UrlBanerP = constant('URL') . $data["Pagina Principal"]["Baner Principal"]["img"];
        $this->view->Slider1 = $Slider1list;
        $this->view->Slider2 = $Slider2list;
        $this->view->render('home/index');
    }

    public function mod(){
        $this->view->render('PanelAdmin/Home/mod');
        
    }
   
}

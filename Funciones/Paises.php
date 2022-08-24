<?php 
class Pais{
    private $nombre;
    private $iso;
    private $PhoneCode;
    private $flag;

    public function getNombre(){
        return $this->nombre;
    }

    public function getIso(){
        return $this->iso;
    }

    public function getPhoneCode(){
        return $this->PhoneCode;
    }
    public function getFlag(){
        return $this->flag;
    }
    
    public function setPhoneCode($PhoneCode){
        $this->PhoneCode = $PhoneCode;
    }

    public function setIso($iso){
        $this->iso = $iso;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setFlag($flag){
        $this->flag = $flag;
    }

    public function uploadInfoByName(){
        $jsons = file_get_contents("public\Recursos\Jsons\Paises.json");
        $json = json_encode($jsons);

        foreach ($json->data as $i => $item) {
            echo $item;
            if (strtolower($item->nombre) == strtolower($this->nombre)) {
                $this->iso = $item->iso2;
                $this->PhoneCode = $item->phone_code;
                $this->flag = 'public/Recursos/icons/flags/'.strtolower($item->iso2).'.svg';
            }
        }

    }

}







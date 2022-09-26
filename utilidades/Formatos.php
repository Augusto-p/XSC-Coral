<?php 
class Formatos{
    public function __construct(){}


    public static function DateFacturaFormat($dateTime){
        $date = explode(" ",$dateTime)[0];
        $date = explode("-",$date);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
        $date = $day . "/" . $month . "/" . $year;
        return $date;
        
    }

    public static function moneyFormat($base){
        return number_format($base, 2, ',', '.');;


        
    }

}
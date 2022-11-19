<?php 

class Errors {

    public static function NewError($Type, $File, $Line, $Error){
        $file = json_decode(file_get_contents('Errors/History.json'), true);
        $Errors = $file["Errors"];
        $block = [
            "Type"=> $Type,
            "Date" => date("Y-m-d H:i:s"),
            "File" => $File,
            "Line" => $Line,
            "Error" => $Error
        ];
        
        $Errors[] = $block;
        $file["Errors"] = $Errors;
        file_put_contents('Errors/History.json', json_encode($file, JSON_PRETTY_PRINT));
    }
}
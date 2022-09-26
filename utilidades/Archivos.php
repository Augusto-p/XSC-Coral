<?php 

class Archivo {
    private $path;
    private $content;

    public function getPath(){
        return $this->path;
    }

    public function getContent(){
        return $this->content;
    }

    public function setPath($path){
        $this->path = $path;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function save(){
        $file =  fopen($this->path, "w");
        fwrite($file, $this->content);
        fclose($file);        
    }
    public function read(){
        $file = fopen($this->path,"r");
        $this->content = fread($file, filesize($this->path));
        fclose($file);     
    }

    public static function RmDir($path) {
        if (is_dir($path)){
            $dir = opendir($path);
        }else{
            return false;
        }
	    
        while($file = readdir($dir)) {
	       if ($file != "." && $file != "..") {
	            if (!is_dir($path."/".$file)){
                    unlink($path."/".$file);
                }else{
                     RmDir($path.'/'.$file);
                }
	                
	       }
        }
         closedir($dir);
	
	    rmdir($path);
	    return true;
    }
}
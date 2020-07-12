<?php 

class Twig_Extension_WriteFile extends Twig_Extension {
    public function getFunctions(){
        return array(
            new Twig_SimpleFunction('write_file', 'writeJSONFile'),
        );
    }

    public function getName(){
        return 'write_file';
    }
}
function writeJSONFile($data,$jsonName){
    $handle = @fopen($jsonName,'r+'); //read the file if present
    if ($handle === NULL){
        $handle = fopen($jsonName,'w+');
    }
    if ($handle){
        fseek($handle,0,SEEK_END); //bring cursor to end of file
        if (ftell($handle) > 0){ //see if we're at the end of the file
            fseek($handle,-1,SEEK_END); //move cursor back by 1
            fwrite($handle,',',1); //add the comma to separate json objects
            fwrite($handle,$data);
        }
        else {
            fwrite($handle,$data); //write what would be the first one
        }
        fclose($handle);
    }    
}

?>
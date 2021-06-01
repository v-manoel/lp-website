<?php


class BreadCrumb{
 

    #Cria os breadcrumbs do site
    public function addBreadCrumb(){
        $array_count = count($this->parseURL());
        
        $array_link[0] = '';
        
        echo "<a href=".DIRPAGE.">home</a> > ";

        for($index=0; $index < $array_count; $index++){
            $array_link[0].=$this->parseURL()[$index].'/';
            echo "<a href=".DIRPAGE.$array_link[0].">".$this->parseURL()[$index]."</a>";
            echo $index < $array_count -1 ? ">" : "";

        }
    }
}
?>
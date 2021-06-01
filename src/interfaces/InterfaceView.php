<?php
interface InterfaceView{
    public function setDir($dir);
    public function setTitle($title);
    public function setDesc($desc);
    public function setKeywords($keywords);
    public function renderLayout();
} 

?>
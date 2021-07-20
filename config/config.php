<?php
#Arquivos diretórios raizes
$root_dir = "lapechincha/";
#caminho absoluto da paginas - DIRPAGE
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$root_dir}");

#caminho absoluto do - Server
if(substr($_SERVER['DOCUMENT_ROOT'],-1) == '/'){
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$root_dir}");
}else{
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/{$root_dir}");
}

#Caminho para diretórios específicos
define('DIRIMG',DIRPAGE."public/img/");
define('DIRCSS',DIRPAGE."public/css/");
define('DIRJS',DIRPAGE."public/js/");
define('DIRFONTS',DIRPAGE."public/fonts/");
define('DIRAUDIO',DIRPAGE."public/audio/");
define('DIRDESIGN',DIRPAGE."public/design/");
define('DIRVIDEO',DIRPAGE."public/video/");
define('DIRADMIN',DIRPAGE."public/admin/");

?>
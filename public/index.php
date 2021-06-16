<?php

session_start();

header("Content-type: text/html; cahrset=utf-8");
require_once("../config/config.php");

include '../app/Dispatch.php';
include '../src/classes/Render.php';

#teste tratamento de url  com dispatch
$dispatch = new Dispatch();

?>
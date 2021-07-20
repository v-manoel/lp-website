<?php

session_start();

header("Content-type: text/html; cahrset=utf-8");
require_once("../config/config.php");
require_once("../config/db.php");

include '../app/Dispatch.php';
include '../src/classes/Render.php';

$dispatch = new Dispatch();

?>
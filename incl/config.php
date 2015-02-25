<?php
//Turning all error reporting on
error_reporting(-1);

//start a named session
session_name(preg_replace('/[:\.\/-_]/', '', __FILE__));
session_start();

//include some functions that are availbile "globally"
include_once(dirname(__FILE__) . "/../src/common.php");

//Time page generation, display in footer. Comment out to disable timing
$pageTimeGeneration = microtime(true);

//include functions for login & logout
include_once(dirname(__FILE__) . "/../src/login.php");

//account and password that can login
$userAccount ="doe";
$userPassword = userPassword("doe");
<?php
//Inicia sesión
if(!session_id()){
    session_start();
}



error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "classDB.php";
$dbh = "";

function obtenerGet($nombre, $tipo){
    //Verificamos que exista la variable
    if(!isset($_GET["$nombre"]) || $_GET["$nombre"] == ""){
        return "";
    }
    $variable = $_GET["$nombre"];
    switch($tipo){
        //El tipo de dato es entero
        case 1:
            if(!is_numeric($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 2:
            if(!is_string($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 3:
            if(!is_object($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 4:
            if (filter_var($variable, FILTER_VALIDATE_EMAIL)) {
                return $variable;
            }
            else{
                return false;
            }
            break;
        default:
            return $variable;
            break;
    }
}

function obtenerPost($nombre, $tipo){
    //Verificamos que exista la variable
    if(!isset($_POST["$nombre"]) || $_POST["$nombre"] == ""){
        return "";
    }
    $variable = $_POST["$nombre"];
    switch($tipo){
        //El tipo de dato es entero
        case 1:
            if(!is_numeric($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 2:
            if(!is_string($variable)){
                return false;
            }
            else{
                return utf8_decode($variable);
            }
            break;
        case 3:
            if(!is_object($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 4:
            if (filter_var($variable, FILTER_VALIDATE_EMAIL)) {
                return $variable;
            }
            else{
                return false;
            }
            break;
        default:
            return $variable;
            break;
    }
}

function encriptar($texto){
    $salt = '$2a$07$AxicomMrSiliconeBand01$';
    return crypt($texto, $salt);
}

function guardarSesion($clave, $valor){
    //Inicia sesión
    if(!session_id()){
        session_start();
    }
    $_SESSION["$clave"] = $valor;
}

function obtenerSesion($nombre, $tipo){
    //Verificamos que exista la variable
    if(!isset($_SESSION["$nombre"]) || $_SESSION["$nombre"] == ""){
        return "";
    }
    $variable = $_SESSION["$nombre"];
    switch($tipo){
        //El tipo de dato es entero
        case 1:
            if(!is_numeric($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 2:
            if(!is_string($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 3:
            if(!is_object($variable)){
                return false;
            }
            else{
                return $variable;
            }
            break;
        case 4:
            if (filter_var($variable, FILTER_VALIDATE_EMAIL)) {
                return $variable;
            }
            else{
                return false;
            }
            break;
        default:
            return $variable;
            break;
    }
}


?>
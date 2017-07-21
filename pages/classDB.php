<?php
//If no session, starts a new one
if(!session_id()){
    session_start();
}

$dbh = "";

//Class to control all database functions
class database{
    //Connects to database
    function connect2(){
        
        // para trabajar local reyes
        // $hostname = "localhost";
        // $username = "root";
        // $password = "";
        // $database = "holkam_bd";

        // para trabajar local juankmilo
        $hostname = "localhost";
        $username = "root";
        $password = "root";
        $database = "holkam_bd";

        // Para trabajar en el servidor
        // $hostname = "fdb3.biz.nf";
        // $username = "2171105_carrito";
        // $password = "holkam1234";
        // $database = "2171105_carrito";
        $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbh;
    }
}

function prepararQuery($sql){
    try {
        $connection = new database();
        $dbh = $connection->connect2();
        return $dbh->prepare("$sql");
    } catch (Exception $e) {
        $mensaje = "Excepcion capturada:<br/>".$e->getMessage()."<br/><br/>Query =<br/>$sql";
        var_dump($mensaje);exit;
        header("Location: ../index.html?err=0");exit;
        return false;
    }
}

function ejecutarQuery($query){
    try{
        $result = $query->execute();
    }
    catch (Exception $e){
        $mensaje = "Excepcion capturada: <br/>".$e->getMessage()."<br/><br/>Query = $sql";
        header("Location: ../index.html?err=991");exit;
        return false;
    }
    return $result;
}


function unirParametro($query, $campo, $valor, $tipo, $longitud){
    switch($tipo){
        case 2:
            try{
                $query->bindParam(":$campo", $valor, PDO::PARAM_STR, $longitud);
                return true;
            } catch (Exception $ex) {
                
                header("Location: ../index.html?err=992");exit;
                return false;
            }
            break;
        default:
            try{
                $query->bindParam(":$campo", $valor, PDO::PARAM_STR, $longitud);
                return true;
            } catch (Exception $ex) {
                
                header("Location: ../index.html?err=993");exit;
                return false;
            }
            break;
    }
}

function crearAhora(){
    $ahora = date("Y-m-d H:i:s", time() - 3600*5);
    return $ahora;
}

function crearHora(){
    $ahora = date("H:i:s", time() - 3600*5);
    return $ahora;
}

function cleanQuery($string){
    $badWords = array("/select/i", "/delete/i", "/update/i","/union/i","/insert/i","/drop/i","/http/i","/--/i");
    $string = preg_replace($badWords, "", $string);
    return $string;
}


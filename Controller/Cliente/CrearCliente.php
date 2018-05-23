<?php
if($_POST){
    require '../../CLASS/VO/ClienteVO.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    
    /**
     * Primero cambio de POST a Json
     * json_encode($_POST) = Se crea un  notación en formato JSON de tipo texto
     * Luego con json_decode se codifica ese texto en json y se pasa objecto de JSON
     */    
    $json = json_decode(json_encode($_POST));
    /**
     *Se realiza la instancia de la clase DAO 
     */
    $ClienteDAO = new ClienteDAO(); 
    /**
     * Se invoca al respectivo metodo para ser ejecutado
     */
    $ClienteDAO->agregar($json); 
}else{
    header("location:../.././");
}
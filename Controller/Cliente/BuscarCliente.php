<?php
if($_POST){
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/VO/ClienteVO.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    
    $ClienteDAO = new ClienteDAO();
    
    $data = json_encode($_POST);
    $json = json_decode($data);
    
    $ClienteDAO->listaXCC($json);
    
}else{
    
}
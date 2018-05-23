<?php
if($_POST){
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    require '../../CLASS/VO/ClienteVO.php';
    
    $ClienteDAO = new ClienteDAO();
    $data = json_encode($_POST);
    $json = json_decode($data);
    $ClienteDAO->eliminar($json);
}else{
    header("location:../../");
}
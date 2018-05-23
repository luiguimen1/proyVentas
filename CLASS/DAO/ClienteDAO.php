<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteDAO
 *
 * @author TECH INSTITUTE PC8
 */
class ClienteDAO {

    //put your code here
    // crud

    public function agregar($json) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setCc($json->CC);
        $ClienteVO->setNombre($json->nombre);
        $ClienteVO->setCorreo($json->correo);
        $ClienteVO->setDire($json->dir);
        $ClienteVO->setTel($json->tel);
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $sql = "insert into cliente values (null,?,?,?,?,?);";
        /**
         * s -> Cadenas de Texto
         * i -> Enteros
         * d -> Double
         * b -> Boolean  
         */
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("sssss", $ClienteVO->getCc(), $ClienteVO->getNombre(), $ClienteVO->getDire(), $ClienteVO->getTel(), $ClienteVO->getCorreo());
        $res = array();
        if ($stmp->execute()) {
            $res["success"] = "ok";
        } else {
            $res["success"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($res);
    }

    public function listar() {
        $sql = "select * from cliente order by nombre;";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $smtp = $conn->prepare($sql);
        $smtp->execute();
        // id | cc        | nombre       | dire        | tel         | correo
        $smtp->bind_result($id, $cc, $nom, $dire, $tel, $cor);
        $edificio = array();
        while ($smtp->fetch()) {
            $ClienteVO = new ClienteVO();
            $ClienteVO->setId($id);
            $ClienteVO->setCc($cc);
            $ClienteVO->setNombre($nom);
            $ClienteVO->setDire($dire);
            $ClienteVO->setTel($tel);
            $ClienteVO->setCorreo($cor);
            $edificio[] = $ClienteVO;
        };
        $smtp->close();
        $conn->close();

        return $edificio;
    }

    public function listaXCC($json) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setCc($json->cedula);
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $sql = "select * from cliente where cc = ?;";
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("s", $ClienteVO->getCc());
        $stmp->execute();
        $stmp->bind_result($id, $cc, $nom, $dire, $tel, $cor);
        $res = array();
        $res["success"] = "no";
        while ($stmp->fetch()) {
            $res["id"] = $id;
            $res["cc"] = $cc;
            $res["nom"] = $nom;
            $res["dire"] = $dire;
            $res["tel"] = $tel;
            $res["cor"] = $cor;
            $res["success"] = "ok";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($res);
    }

    public function modificar($json) {
        $ClienteVO = new ClienteVO();
        $ClienteVO->setId($json->id);
        $ClienteVO->setCc($json->CC);
        $ClienteVO->setNombre($json->nombre);
        $ClienteVO->setDire($json->dir);
        $ClienteVO->setTel($json->tel);
        $ClienteVO->setCorreo($json->correo);

        $sql = "update cliente set cc = ?, nombre = ?, dire = ?, tel = ?, correo = ? where id = ?;";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $smtp = $conn->prepare($sql);
        $smtp->bind_param("sssssi", $ClienteVO->getCc(), $ClienteVO->getNombre(), $ClienteVO->getDire(), $ClienteVO->getTel(), $ClienteVO->getCorreo(), $ClienteVO->getId());
        $resp = array();
        if ($smtp->execute()) {
            $resp["success"] = "ok";
        } else {
            $resp["success"] = "no";
        }
        $smtp->close();
        $conn->close();
        echo json_encode($resp);
    }

    public function eliminar($json) {
        $sql = "delete from cliente where id = ?;";
        $ClienteVO = new ClienteVO();
        $ClienteVO->setId($json->id);
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $stmp->bind_param("i", $ClienteVO->getId());
        $res = array();
        if ($stmp->execute()) {
            $res["success"] = "ok";
        } else {
            $res["success"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($res);
    }

}

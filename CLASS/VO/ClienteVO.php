<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteVO
 *
 * @author TECH INSTITUTE PC8
 */
class ClienteVO {
    //put your code here
    private $id;
    private $cc;
    private $nombre;
    private $dire;
    private $tel;
    private $correo;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id=$id;
    }
    
    public function getCc() {
        return $this->cc;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDire() {
        return $this->dire;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCc($cc) {
        $this->cc = $cc;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDire($dire) {
        $this->dire = $dire;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }


    
}

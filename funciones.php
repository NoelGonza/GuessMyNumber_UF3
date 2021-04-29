<?php
session_start();

class Num {
    public $num_m;
    public $cont_gen = 0;
    public $acer = false;

    function getNum_m() {
        return $this->num_m;
    }

    function getCont_gen() {
        return $this->cont_gen;
    }

    function getAcer() {
        return $this->acer;
    }

    function setNum_m($num_m) {
        $this->num_m = $num_m;
    }

    function setCont_gen($cont_gen) {
        $this->cont_gen = $cont_gen;
    }

    function setAcer($acer) {
        $this->acer = $acer;
    }
}

class Maq {
    public $cont = 0;
    public $piv_i = 0;
    public $piv_d = 0;
    public $num_maq;
    
    function getCont() {
        return $this->cont;
    }

    function getPiv_i() {
        return $this->piv_i;
    }

    function getPiv_d() {
        return $this->piv_d;
    }

    function getNum_maq() {
        return $this->num_maq;
    }

    function setCont($cont) {
        $this->cont = $cont;
    }

    function setPiv_i($piv_i) {
        $this->piv_i = $piv_i;
    }

    function setPiv_d($piv_d) {
        $this->piv_d = $piv_d;
    }

    function setNum_maq($num_maq) {
        $this->num_maq = $num_maq;
    }
}
?>
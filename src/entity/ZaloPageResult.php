<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common;

class ZaloPageResult {
    
    private $error;
    private $id;

    public function __construct() {
        
    }

    function setError($error) {
        $this->error = $error;
    }
    
    function getError() {
        return $this->error;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

}

?>

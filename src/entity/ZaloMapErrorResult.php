<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common;

class ZaloMapErrorResult {
    
    private $error;
    private $mapError;

    public function __construct() {
        
    }

    function setError($error) {
        $this->error = $error;
    }
    
    function getError() {
        return $this->error;
    }

    function setMapError($mapError) {
        $this->mapError = $mapError;
    }

    function getMapError() {
        return $this->mapError;
    }

}

?>

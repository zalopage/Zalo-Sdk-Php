<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common;

class ZaloMsgSttResult {
    
    private $error;
    private $status;

    public function __construct() {
        
    }

    function setError($error) {
        $this->error = $error;
    }
    
    function getError() {
        return $this->error;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getStatus() {
        return $this->status;
    }

}

?>
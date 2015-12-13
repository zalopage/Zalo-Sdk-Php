<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace entity;

class ZaloProfileResult {
    
    private $err;
    private $profile;
    
    public function __construct() {
        
    }

    function setErr($err) {
        $this->err = $err;
    }
    
    function getErr() {
        return $this->err;
    }
    
    function setProfile($profile) {
        $this->profile = $profile;
    }
    
    function getProfile() {
        return $this->profile;
    }

}

?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace exception;

use Exception;

class ZaloSdkException extends Exception {
    //ERROR code
    //Error message

    /**
     *
     */
    protected $message;
    protected $errorCode;

    public function __construct() {
        
    }

    function setZaloSdkExceptionMessage($message) {
        $this->message = $message;
    }
    
    function getZaloSdkExceptionMessage() {
        return $this->message;
    }

    function setZaloSdkExceptionErrorCode($errorCode) {
        $this->errorCode = $errorCode;
    }

    function getZaloSdkExceptionErrorCode() {
        return $this->errorCode;
    }

}

?>

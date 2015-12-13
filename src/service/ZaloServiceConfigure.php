<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace service;
use common\ValidateFunc;

require_once (realpath(dirname(__FILE__))."/../common/ValidateFunc.php");
require_once (realpath(dirname(__FILE__))."/ZaloServiceFactory.php");


class ZaloServiceConfigure {
    
    
    private $pageId;
    private $secretKey;
    private $factory;

    public function __construct($pageId, $secretKey) {
        ValidateFunc::checkNotNull($pageId, "Page id cann't be null");
        ValidateFunc::checkEmptyString($secretKey, "Secret key can't be empty");
    
        $this->pageId = $pageId;
        $this->secretKey = $secretKey;
    }
    
    public function getZaloServiceFactory(){
        if ($this->factory == null) {
            $this->factory = new ZaloServiceFactory($this->pageId, $this->secretKey);
        }
        return $this->factory;
    }
}


?>
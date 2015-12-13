<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace service\onbehalf;

require_once (realpath(dirname(__FILE__)) . "/../../common/ValidateFunc.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloOnBehalfMessageServiceImpl.php");

/**
 *
 * @author huytn
 */
class ZaloOnBehalfServiceFactory {

    private $zaloOnBehalfService = null;
    private $pageId;
    private $accessToken;
    private $appId;

    public function __construct($appId, $accessToken, $pageId) {
        $this->appId = $appId;
        $this->accessToken = $accessToken;
        $this->pageId = $pageId;
    }
    
    public function getZaloMessageService() {
        if ($this->zaloOnBehalfService == null) {
            $this->zaloOnBehalfService = new ZaloOnBehalfMessageServiceImpl($this->appId, $this->accessToken, $this->pageId);
        }
        return $this->zaloOnBehalfService;
    }
    
}

?>
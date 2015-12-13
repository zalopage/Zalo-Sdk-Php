<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace service\onbehalf;
use common\ValidateFunc;

require_once (realpath(dirname(__FILE__))."/../../common/ValidateFunc.php");
require_once (realpath(dirname(__FILE__))."/ZaloOnBehalfServiceFactory.php");


/**
 *
 * @author huytn
 */
class ZaloOnBehalfServiceConfigure {
    
    private $factory;
    private $pageId;
    private $appId;
    private $accessTok;
	
    public function __construct($appId, $accessTok, $pageId) {
        ValidateFunc::checkNotNull($appId, "App id cann't be null");
        ValidateFunc::checkEmptyString($accessTok, "Access token cann't be empty");
        ValidateFunc::checkNotNull($pageId, "Page id cann't be null");
        $this->appId = $appId;
        $this->pageId = $pageId;
        $this->accessTok = $accessTok;
    }
    
    public function getZaloServiceFactory() {
        if ($this->factory == null) {
            $this->factory = new ZaloOnBehalfServiceFactory($this->appId, $this->accessTok, $this->pageId);
        }
        return $this->factory;
    }
}

?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service;

require_once (realpath(dirname(__FILE__)) . "/../common/ValidateFunc.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloMessageServiceImpl.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloQueryServiceImpl.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloSocialServiceImpl.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloUploadServiceImpl.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloFanServiceImpl.php");

class ZaloServiceFactory {

    private $zaloMessageService = null;
    private $zaloSocialService = null;
    private $zaloUploadService = null;
    private $zaloQueryService = null;
    private $zaloFanService = null;
    private $pageId;
    private $secretKey;

    public function __construct($pageId, $secretKey) {
        $this->pageId = $pageId;
        $this->secretKey = $secretKey;
    }

    public function getZaloMessageService() {
        if ($this->zaloMessageService == null) {
            $this->zaloMessageService = new ZaloMessageServiceImpl($this->pageId, $this->secretKey);
        }
        return $this->zaloMessageService;
    }

    public function getZaloSocialService() {
        if ($this->zaloSocialService == null) {
            $this->zaloSocialService = new ZaloSocialServiceImpl($this->pageId, $this->secretKey);
        }
        return $this->zaloSocialService;
    }

    public function getZaloUploadService() {
        if ($this->zaloUploadService == null) {
            $this->zaloUploadService = new ZaloUploadServiceImpl($this->pageId, $this->secretKey);
        }
        return $this->zaloUploadService;
    }

    public function getZaloQueryService() {
        if ($this->zaloQueryService == null) {
            $this->zaloQueryService = new ZaloQueryServiceImpl($this->pageId, $this->secretKey);
        }
        return $this->zaloQueryService;
    }
    
    public function getZaloFanService() {
        if ($this->zaloFanService == null) {
            $this->zaloFanService = new ZaloFanServiceImpl($this->pageId, $this->secretKey);
        }
        return $this->zaloFanService;
    }

}

?>
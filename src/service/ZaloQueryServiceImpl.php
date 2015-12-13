<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service;

use common\ZaloSdkHelper;
use common\CommonInfo;
use common\ValidateFunc;

require_once (realpath(dirname(__FILE__)) . "/../common/CommonInfo.php");
require_once (realpath(dirname(__FILE__)) . "/../common/ZaloSdkHelper.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloQueryService.php");

class ZaloQueryServiceImpl implements ZaloQueryService {

    private $pageId;
    private $secretKey;

    public function __construct($pageId, $secretKey) {
        $this->pageId = $pageId;
        $this->secretKey = $secretKey;
    }
    
    public function getMessageStatus($msgId) {
        $timeStamp = time();
        $client = ZaloSdkHelper::buildRequestD($this->pageId, CommonInfo::$ACT_STT, CommonInfo::$SER_QUERY, $timeStamp);

        //plus param
        ValidateFunc::checkEmptyString($msgId, "Message can't be empty");
        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MSGID, $msgId);

        //build Mac
        $lstParams = array($this->pageId, $msgId, $timeStamp, $this->secretKey);
        $mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);

        return ZaloSdkHelper::sendQueryStatusMsgPage($client);
    }
    
//    public function getProfile($uid) {
//        $timeStamp = time();
//        $client = ZaloSdkHelper::buildRequestD($this->pageId, CommonInfo::$ACT_PROFILE, CommonInfo::$SER_QUERY, $timeStamp);
//		
//        //plus param
//        ValidateFunc::checkNotNull($uid, "User id can't be null");
//        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_UID, $uid);
//        
//        //build Mac
//        $lstParams = array($this->pageId, $uid, $timeStamp, $this->secretKey);
//        $mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
//        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
//
//        return ZaloSdkHelper::sendQueryProfile($client);
//    }
}

?>
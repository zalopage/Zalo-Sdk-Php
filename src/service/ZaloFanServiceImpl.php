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
use Guzzle\Http\Client;

require_once (realpath(dirname(__FILE__)) . "/../common/CommonInfo.php");
require_once (realpath(dirname(__FILE__)) . "/../common/ZaloSdkHelper.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloFanService.php");

class ZaloFanServiceImpl implements ZaloFanService {

    private $pageId;
    private $secretKey;

    public function __construct($pageId, $secretKey) {
        $this->pageId = $pageId;
        $this->secretKey = $secretKey;
    }

    public function removeFanPage($uids) {
        $timeStamp = time();
        $client = ZaloSdkHelper::buildRequestD($this->pageId, CommonInfo::$ACT_REMOVE, CommonInfo::$SER_FAN, $timeStamp);
        
        //plus param
        ValidateFunc::checkNotNull($uids, "List user ids can't be null");
        ValidateFunc::checkListNotEmpty($uids, "List user ids can't be empty");
        $strUids = $this->convertListToArray($uids);
        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_UIDS, $strUids);
        
        //build Mac
        $lstParams = array($this->pageId, $strUids, $timeStamp, $this->secretKey);
        $mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
        
        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
        
        return ZaloSdkHelper::sendRemoveFan($client);
    }
    
    public function removeFanPageByPhoneNum($phoneNum) {
        $timeStamp = time();
        $client = ZaloSdkHelper::buildRequestD($this->pageId, CommonInfo::$ACT_REMOVE_PHONE, CommonInfo::$SER_FAN, $timeStamp);
        
        //plus param
        ValidateFunc::checkNotNull($phoneNum, "List phone numbers can't be null");
        ValidateFunc::checkListNotEmpty($phoneNum, "List phone numbers can't be empty");
        $strPhoneNums = $this->convertListToArray($phoneNum);
        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_UIDS, $strPhoneNums);
        
        //build Mac
        $lstParams = array($this->pageId, $strPhoneNums, $timeStamp, $this->secretKey);
        $mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
        
        ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
        
        return ZaloSdkHelper::sendRemoveFan($client);
    }
    
    private function convertListToArray($list) {
        $res = "";
        for ($i = 0; $i < count($list); $i++) {
                $res .= $list[$i] . ";";
        }
        $res = substr($res, 0, strlen($res) - 1);

        return $res;
    }
}

?>
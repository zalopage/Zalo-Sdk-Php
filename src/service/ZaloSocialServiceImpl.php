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

require_once (realpath(dirname(__FILE__))."/../common/CommonInfo.php");
require_once (realpath(dirname(__FILE__))."/../common/ZaloSdkHelper.php");
require_once (realpath(dirname(__FILE__))."/ZaloSocialService.php");

class ZaloSocialServiceImpl implements ZaloSocialService{

	private $pageId;
	private $secretKey;
	
	public function __construct($pageId, $secretKey) {
		$this->pageId = $pageId;
		$this->secretKey = $secretKey;
	}

	public function pushTextFeed($message) {
		$timeStamp = time();
		$client = ZaloSdkHelper::buildRequestC($this->pageId, $message, CommonInfo::$ACT_TEXT, CommonInfo::$SER_SOCIAL, $timeStamp);
		
		//build Mac
		$lstParams = array ($this->pageId, $message, $timeStamp, $this->secretKey);
		$mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
		
		return ZaloSdkHelper::sendMessage($client);
	}

	public function pushMultiImagesFeed($message, $lstImages) {
		$timeStamp = time();
		$client = ZaloSdkHelper::buildRequestC($this->pageId, $message, CommonInfo::$ACT_IMAGE, CommonInfo::$SER_SOCIAL, $timeStamp);
		
		//plus param
		ValidateFunc::checkNotNull($lstImages, "Image ids can't be null");
		ValidateFunc::checkListNotEmpty($lstImages, "Image ids can't be empty");
                $strImages = $this->convertListToArray($lstImages);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_IMAGE, $strImages);
		
		//build Mac
		$lstParams = array ($this->pageId, $message, $strImages, $timeStamp, $this->secretKey);
		$mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
		
		return ZaloSdkHelper::sendMessage($client);
	}

	public function pushVoiceFeed($message, $voice) {
		$timeStamp = time();
		$client = ZaloSdkHelper::buildRequestC($this->pageId, $message, CommonInfo::$ACT_VOICE, CommonInfo::$SER_SOCIAL, $timeStamp);
		
		//plus param
		ValidateFunc::checkEmptyString($voice, "Voice id can't be empty");
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_VOICE, $voice);
		
		//build Mac
		$lstParams = array ($this->pageId, $message, $voice, $timeStamp, $this->secretKey);
		$mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
		
		return ZaloSdkHelper::sendMessage($client);
	}

	public function pushStickerFeed($message, $stickerId) {
		$timeStamp = time();
		$client = ZaloSdkHelper::buildRequestC($this->pageId, $message, CommonInfo::$ACT_STICKER, CommonInfo::$SER_SOCIAL, $timeStamp);
		
		//plus param
		ValidateFunc::checkNotNull($stickerId, "Sticker id can't be null");
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_STICKERID, $stickerId);
		
		//build Mac
		$lstParams = array ($this->pageId, $message, $stickerId, $timeStamp, $this->secretKey);
		$mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
		
		return ZaloSdkHelper::sendMessage($client);
	}

	public function pushLinkFeed($message, $link, $linkTitle, $linkDesc, $linkThumb) {
		$timeStamp = time();
		$client = ZaloSdkHelper::buildRequestC($this->pageId, $message, CommonInfo::$ACT_LINK, CommonInfo::$SER_SOCIAL, $timeStamp);
		
		//plus param
		ValidateFunc::checkEmptyString($link, "Link can't be empty");
		ValidateFunc::checkEmptyString($linkDesc, "Link description can't be empty");
		ValidateFunc::checkEmptyString($linkThumb, "Link thumbnail can't be empty");
		ValidateFunc::checkEmptyString($linkTitle, "Link title can't be empty");
		
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_LINK, $link);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_LINKTITLE, $linkTitle);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_LINKDES, $linkDesc);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_LINKTHUMB, $linkThumb);
		
		//build Mac
		$lstParams = array ($this->pageId, $message, $link, $linkTitle, $linkDesc, $linkThumb, $timeStamp, $this->secretKey);
		$mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);
		ZaloSdkHelper::addParamsHttpGet($client, CommonInfo::$URL_MAC, $mac);
		
		return ZaloSdkHelper::sendMessage($client);
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


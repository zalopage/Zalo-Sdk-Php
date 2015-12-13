<?php

namespace service\onbehalf;

use common\ZaloSdkHelper;
use common\CommonInfo;
use entity\ZaloProfileResult;
use common\ValidateFunc;
use Guzzle\Http\Client;

require_once (realpath(dirname(__FILE__)) . "/../../common/CommonInfo.php");
require_once (realpath(dirname(__FILE__)) . "/../../common/ZaloSdkHelper.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloOnBehalfMessageService.php");
require_once (realpath(dirname(__FILE__)) . "/../../entity/ZaloProfileResult.php");

class ZaloOnBehalfMessageServiceImpl implements ZaloOnBehalfMessageService {

    private $appId;
    private $accessToken;
    private $pageId;

    public function __construct($appId, $accessToken, $pageId) {
        $this->appId = $appId;
        $this->accessToken = $accessToken;
        $this->pageId = $pageId;
    }

    public function sendOnbehalfTextMessage($toUid, $templateId, $data, $smsMsg, $isNotify) {
        $timeStamp = time();

        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($toUid, "To user id can't be null");
        ValidateFunc::checkEmptyString($templateId, "Template ID can't be empty");
        
        $dataJSONStr = json_encode($data);
        if ($smsMsg == null) {
            $smsMsg = "";
        }

        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);

        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_TEMPLATE_TEXT,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TOUID => $toUid,
            CommonInfo::$URL_TEMPLATE => $templateId,
            CommonInfo::$URL_TEMPLATE_DATA => $dataJSONStr,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
        );

        $client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfImageMessage($toUid, $message, $image, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($toUid, "To user id can't be null");
        ValidateFunc::checkEmptyString($image, "Image id can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        if ($message == null) { $message = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_IMAGE,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TOUID => $toUid,
            CommonInfo::$URL_MESSAGE => $message,
            CommonInfo::$URL_IMAGE => $image,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfVoiceMessage($toUid, $voice, $smsMsg, $isNotify) {
	$timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($toUid, "To user id can't be null");
        ValidateFunc::checkEmptyString($voice, "Voice id can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_VOICE,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TOUID => $toUid,
            CommonInfo::$URL_VOICE => $voice,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    public function sendOnbehalfStickerMessage($toUid, $stickerId, $smsMsg, $isNotify) {
	$timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($toUid, "To user id can't be null");
        ValidateFunc::checkNotNull($stickerId, "Sticker id can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_STICKER,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TOUID => $toUid,
            CommonInfo::$URL_STICKERID => $stickerId,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfContactMessage($toUid, $contactUid, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($toUid, "To user id can't be null");
        ValidateFunc::checkNotNull($contactUid, "Contact uid can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_CONTACT,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TOUID => $toUid,
            CommonInfo::$URL_CONTACTUID => $contactUid,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfLinkMessage($toUid, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($toUid, "To user id can't be null");
        ValidateFunc::checkEmptyString($link, "Link can't be empty");
        ValidateFunc::checkEmptyString($linkDesc, "Link description can't be empty");
        ValidateFunc::checkEmptyString($linkThumb, "Link thumbnail can't be empty");
        ValidateFunc::checkEmptyString($linkTitle, "Link title can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_LINK,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TOUID => $toUid,
            CommonInfo::$URL_LINK => $link,
            CommonInfo::$URL_LINKTITLE => $linkTitle,
            CommonInfo::$URL_LINKDES => $linkDesc,
            CommonInfo::$URL_LINKTHUMB => $linkThumb,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfMultiLinksMessage($toUid, $linksInfo, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($toUid, "To user id can't be null");
        ValidateFunc::checkListNotEmpty($linksInfo, "List linkinfos can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);
        $links = ZaloSdkHelper::buildLinksParam($linksInfo);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_LINKS,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TOUID => $toUid,
            CommonInfo::$URL_LINKS => $links,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    public function sendOnbehalfTextMessageByPhoneNum($phoneNum, $templateId, $data, $smsMsg, $isNotify) {
        $timeStamp = time();

        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($phoneNum, "Phone number can't be null");
        ValidateFunc::checkEmptyString($templateId, "Template ID can't be empty");
        
        $dataJSONStr = json_encode($data);
        if ($smsMsg == null) {
            $smsMsg = "";
        }

        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF_PHONE);

        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_TEMPLATE_TEXT,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_PHONENUM => $phoneNum,
            CommonInfo::$URL_TEMPLATE => $templateId,
            CommonInfo::$URL_TEMPLATE_DATA => $dataJSONStr,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
        );

        $client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    public function sendOnbehalfImageMessageByPhoneNum($phoneNum, $message, $image, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($phoneNum, "To phone number can't be null");
        ValidateFunc::checkEmptyString($image, "Image id can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        if ($message == null) { $message = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF_PHONE);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_IMAGE,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_PHONENUM => $phoneNum,
            CommonInfo::$URL_MESSAGE => $message,
            CommonInfo::$URL_IMAGE => $image,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfVoiceMessageByPhoneNum($phoneNum, $voice, $smsMsg, $isNotify) {
	$timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($phoneNum, "To phone number can't be null");
        ValidateFunc::checkEmptyString($voice, "Voice id can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF_PHONE);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_VOICE,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_PHONENUM => $phoneNum,
            CommonInfo::$URL_VOICE => $voice,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    public function sendOnbehalfStickerMessageByPhoneNum($phoneNum, $stickerId, $smsMsg, $isNotify) {
	$timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($phoneNum, "To phone number can't be null");
        ValidateFunc::checkNotNull($stickerId, "Sticker id can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF_PHONE);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_STICKER,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_PHONENUM => $phoneNum,
            CommonInfo::$URL_STICKERID => $stickerId,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfContactMessageByPhoneNum($phoneNum, $contactUid, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($phoneNum, "To phone number can't be null");
        ValidateFunc::checkNotNull($contactUid, "Contact uid can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF_PHONE);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_CONTACT,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_PHONENUM => $phoneNum,
            CommonInfo::$URL_CONTACTFONE => $contactUid,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfLinkMessageByPhoneNum($phoneNum, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($phoneNum, "To phone number can't be null");
        ValidateFunc::checkEmptyString($link, "Link can't be empty");
        ValidateFunc::checkEmptyString($linkDesc, "Link description can't be empty");
        ValidateFunc::checkEmptyString($linkThumb, "Link thumbnail can't be empty");
        ValidateFunc::checkEmptyString($linkTitle, "Link title can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF_PHONE);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_LINK,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_PHONENUM => $phoneNum,
            CommonInfo::$URL_LINK => $link,
            CommonInfo::$URL_LINKTITLE => $linkTitle,
            CommonInfo::$URL_LINKDES => $linkDesc,
            CommonInfo::$URL_LINKTHUMB => $linkThumb,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    
    public function sendOnbehalfMultiLinksMessageByPhoneNum($phoneNum, $linksInfo, $smsMsg, $isNotify) {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        ValidateFunc::checkNotNull($phoneNum, "To phone number can't be null");
        ValidateFunc::checkListNotEmpty($linksInfo, "List linkinfos can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF_PHONE);
        $links = ZaloSdkHelper::buildLinksParam($linksInfo);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_LINKS,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_PHONENUM => $phoneNum,
            CommonInfo::$URL_LINKS => $links,
            CommonInfo::$URL_SMS => $smsMsg,
            CommonInfo::$URL_ISNOTIFY => $isNotify == true ? "true" : "false",
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        return ZaloSdkHelper::sendMessage($client);
    }
    
    public function getPageInfoOnbehaft() {
        $timeStamp = time();
		
        ValidateFunc::checkNotNull($this->pageId, "Page id can't be null");
        ValidateFunc::checkNotNull($this->appId, "App id can't be null");
        ValidateFunc::checkEmptyString($this->accessToken, "Access token can't be empty");
        	
        if ($smsMsg == null) { $smsMsg = ""; }
        
        $client = new Client(CommonInfo::$DOMAIN . CommonInfo::$SER_ONBEHALF);
        
        $params = array(
            CommonInfo::$URL_ACT => CommonInfo::$ACT_PROFILE,
            CommonInfo::$URL_PAGEID => $this->pageId,
            CommonInfo::$URL_APPID => $this->appId,
            CommonInfo::$URL_ACCESSTOK => $this->accessToken,
            CommonInfo::$URL_TIMESTAMP => $timeStamp,
	);	
	$client->setDefaultOption('query', $params);

        $profileResult = new ZaloProfileResult();
        $profileResult->setErr(-1);
        $profile = ZaloSdkHelper::sendQueryProfile($client);
        if ($profile != null) {
            $profileResult->setProfile($profile);
            $profileResult->setErr(0);
        }
        return $profileResult;
    }
}
?>
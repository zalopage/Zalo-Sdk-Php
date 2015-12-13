<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service;

use common\ZaloSdkHelper;
use common\CommonInfo;
use Guzzle\Http\Client;
use Guzzle\Http\Message\RequestFactory;
use exception\ZaloSdkException;

require_once (realpath(dirname(__FILE__)) . "/../common/CommonInfo.php");
require_once (realpath(dirname(__FILE__)) . "/../common/ZaloSdkHelper.php");
require_once (realpath(dirname(__FILE__)) . "/ZaloUploadService.php");
//require_once (realpath(dirname(__FILE__) . "/../../vendor/autoload.php"));
require_once (realpath(dirname(__FILE__) . "/../exception/ZaloSdkException.php"));

class ZaloUploadServiceImpl implements ZaloUploadService {

    private $pageId;
    private $secretKey;

    public function __construct($pageId, $secretKey) {
        $this->pageId = $pageId;
        $this->secretKey = $secretKey;
    }

    public function uploadImage($path) {
        return $this->uploadMedia($path, "image");
    }

    public function uploadVoice($path) {
        return $this->uploadMedia($path, "voice");
    }

    private function uploadMedia($path, $type) {

        //build Mac
        $timeStamp = time();
        $lstParams = array($this->pageId, $timeStamp, $this->secretKey);
        $mac = ZaloSdkHelper::buildMacForAuthentication($lstParams);

        $request = RequestFactory::getInstance()->create('POST', CommonInfo::$DOMAIN . CommonInfo::$SER_UPLOAD)
                        ->setClient(new Client())
                        ->addPostFiles(array(
                            CommonInfo::$URL_UPLOAD => $path
                        ))->addPostFields(array(
                            CommonInfo::$URL_ACT => $type,
                            CommonInfo::$URL_PAGEID => $this->pageId,
                            CommonInfo::$URL_TIMESTAMP => $timeStamp,
                            CommonInfo::$URL_MAC => $mac
                        ));

        $response = $request->send()->json();
        $error = $response["error"];

        if ($error < 0) {
            $zaloSdkExcep = new ZaloSdkException();
            $zaloSdkExcep->setZaloSdkExceptionErrorCode($error);
            if (!empty($response["message"])) {
                $zaloSdkExcep->setZaloSdkExceptionMessage($response["message"]);
            }
            throw $zaloSdkExcep;
        } else {
            if (!empty($response["result"])) {
                return $response["result"];
            } else {
                $zaloSdkExcep = new ZaloSdkException();
                $zaloSdkExcep->setZaloSdkExceptionErrorCode(-1);
                throw zaloSdkExcep;
            }
        }
    }

}

?>
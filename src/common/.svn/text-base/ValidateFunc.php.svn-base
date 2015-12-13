<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common;

use exception\ZaloSdkException;

class ValidateFunc {
    
    private static $DEFAULT_MESSAGE = "Received an invalid parameter";
	// scheme = alpha *( alpha | digit | "+" | "-" | "." )
	
    private function ValidateFunc() {
	}

	public static function checkNotNull($object, $errorMsg) {
		ValidateFunc::check($object != null, $errorMsg);
    }
	
	public static function checkListNotEmpty($array, $errorMsg) {
		ValidateFunc::check(!empty($array), $errorMsg);
	}
	
	public static function checkEmptyString($string, $errorMsg) {
                ValidateFunc::check($string != null && trim($string) !== "", $errorMsg);
	}

	private static function check($requirements, $error) {
		$message = ($error == null || strlen(trim($error)) <= 0) ? ValidateFunc::$DEFAULT_MESSAGE : $error;
		
        if (!$requirements) {
            $zaloSdkExcep = new ZaloSdkException();
            $zaloSdkExcep->setZaloSdkExceptionMessage($error);
            $zaloSdkExcep->setZaloSdkExceptionErrorCode(-200);
            throw $zaloSdkExcep;
		}
	}
}

?>
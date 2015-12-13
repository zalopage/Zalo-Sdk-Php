<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace enum;

require_once (realpath(dirname(__FILE__) . "/Enum.php"));

use enum\Enum;

class MESSAGESTATUS extends Enum {
  const UNDEF = "0";
  const NOT_EXIST = "1";
  const DELIVERED = "2";
  const SENT_ZALO = "3";
  const SENT_SMS = "4";
  const NOT_DELIVERED = "5";
  const SENT_SMS_FAIL = "6";
  const SEEN = "7";
}

?>
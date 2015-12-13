<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace enum;

require_once (realpath(dirname(__FILE__) . "/Enum.php"));

use enum\Enum;

class ZPUserGender extends Enum {
  const UGEN_Undef = "0";
  const UGEN_Male = "1";
  const UGEN_Female = "2";
  const UGEN_Other = "3";
}

?>
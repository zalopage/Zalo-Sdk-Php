<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace enum;

require_once (realpath(dirname(__FILE__) . "/Enum.php"));

use enum\Enum;

class ZPTypeFeed extends Enum {
  const ZTF_Text = "0";
  const ZTF_Photo = "1";
  const ZTF_Voice = "2";
  const ZTF_Link = "3";
  const ZTF_Sticker = "4";
}

?>
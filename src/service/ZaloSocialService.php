<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service;

interface ZaloSocialService {

	public function pushTextFeed($message);
	
	public function pushMultiImagesFeed($message, $lstImages);
	
	public function pushVoiceFeed($message, $voice);
	
	public function pushStickerFeed($message, $stickerId);
	
	public function pushLinkFeed($message, $link, $linkTitle, $linkDesc, $linkThumb);
	
}

?>

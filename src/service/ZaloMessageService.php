<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace service;

interface ZaloMessageService {
	
    public function sendTextMessage($toUid, $message, $smsMsg, $isNotify);
    
    public function sendTemplateTextMessage($toUid, $templateId, $data, $smsMsg, $isNotify);
    
    public function replyTextMessage($toUid, $message, $msgId, $smsMsg, $isNotify);
    
    public function sendImageMessage($toUid, $message, $image, $smsMsg, $isNotify);
    
    public function replyImageMessage($toUid, $message, $msgId, $image, $smsMsg, $isNotify);

    public function sendVoiceMessage($toUid, $voice, $smsMsg, $isNotify);
    
    public function replyVoiceMessage($toUid, $msgId, $voice, $smsMsg, $isNotify);

    public function sendStickerMessage($toUid, $stickerId, $smsMsg, $isNotify);
    
    public function replyStickerMessage($toUid, $msgId, $stickerId, $smsMsg, $isNotify);

    public function sendContactMessage($toUid, $contactUid, $smsMsg, $isNotify);
    
    public function replyContactMessage($toUid, $msgId, $contactUid, $smsMsg, $isNotify);

    public function sendLinkMessage($toUid, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify);
    
    public function replyLinkMessage($toUid, $msgId, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify);
	
    public function sendMultiLinksMessage($toUid, $linksInfo, $smsMsg, $isNotify);
    
    public function replyMultiLinksMessage($toUid, $msgId, $linksInfo, $smsMsg, $isNotify);
    
    public function sendTextMessageByPhoneNum($phoneNum, $message, $smsMsg, $isNotify);
    
    public function sendTemplateTextMessageByPhoneNum($phoneNum, $templateId, $data, $smsMsg, $isNotify);
    
    public function replyTextMessageByPhoneNum($phoneNum, $message, $msgId, $smsMsg, $isNotify);
    
    public function sendImageMessageByPhoneNum($phoneNum, $message, $image, $smsMsg, $isNotify);
    
    public function replyImageMessageByPhoneNum($phoneNum, $message, $msgId, $image, $smsMsg, $isNotify);

    public function sendVoiceMessageByPhoneNum($phoneNum, $voice, $smsMsg, $isNotify);
    
    public function replyVoiceMessageByPhoneNum($phoneNum, $msgId, $voice, $smsMsg, $isNotify);

    public function sendStickerMessageByPhoneNum($phoneNum, $stickerId, $smsMsg, $isNotify);
    
    public function replyStickerMessageByPhoneNum($phoneNum, $msgId, $stickerId, $smsMsg, $isNotify);

    public function sendContactMessageByPhoneNum($phoneNum, $contactPhone, $smsMsg, $isNotify);
    
    public function replyContactMessageByPhoneNum($phoneNum, $msgId, $contactPhone, $smsMsg, $isNotify);

    public function sendLinkMessageByPhoneNum($phoneNum, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify);
    
    public function replyLinkMessageByPhoneNum($phoneNum, $msgId, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify);

    public function sendMultiLinksMessageByPhoneNum($phoneNum, $linksInfo, $smsMsg, $isNotify);
    
    public function replyMultiLinksMessageByPhoneNum($phoneNum, $msgId, $linksInfo, $smsMsg, $isNotify);
	
    public function broadcastTextMessage($message);
	
    public function broadcastImageMessage($image);

    public function broadcastVoiceMessage($voice);

    public function broadcastStickerMessage($stickerId);

    public function broadcastContactMessage($contactUid);

    public function broadcastLinkMessage($link, $linkTitle, $linkDesc, $linkThumb);
    
    public function broadcastMultiLinksMessage($linksInfo);
}


?>
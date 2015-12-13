<?php

namespace service\onbehalf;

/**
 *
 * @author huytn
 */

interface ZaloOnBehalfMessageService {
	
    public function sendOnbehalfTextMessage($toUid, $templateId, $data, $smsMsg, $isNotify);
    
    public function sendOnbehalfImageMessage($toUid, $message, $image, $smsMsg, $isNotify);
    
    public function sendOnbehalfVoiceMessage($toUid, $voice, $smsMsg, $isNotify);
    
    public function sendOnbehalfStickerMessage($toUid, $stickerId, $smsMsg, $isNotify);
    
    public function sendOnbehalfContactMessage($toUid, $contactUid, $smsMsg, $isNotify);
    
    public function sendOnbehalfLinkMessage($toUid, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify);
    
    public function sendOnbehalfMultiLinksMessage($toUid, $linksInfo, $smsMsg, $isNotify);
    
    public function sendOnbehalfTextMessageByPhoneNum($phoneNum, $templateId, $data, $smsMsg, $isNotify);
    
    public function sendOnbehalfImageMessageByPhoneNum($phoneNum, $message, $image, $smsMsg, $isNotify);
    
    public function sendOnbehalfVoiceMessageByPhoneNum($phoneNum, $voice, $smsMsg, $isNotify);
    
    public function sendOnbehalfStickerMessageByPhoneNum($phoneNum, $stickerId, $smsMsg, $isNotify);
    
    public function sendOnbehalfContactMessageByPhoneNum($phoneNum, $contactPhone, $smsMsg, $isNotify);
    
    public function sendOnbehalfLinkMessageByPhoneNum($phoneNum, $link, $linkTitle, $linkDesc, $linkThumb, $smsMsg, $isNotify);
    
    public function sendOnbehalfMultiLinksMessageByPhoneNum($phoneNum, $linksInfo, $smsMsg, $isNotify);
    
    public function getPageInfoOnbehaft();
    
}

?>
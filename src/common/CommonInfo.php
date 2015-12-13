<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common;

class CommonInfo {

    public static $DOMAIN = "http://openapi.zaloapp.com/";
    
    public static $JSKEY_RES = "result";
    public static $JSKEY_ERR = "error";
    public static $JSKEY_MES = "message";
    public static $JSVAL_ERR = -200;
    
    public static $URL_ACCESSTOK = "accessTok";
    public static $URL_ACT = "act";
    public static $URL_PAGEID = "pageid";
    public static $URL_APPID = "appid";
    public static $URL_FROMUID = "fromuid";
    public static $URL_TOUID = "touid";
    public static $URL_MESSAGE = "message";
    public static $URL_VOICE = "voice";
    public static $URL_CONTACTUID = "contactuid";
    public static $URL_CONTACTFONE = "contactfone";
    public static $URL_IMAGE = "image";
    public static $URL_STICKERID = "stickerid";
    public static $URL_LINK = "link";
    public static $URL_LINKS = "links";
    public static $URL_LINKTITLE = "linktitle";
    public static $URL_LINKDES = "linkdes";
    public static $URL_LINKTHUMB = "linkthumb";
    public static $URL_POS = "pos";
    public static $URL_COUNT = "count";
    public static $URL_UPLOAD = "upload";
    public static $URL_TEMPKEY = "tempkey";
    public static $URL_TIMESTAMP = "timestamp";
    public static $URL_MAC = "mac";
    public static $URL_PHONENUM = "phone";
    public static $URL_VERSION = "version";
    public static $URL_MSGID = "msgid";
    public static $URL_SMS = "sms";
    public static $URL_CONTENT = "content";
    public static $URL_FEEDID = "fid";
    public static $URL_UID = "uid";
    public static $URL_UIDS = "uids";
    public static $URL_COMMENTID = "cmtid";
    public static $URL_TEMPLATE = "templateid";
    public static $URL_TEMPLATE_DATA = "data";
    public static $URL_ISNOTIFY = "isnotify";
    
    public static $ACT_TEXT = "text";
    public static $ACT_VOICE = "voice";
    public static $ACT_IMAGE = "image";
    public static $ACT_CONTACT = "contact";
    public static $ACT_STICKER = "sticker";
    public static $ACT_LINK = "link";
    public static $ACT_LINKS = "links";
    public static $ACT_PROFILE = "profile";
    public static $ACT_LISTFRIEND = "lstfri";
    public static $ACT_REPLY_TEXT = "reply";
    public static $ACT_REPLY_VOICE = "replyvoice";
    public static $ACT_REPLY_IMAGE = "replyimage";
    public static $ACT_REPLY_CONTACT = "replycontact";
    public static $ACT_REPLY_STICKER = "replysticker";
    public static $ACT_REPLY_LINK = "replylink";
    public static $ACT_REPLY_LINKS = "replylinks";
    public static $ACT_UID = "uid";
    public static $ACT_STT = "stt";
    public static $ACT_FEED = "feed";
    public static $ACT_REMOVE = "remove";
    public static $ACT_REMOVE_PHONE = "remove_phone";
    public static $ACT_TEMPLATE_TEXT = "templatetext";
    
    public static $SER_MESSAGE = "page/message";
    public static $SER_PHONE = "page/message/phone";
    public static $SER_SOCIAL = "page/social";
    public static $SER_BROADCAST = "page/broadcast";
    public static $SER_UPLOAD = "page/upload";
    public static $SER_QUERY = "page/query";
    public static $SER_COMMENT = "page/comment";
    public static $SER_FAN = "page/fan";
    public static $SER_ONBEHALF = "page/behalf";
    public static $SER_ONBEHALF_PHONE = "page/behalf/phone";
}

?>
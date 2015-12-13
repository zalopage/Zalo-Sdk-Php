<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace common;

class ZaloProfile {
    
    private $pageId;
    private $displayName;
    private $avatar;

    public function __construct() {
        
    }

    function setPageId($pageId) {
        $this->pageId = $pageId;
    }
    
    function getPageId() {
        return $this->pageId;
    }
    
    function setDisplayName($displayName) {
        $this->displayName = $displayName;
    }
    
    function getDisplayName() {
        return $this->displayName;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function getAvatar() {
        return $this->avatar;
    }
}

?>
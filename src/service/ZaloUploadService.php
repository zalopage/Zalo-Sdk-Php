<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace service;

interface ZaloUploadService {

    public function uploadImage($path);
	
    public function uploadVoice($path);

}

?>
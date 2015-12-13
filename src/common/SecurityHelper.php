<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common;

class SecurityHelper {
    public static function encodeSHA256 ($input) {
        return $mac = hash('sha256', $input);
    }
}

?>

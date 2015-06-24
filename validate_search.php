<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "DBclass.php";

$dbconn = new DB();

//$dbconn->SecureData($_POST['brand']);
$dbconn->SearchCouponNoSecurity($_POST['brand'],"");
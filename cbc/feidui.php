<?php
    $priv=file_get_contents('/home/openssl/priv.key');
    //echo '<pre>';print_r($priv);echo '<pre>';die;
    $str='qqqqqq';
    $pub=file_get_contents('/home/openssl/pub.pem');
    //echo '<pre>';print_r($pub);echo '<pre>';die;
    //私钥加密
    openssl_private_encrypt($str,$res,$priv);
    echo '<pre>';print_r($res);echo '<pre>';
    //公钥解密
    openssl_public_decrypt($res,$result,$pub);
    echo '<pre>';print_r($result);echo '<pre>';
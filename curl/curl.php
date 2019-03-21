<?php
    //echo '<pre>';print_r(openssl_get_md_methods());echo '<pre>';die;
    $now=time();
    $url="http://shop.lening.com/weixin/cbc?t=".$now;
    $ch=curl_init();
    $post_data=[
        'aa'=>'bb',
        'cc'=>'dd'
    ];
    $key='hello';
    $salt='aaaaa';
    $iv=substr(md5($now.$salt),5,16);
    $res=json_encode($post_data);
    $enc_str=openssl_encrypt($res,'AES-128-CBC',$key,OPENSSL_RAW_DATA,$iv);
    $enc=base64_encode($enc_str);
    //echo $enc;

    //计算签名
    $key_res=openssl_pkey_get_private(file_get_contents('./priv.key'));
    openssl_sign($enc,$signature,$key_res,OPENSSL_ALGO_SHA256);
    //释放资源
    openssl_free_key($key_res);
    $sign=base64_encode($signature);
    //echo '<pre>';print_r($sign);echo '<pre>';

    //向服务端发送数据
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,['data'=>$enc,'sign'=>$sign]);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);

    $rs=curl_exec($ch);//接收服务器响应
    //var_dump($rs);
    $response=json_decode($rs,true);
    //var_dump($response);die;


    //解密响应数据
    $iv2=substr(md5($response['time'].$salt),5,16);
    //echo $iv2;die;
    $dec_data=openssl_decrypt(base64_decode($response['data']),'AES-128-CBC',$key,OPENSSL_RAW_DATA,$iv2);
    print_r($dec_data);
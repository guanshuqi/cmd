<?php
        $curl='https://www.baidu.com/';
        $ch=curl_init($curl);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);

        $rs=curl_exec($ch);
        print_r($rs);
        $s=file_put_contents('baidu.html',$rs,FILE_APPEND);
        //var_dump($s);
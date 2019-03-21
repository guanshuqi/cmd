<?php
    $content=file_get_contents('lianjia.html');
    $patten='/<a href="">(.*)<\/a>/';
    preg_match_all($patten,$content,$arr);
    echo '<pre>';print_r($arr);echo '<pre>';
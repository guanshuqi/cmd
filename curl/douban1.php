<?php
    $content=file_get_contents('douban.html');
    $patten='/<link href="(.*)">/';
    preg_match_all($patten,$content,$arr);
    echo '<pre>';print_r($arr);echo '<pre>';
<?php

    $arr[1] = 1;
    for($i = 2;$i < 100;$i++) {
        $arr[$i] = $arr[$i-1] + $arr[$i-2];
    }
    echo join(",",$arr);//将数组合并为一个字符串输出


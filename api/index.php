<?php
//$cmd="cd /www && ls";
//$res=shell_exec($cmd);
//echo $res;
$web=[
    '192.168.157.135',
    '192.168.157.136'
];
foreach($web as $k=>$v){
    $cmd='ssh '.$v . ' "cd /www/cmd && git pull"';
    echo $cmd;echo "<br>";
    $res=shell_exec($cmd);
    echo $res;echo "<hr>";
}



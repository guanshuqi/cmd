<?php

$cmd="cd /www && ls";
$res=shell_exec($cmd);
echo $res;
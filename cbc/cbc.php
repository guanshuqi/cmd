<?php
$type=$_GET['type'];
switch($type){
    case 1:
        $response=[
            'name'=>'zhangsan',
            'age' =>18,
            'email'=>'zhangsan@qq.com'
        ];
        break;
    case 2:
        $response=[
            'errno'=>0,         //错误码
            'msg'  =>'ok',      //错误信息
            'data' =>[          //数据字段
                'name'=>'zhangsan',
                'age' =>18,
                'email'=>'zhangsan@qq.com'
            ]
        ];
        break;
}
header('Content-Type:application/json');
die(json_encode($response));
<?php
    return [                                                         //返回定义的路由跳转规则
        "/" => "controllers/home.php",                               //如果请求访问的是根路径，则跳转到home.php
        "/listings" => "controllers/listings/index.php",             //如果请求访问的是listings目录，则跳转到index.php
        "/listings/create" => "controllers/listings/create.php",     //如果请求是从listings/下来的，则跳转到create.php
        "404" => "controllers/error/404.php",                        //如果发生404错误，则跳转到404.php
    ];
?>
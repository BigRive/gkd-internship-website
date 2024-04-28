<?php 
    require "../helpers.php";
    $routes = [                                                      //定义路由跳转规则
        "/" => "controllers/home.php",                               //如果请求访问的是根路径，则跳转到home.php
        "/listings" => "controllers/listings/index.php",             //如果请求访问的是listings目录，则跳转到index.php
        "/listings/create" => "controllers/listings/create.php",     //如果请求是从listings/下来的，则跳转到create.php
        "404" => "controllers/error/404.php",                        //如果发生404错误，则跳转到404.php
    ];
    $uri = $_SERVER['REQUEST_URI'];                                  //捕获当前请求的URI
    //inspectAndDie($uri);                                           //测试当前URI
    if(array_key_exists($uri, $routes)){                             //如果请求的路径有效，则返回相应的视图文件，否则报404错误
        require(basePath($routes[$uri]));
    }
    else{
        require (basePath($routes['404']));
    }
?>
<?php 
    require "../helpers.php";
    require basePath("Database.php");                                //连接数据库
    require basePath('router.php');
    $router = new Router();
    $routes = require basePath('routes.php');
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);         //捕获当前请求的URI，并且仅处理路径
    $method = $_SERVER['REQUEST_METHOD'];                            //捕获当前请求的方法
    //inspect($uri);                                                 //测试当前URI（仅开发环境使用）
    //inspect($method);                                              //测试当前方法（仅开发环境使用）
    $router->route($uri, $method);
?>
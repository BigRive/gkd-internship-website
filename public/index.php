<?php 
	require './../vendor/autoload.php';                              //自动加载项目依赖
    require "../helpers.php";
    use Framework\Router;
    //spl_autoload_register(function ($class) {                        //使用原生的自动加载器来加载类文件
    //    $path = basePath('Framework/'.$class.'.php');
    //    if (file_exists($path)) {                                    //如果找到了目标文件，则加载
    //        require $path;
    //    }
    //}
    $router = new Router();
    $routes = require basePath('routes.php');
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);         //捕获当前请求的URI，并且仅处理路径
    $method = $_SERVER['REQUEST_METHOD'];                            //捕获当前请求的方法
    //inspect($uri);                                                 //测试当前URI（仅开发环境使用）
    //inspect($method);                                              //测试当前方法（仅开发环境使用）
    $router->route($uri, $method);
?>
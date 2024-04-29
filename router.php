<?php
    $routes = require basePath('routes.php');                        //加载路由跳转规则
    if(array_key_exists($uri, $routes)){                             //如果请求的路径有效，则返回相应的视图文件，否则报404错误
         require(basePath($routes[$uri]));
    }
    else{
        http_response_code(404);                                     //遇到404错误时返回HTTP状态码404
        require (basePath($routes['404']));
    }
?>
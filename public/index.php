<?php 
    require "../helpers.php";
    $uri = $_SERVER['REQUEST_URI'];                                  //捕获当前请求的URI
    //inspectAndDie($uri);                                           //测试当前URI
    require basePath('router.php');
?>
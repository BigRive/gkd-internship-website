<?php
    $router->addGet("/", "controllers/home.php");                            //如果请求访问的是根路径，则跳转到home.php
    $router->addGet("/listings", "controllers/listings/index.php");          //如果请求访问的是listings目录，则跳转到index.php
    $router->addGet("/listings/create", "controllers/listings/create.php");  //如果请求是从listings/下来的，则跳转到create.php
?>
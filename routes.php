<?php
    $router->addGet("/", "HomeController@index");                     //如果请求访问的是根路径，则跳转到home.php
    $router->addGet("/listings", "ListingController@index");          //如果请求访问的是listings目录，则跳转到index.php
    $router->addGet("/listings/create", "ListingController@create");  //如果请求是从listings/下来的，则跳转到create.php
    $router->addGet("/listing", "ListingController@show");            //如果请求路径的是listing，则跳转到show.php
?>
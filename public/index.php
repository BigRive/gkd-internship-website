<?php 
    require "../helpers.php";
    $routes = [                                                      //����·����ת����
        "/" => "controllers/home.php",                               //���������ʵ��Ǹ�·��������ת��home.php
        "/listings" => "controllers/listings/index.php",             //���������ʵ���listingsĿ¼������ת��index.php
        "/listings/create" => "controllers/listings/create.php",     //��������Ǵ�listings/�����ģ�����ת��create.php
        "404" => "controllers/error/404.php",                        //�������404��������ת��404.php
    ];
    $uri = $_SERVER['REQUEST_URI'];                                  //����ǰ�����URI
    //inspectAndDie($uri);                                           //���Ե�ǰURI
    if(array_key_exists($uri, $routes)){                             //��������·����Ч���򷵻���Ӧ����ͼ�ļ�������404����
        require(basePath($routes[$uri]));
    }
    else{
        require (basePath($routes['404']));
    }
?>
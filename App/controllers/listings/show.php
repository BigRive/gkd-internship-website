<?php 
    $config = require basePath("config/db.php");
    $db = new Database($config);
    $id = $_GET['id'] ?? '';                                     //如果URL中的id为错误的值或为空，则id置为空字符串
    $params = ['id' => $id];
    $listing = $db->query("select * from listing where id = :id", $params)->fetch();
    loadView("listings/show",['listing' => $listing]);
?>
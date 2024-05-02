<?php
    $config = require basePath("config/db.php");
    $db = new Database($config);
    $listings = $db->query("select * from listing limit 6")->fetchAll();
    loadView("home", ["listings" => $listings]);
?>
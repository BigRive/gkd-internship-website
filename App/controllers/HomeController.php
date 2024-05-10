<?php
    namespace App\Controllers;
    use Framework\Database;
    class HomeController{                                    //主页控制器
        protected $db;
        public function __construct(){
            $config = require basePath('config/db.php');     //读取数据库连接配置文件
            $this->db = new Database($config);
        }
        public function index(){
            $listings = $this->db->query('select * from listing limit 6')->fetchAll();
            loadView('home',[
                'listings' => $listings
            ]);
        }
    }
?>
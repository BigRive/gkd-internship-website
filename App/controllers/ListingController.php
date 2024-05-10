<?php
    namespace App\Controllers;
    use Framework\Database;
    class ListingController{                                 //处理实习职位视图页的渲染工作
        protected $db;
        public function __construct(){
            $config = require basePath('config/db.php');     //读取数据库连接配置文件
            $this->db = new Database($config);
        }
        public function index(){                             //渲染所有实习页面
            $listings = $this->db->query('select * from listing')->fetchAll();
            loadView('home', [
                'listings' => $listings
            ]);
        }
        public function create(){                            //发布实习页面
            loadView('listings/create');
        }
        public function show(){                             //渲染实习详情页
            $id = $_GET['id'] ?? '';                        //如果URL中的id为错误的值或为空，则id置为空字符串
            $params = ['id' => $id];
            $listing = $this->db->query("select * from listing where id = :id", $params)->fetch();
            loadView("listings/show",['listing' => $listing]);
        }
    }
?>
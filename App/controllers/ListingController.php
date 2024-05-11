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
            loadView('listings/index', [
                'listings' => $listings
            ]);
        }
        public function create(){                            //发布实习页面
            loadView('listings/create');
        }
        public function show($params){                       //渲染实习详情页
            $id = $params['id'] ?? '';                       //如果URL中的id为错误的值或为空，则id置为空字符串
            $params = ['id' => $id];
            $listing = $this->db->query("select * from listing where id = :id", $params)->fetch();
            if(!$listing){                                   //如果查询的岗位不存在，则报404错误
                ErrorController::notFound("该岗位不存在！");
                return;
            }
            loadView("listings/show",['listing' => $listing]);
        }
    }
?>
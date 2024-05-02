<?php
    class Database{                                              //封装与数据库的连接逻辑
        public $conn;                                            //封装连接数据库所需的所有信息
        public function __construct($config){                    //连接数据库
            $dsn = "mysql:host={$config['host']};
                          port={$config['port']};
                          dbname={$config['dbname']}";           //获取数据源
            $options = [                                         //设置PDO的错误模式为异常模式
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            try{
                $this->conn = new PDO($dsn, $config['username'], $config['password']);
                //echo "数据库连接成功！";                            //debugger
            }catch(PDOException $e){
                throw new Exception("数据库连接失败：{$e->getMessage()}");
            }
        }
    }    
?>
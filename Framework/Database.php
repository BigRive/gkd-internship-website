<?php
    namespace Framework;
    use PDO;
    class Database{                                              //封装与数据库的连接逻辑
        public $conn;                                            //封装连接数据库所需的所有信息
        public function __construct($config){                    //连接数据库
            $dsn = "mysql:host={$config['host']};
                          port={$config['port']};
                          dbname={$config['dbname']}";           //获取数据源
            $options = [                                         //设置PDO的错误模式为异常模式
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ   //设置所有从数据库获取的数据都将自动作为对象返回
            ];
            try{
                $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
                //echo "数据库连接成功！";                          //debugger
            }catch(\PDOException $e){
                throw new \Exception("数据库连接失败：{$e->getMessage()}");
            }
        }
        public function query($query, $params = []){             //查询数据
            try{
                $sth = $this->conn->prepare($query);             //预处理
                foreach ($params as $param => $value) {          //绑定参数到查询语句中，防止潜在的SQL注入攻击
                    $sth->bindValue(':'.$param, $value);
                }
                $sth->execute();
                return $sth;
            }catch(\PDOException $e){
                throw new \Exception("查询数据库失败：{$e->getMessage()}");
            }
        }
    }    
?>
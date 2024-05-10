<?php
    namespace Framework;
    class Router{                                                    //封装路由处理逻辑
        protected $routes = [];                                      //定义路由数组
        private function registerRoute($method, $uri, $action){      //将路由信息添加到路由数组中
            list($controller, $controllerMethod) = explode('@', $action);
            $this->routes[] = [
                "method"=> $method,
                "uri" => $uri,
                "controller" => $controller,
                "controllerMethod" => $controllerMethod
            ];
        }
        public function addGet($uri, $controller){                   //添加一个GET路由
            $this->registerRoute('GET', $uri, $controller);
        }
        public function addPost($uri, $controller){                  //添加一个POST路由
            $this->registerRoute('POST', $uri, $controller);
        }
        public function addPut($uri, $controller){                   //添加一个PUT路由
            $this->registerRoute('PUT', $uri, $controller);
        }
        public function addDelete($uri, $controller){                //添加一个DELETE路由
            $this->registerRoute('DELETE', $uri, $controller);
        }
        public function route($uri, $method){                        //遍历路由数组，并匹配对应的路由
            foreach($this->routes as $route){
                if($route['uri'] === $uri && $route['method'] === $method){     //如果该次路由信息全部匹配成功
                    $controller = 'App\\Controllers\\'.$route['controller'];    //获取控制器和控制器方法
                    $controllerMethod = $route['controllerMethod'];
                    $controllerInstance = new $controller();                    //实例化控制器和调用方法
                    $controllerInstance->$controllerMethod();
                }
            }
            //$this->error();                                             //默认传递404错误代码
        }
        public function error($httpCode = 404){                      //默认处理404错误
            http_response_code($httpCode);                           //遇到404错误时返回HTTP状态码404
            loadView("error/{$httpCode}");
            exit;                                                    //终止脚本的执行
        }
    }
?>
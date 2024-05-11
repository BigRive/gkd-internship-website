<?php
    namespace Framework;
    use App\Controllers\ErrorController;
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
        public function route($uri){                                 //遍历路由数组，并匹配对应的路由
            $requestMethod = $_SERVER['REQUEST_METHOD'];             //捕获当前请求的方法
            $uriSegments = explode('/',trim($uri,'/'));              //拆分目前uri
            foreach($this->routes as $route){
                $routeSegments = explode('/',trim($route['uri'],'/'));          //拆分路由uri
                $match = false;                                                 //记录路由是否匹配成功的标志
                if(count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod){  //如果拆分后的字符串片段数量是否匹配
                    $params = [];
                    $match = true;
                    for($i = 0; $i < count($uriSegments); $i++){
                        if($routeSegments[$i] !==  $uriSegments[$i] && !preg_match('/\{(.+?)\}/',$routeSegments[$i])){  //如果有uri不匹配或者参数不存在（进一步检查每一段是否相同）
                            $match = false;
                            break;
                        }
                        if(preg_match('/\{(.+?)\}/',$routeSegments[$i],$matches)){       //检查并提取数字，实现动态路由
                            $params[$matches[1]] = $uriSegments[$i];
                        }
                    }
                }
                if($match){                                                     //如果该次路由信息全部匹配成功
                    $controller = 'App\\Controllers\\'.$route['controller'];    //获取控制器和控制器方法
                    $controllerMethod = $route['controllerMethod'];
                    $controllerInstance = new $controller();                    //实例化控制器和调用方法
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
            ErrorController::notFound();                                        //路由匹配失败则返回404错误
        }
    }
?>
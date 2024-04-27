<?php
    function basePath($path = ''){                            //获取绝对路径
        return __DIR__ . '/' .$path;
    }
    function loadPartial($name){                              //简化视图的加载名称的代码量
        $partialPath = basePath("views/partials/{$name}.php");
        if(file_exists($partialPath)){                        //检查视图文件是否存在
            require $partialPath;
        }
        else{
            echo "无法解析视图{$name}.php";
        }
    }
    function loadView($name){                                 //加载位于views目录下的视图文件
        $viewPath = basePath("views/{$name}.view.php");
        if(file_exists($viewPath)){
            require $viewPath; 
        }
        else{
            echo "无法解析视图{$name}.view.php";
        }
    }
    function inspect($value){                                 //输出变量的详细信息，包括类型和值，仅用于开发环境
        echo '<pre>';                                         //格式化显示输出的信息，方便阅读
        var_dump ($value);
        echo '<pre>';
    }
    function inspectAndDie($value){                           //输出一个或多个变量的详细信息后，立即终止PHP脚本的执行，仅用于开发环境
        echo '<pre>';
        die(var_dump ($value));
        echo '<pre>';
    }
?>
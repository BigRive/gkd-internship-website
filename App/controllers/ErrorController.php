<?php
    namespace App\Controllers;
    class ErrorController{                                           //通用错误控制器
        public static function notFound($message = "此页面不存在！"){  //处理404错误
            http_response_code(404);
            loadView('error',[
                'status' => '404 Not Found',
                'message'=> $message
            ]);
        }
        public static function unauthorized($message = "你无权访问此页面，如果你认为这是一个错误，请联系网站管理员"){   //处理403错误
            http_response_code(403);
            loadView('error', [
                'status' => '403 Unauthorized',
                'message' => $message
            ]);
        }
    }
?>
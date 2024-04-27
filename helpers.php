<?php
    function basePath($path = ''){                            //��ȡ����·��
        return __DIR__ . '/' .$path;
    }
    function loadPartial($name){                              //����ͼ�ļ������ƵĴ�����
        $partialPath = basePath("views/partials/{$name}.php");
        if(file_exists($partialPath)){                        //�����ͼ�ļ��Ƿ����
            require $partialPath;
        }
        else{
            echo "�޷�������ͼ{$name}.php";
        }
    }
    function loadView($name){                                 //����λ��viewsĿ¼�µ���ͼ�ļ�
        $viewPath = basePath("views/{$name}.view.php");
        if(file_exists($viewPath)){
            require $viewPath; 
        }
        else{
            echo "�޷�������ͼ{$name}.view.php";
        }
    }
    function inspect($value){                                 //�����������ϸ��Ϣ���������ͺ�ֵ�������ڿ�������
        echo '<pre>';                                         //��ʽ����ʾ�������Ϣ�������Ķ�
        var_dump ($value);
        echo '<pre>';
    }
    function inspectAndDie($value){                           //���һ��������������ϸ��Ϣ��������ֹPHP�ű���ִ�У������ڿ�������
        echo '<pre>';
        die(var_dump ($value));
        echo '<pre>';
    }
?>
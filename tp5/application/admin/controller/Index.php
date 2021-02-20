<?php
namespace app\admin\controller;
class Index extends Decide
{
    public function index()
    {
        // 模板变量赋值
        $this->assign('title','自定义后台管理系统');
        $this->assign('name','在线预约管理系统');
        // 模板输出
        return $this->fetch('index');
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}

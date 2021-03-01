<?php
namespace app\admin\controller;
use think\Db;
use think\facade\Session;
class Index extends Decide
{
    public function index()
    {
        // 模板输出
        return view();
    }
    public function quit()
    {   
        Session::delete('gid');
        Session::delete('name');
        $this->error('正在退出登入！',url('/admin/login/index'));
    }
}

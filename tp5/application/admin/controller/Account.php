<?php
namespace app\admin\controller;

use think\Controller;
use think\facade\Session;
use think\Db;

class Account extends Decide
{
    public function index()
    {
        $qx = Session::get('gid');
        $qln = Db::table('rights_groups')->where('id',$qx)->value('zy');
        $this->assign('qln',$qln);
        // 模板输出
        return $this->fetch('index');
    }

    public function safety()
    {
        // 渲染默认模板输出
        return view();
    }

    public function all()
    {

        $all_list = Db::table('user')->alias('a')->join('rights_groups w','a.gid = w.id')->select();

        $num = sizeof($all_list);

        for($a=0;$a<$num;$a++){
            $all_list[$a]['addtime'] = date('Y-m-d H:i:s',$all_list[$a]['addtime']);
        }

        $this->assign('all_list',$all_list);
        // 模板输出
        return $this->fetch('all');
    }

    public function edit()
    {


    }
    public function add()
    {


    }
    public function del()
    {


    }
}

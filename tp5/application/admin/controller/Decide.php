<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
use think\Db;

class Decide extends Controller
{
    public function initialize(){
        $ds = Session::has('name');
        if(!$ds){
            $this->error('请先登录！',url('/admin/login/index'));
        }else{
        	// 模板变量赋值
	        $this->assign('title','自定义后台管理系统');
	        $this->assign('name','在线预约系统');
	        //用户名
	        $user = Session::get('name');
	        $admin = Db::table('user')->where('name',$user)->find();
            $admin['addtime'] = date('Y-m-d H:i:s',$admin['addtime']);
	        $this->assign('data',$admin);
        }
    }
}

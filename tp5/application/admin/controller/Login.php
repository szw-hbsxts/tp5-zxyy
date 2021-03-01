<?php
namespace app\admin\controller;

use think\Controller;
use think\captcha\Captcha;
use think\Db;
use think\facade\Request;
use think\facade\Session;

class Login extends Controller
{
    public function index()
    {
        $ds = Session::has('name');
        if($ds){
             $this->error('已经登录！',url('/admin/index'));
        }
        // 模板变量赋值
        $this->assign('title','Thinkphp');

        // 模板输出
        return $this->fetch('index');
    }
    public function dologin()
    {
        if(Request::method() == 'POST'){
            $all = Request::param();
            //echo json_encode($all);
            // table方法必须指定完整的数据表名
            $admin = Db::table('user')->where('name',$all['name'])->find(); 
            $captcha = $all['yzm'];
            if(empty($admin)){
                echo json_encode(['code'=>1,'msg'=>'用户名不存在']);
                exit;
            }else{
                if(md5($all['password']) != $admin['password']){
                    echo json_encode(['code'=>1,'msg'=>'密码错误']);
                    exit;
                }else{
                    if(!captcha_check($captcha)){
                        // 验证失败
                        echo json_encode(['code'=>1,'msg'=>'验证码不正确']);
                        exit;
                    }else{
                        Session::set('gid',$admin['gid']);
                        Session::set('name',$admin['name']);
                        echo json_encode(['code'=>0,'msg'=>'登陆成功']) ;
                    }
                }
            }
            
        }else{
            echo json_encode(['code'=>1,'msg'=>'提交失败']) ;
        }

    }
}

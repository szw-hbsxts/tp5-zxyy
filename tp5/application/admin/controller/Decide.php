<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Decide extends Controller
{
    public function initialize(){
        $ds = Session::has('name');
        if(!$ds){
            $this->error('请先登录！',url('/admin/login/index'));
        }
    }
}

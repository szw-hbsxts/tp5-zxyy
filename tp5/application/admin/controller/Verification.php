<?php
namespace app\admin\controller;
use think\captcha\Captcha;

class Verification
{
    public function index()
    {
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    20,    
            // 验证码位数
            'length'      =>    4,   
            // 关闭验证码杂点
            'useNoise'    =>    false, 
            //验证码宽度
            'imageW'    =>    200, 
            //验证码高度
            'imageH'    =>    40,
            //关闭混淆曲线
            'useCurve'    =>    false,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry(); 
    }
}

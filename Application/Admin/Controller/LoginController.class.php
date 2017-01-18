<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/10
 * Time: 17:07
 */
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller
{
    public function index(){
        $this->display();
    }
    public function doLogin(){
        if (!IS_POST) {
            E('页面不存在', 404);
        }

        $arr = I();
        $username= $arr['username'];
        $password = md5($arr['password']);
        $code = $arr['code'];

        $Verify = new \Think\Verify();
        $res1 = $Verify->check($code);

        if (!$res1) {
            $response['code'] = -1;
            $response['msg'] = '验证码错误1';
            $this->ajaxReturn($response);
        }

        $userObj = D('admin');
        $result = $userObj->where('username = "'.$username.'"')->find();

        if ($result) {
            if ($password == $result['password']) {

                if ($result['status'] == 1) {
                    $admin['id'] = $result['id'];
                    $admin['login_ip'] = $_SERVER['REMOTE_ADDR'];
                    $admin['login_time'] = date('Y-m-d H:i:s',time());
                    $userObj->data($admin)->save();
                    $result = array_merge($result, $admin);
                    session('admin', $result);

                    $response['code'] = 1;
                    $response['msg'] = '登陆成功';
                    $response['url'] = U('Admin/Index/index');
                    $this->ajaxReturn($response);

                } else {
                    $response['code'] = -2;
                    $response['msg'] = '您的用户已经被禁用';
                    $this->ajaxReturn($response);
                }

            } else {
                $response['code'] = -3;
                $response['msg'] = '密码错误';
                $this->ajaxReturn($response);
            }

        } else {
            $response['code'] = -4;
            $response['msg'] = '用户名不存在';
            $this->ajaxReturn($response);
        }
    }
    public function logout()
    {
        session('admin', null);
        $this->success('退出成功', U('Admin/Login/index'));
    }
    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->codeSet = '2345689';
        $Verify->length = '4';
        $Verify->useCurve = false;
        $Verify->entry();
    }

}
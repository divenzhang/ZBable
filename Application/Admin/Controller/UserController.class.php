<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/4
 * Time: 19:45
 */
namespace Admin\Controller;
use Think\Controller;

class UserController extends BaseController
{
    public function index(){
        $userObj= M('admin');
        $userList =$userObj->limit(10)->order('login_time desc')->select();

        $this->assign('user',$userList);
        $this->display();
    }
    public function question(){
        if (!IS_AJAX){
            E('页面不存在',404);
        }
        $arr =I();
        $id=$arr['id'];
        $userObj =M('admin');
        $userQuest =$userObj->where("id=$id")->getField('question');
        $msg['question']=$userQuest;
        $this->ajaxReturn($msg);

    }
    public function modify(){
        $arr =I();
        $data['username']=$arr['username'];
        $data['password'] = md5($arr['password']);
        $answer =$arr['answer'];
        $new_id =$arr['new_id'];
        $userObj = D('admin');
        $result = $userObj->where('id = "'.$new_id.'"')->find();
        $ans =$userObj->where('id = "'.$new_id.'"')->getField('answer');
        if (empty($result)){
            $msg ['msg']='不存在';
        }else{
            if ($answer == $ans){
                $userObj->where('id = "'.$new_id.'"')->save($data);
                $msg['msg']='修改成功！';
            }else{
                $msg ['msg']='密保答案错误';
            }
        }

        $this->ajaxReturn($msg);
    }

    public function account(){
        $arr=I();
        $userObj =M('admin');
        $data['username']=$arr['username'];
        $data['password']=md5($arr['password']);

        if (session('admin')['grade'] !=='1'){
            $msg['msg']="你没有权限添加！";
        }else{
            if ($data['username'] !==  $data['password']){
                $msg['msg']='密码不一致！';
            }else{
                $userObj->add($data);
                $msg['msg']='添加成功！';
            }

        }

        $this->ajaxReturn($msg);
    }
}
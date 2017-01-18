<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/30
 * Time: 14:31
 */

namespace Admin\Controller;

use Boris\EvalWorker;
use Think\Controller;

class ModifyController extends BaseController
{
    public function index()
    {
        $data = M('index_info');
        $indexUpdate = $data->where('flag<20 AND flag>0')->order('flag')->select();
        $indexHot = $data->where('flag>20 AND flag<30')->order('flag')->select();
        $indexLike = $data->where("flag>30")->order('flag')->select();
        $this->assign('one', $indexUpdate);
        $this->assign('two', $indexHot);
        $this->assign('three', $indexLike);
        $this->display();
    }

    public function update()
    {
        if (!IS_POST) {
            E('页面不存在', 404);
        }

        $update = M('index_info');

        $arr = I();
        $data['name'] = $arr['name'];
        $data['briefing'] = $arr['briefing'];
        $data['aurl'] = $arr['aurl'];
        $data['sorts'] = $arr['sorts'];
        $data['creat_time'] = date('Y-m-d H:i:s', time());
        $data['data'] = rand(5, 80) / 10;
        $number = $arr['number'];
        $flag = $arr['flag'];
        $image = $arr['new_img'];
        if (empty($arr['name'])||empty($arr['aurl'] )||empty($arr['briefing'])) {
            $msg['msg'] = "添加失败,请正确输入！";
        } else {
//            if (!$image) {
//                $data['imgurl'] = $arr['imgurl'];
//            } else {
//                $data['imgurl'] = $arr['image'];
//            }
            $data['imgurl']=empty($image)?$arr['imgurl']:$image;

            if (!$flag) {
                $update->data($data)->add();
                $msg['code'] = 1;
                $msg['msg'] = '成功添加！';
            } elseif ($flag == 1) {
                $temp = $number + 10;
                $data['flag'] = $temp;
                $update->where("flag=$temp")->setField('flag', '');
                $update->data($data)->add();
                $msg['code'] = 1;
                $msg['msg'] = '成功添加到第一行！';

            } elseif ($flag == 2) {
                $temp = $number + 20;
                $data['flag'] = $temp;
                $update->where("flag=$temp")->setField('flag', '');
                $update->data($data)->add();
                $msg['code'] = 1;
                $msg['msg'] = '成功添加第二行！';
            } elseif ($flag == 3) {
                $temp = $number + 30;
                $data['flag'] = $temp;
                $update->where("flag=$temp")->setField('flag', '');
                $update->data($data)->add();
                $msg['code'] = 1;
                $msg['msg'] = '成功添加到第三行！';
            }
        }
        $this->ajaxReturn($msg);
    }

    public function banner()
    {
        $arr = I();
        $img = $arr['image'];
        $data['aurl'] = $arr['a_url'];
        $serial = $arr['new_sorts'];
        $bannerObj = M("index_info");// 实例化bannerObj对象
        if (empty($arr['a_url'])){
            $msg['msg'] = '请输入链接';
        }else{
            $data['imgurl'] = empty($img) ? $arr['img_url'] :$img;
            if (empty($data['imgurl'])){
                $msg['msg'] = '没有图片！';
            }else{
                $bannerObj->where("serial=$serial AND sorts=0")->save($data);
                $msg['msg'] = '修改成功';
            }
        }



        $this->ajaxReturn($msg);


    }


}
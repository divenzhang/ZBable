<?php
/**
 * Created by PhpStorm.
 * User: XCube
 * Date: 2016/11/30
 * Time: 15:08
 */
namespace Admin\Controller;

use Think\Controller;
use Think\Crypt\Driver\Think;

class IndexController extends BaseController
{
    public function index()
    {
        $index_info = M('index_info');
        $info = $index_info->where('flag<20 AND flag>0')->order('flag')->select();
        $info_Hot = $index_info->where('flag>20 AND flag<30')->order('flag')->select();
        $info_three=$index_info->where('flag>30')->order('flag')->select();

        $total =$index_info->where('sorts = 5')->count();
        $Page = new \Think\Page($total, 10);
        $info_sort =$index_info->where('sorts = 5')->limit($Page->firstRow, $Page->listRows)->order('creat_time desc')->select();


        $this->assign('indexUpdate', $info);
        $this->assign('indexHot', $info_Hot);
        $this->assign('index_three',$info_three);

        $this ->assign('indexList',$info_sort);
        $this->assign('page', $Page->show());
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
        $data['data'] = rand(1,80)/10;
        $number = $arr['number'];
        $flag = $arr['flag'];
        $image = $arr['image'];

        if (!$image) {
            $data['imgurl'] = $arr['imgurl'];
        } else {
            $data['imgurl'] = $arr['image'];
        }

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
        }elseif ($flag == 3){
            $temp = $number + 30;
            $data['flag'] = $temp;
            $update->where("flag=$temp")->setField('flag', '');
            $update->data($data)->add();
            $msg['code'] = 1;
            $msg['msg'] = '成功添加到第三行！';
        }
        $this->ajaxReturn($msg);

    }

    public function image()
    {
        $upload = new \Think\Upload();
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath = './ico/'; // 设置附件上传目录
        $upload->saveName = date('YmdHis');
        $upload->saveExt = '';
        $upload->subName = "";
        $upload->replace = true;
        $upload->hash = false;
        $info = $upload->upload();
        if (!$info) {
            $msg['code'] = 0;
            $msg['msg'] = $upload->getError();
        } else {
            $msg['code'] = 1;
            $msg['msg'] = 'success';

            foreach ($info as $file) {
                $new_path = $file['savename'];
            }
            $msg['url'] = '/Uploads/ico/' . $new_path;
        }

        $this->ajaxReturn($msg);

    }

    public function modify()
    {
        if (!IS_POST) {
            E('页面不存在', 404);
        }

        $arr = I();
        $data['name']=$arr['name'];
        $data['briefing']=$arr['briefing'];
        $data['aurl']=$arr['aurl'];
        $data['imgurl']=$arr['imgurl'];
        $change_id = $arr['btn_id'];
        $image = $arr['new_img'];

        $data['imgurl'] = (!$image) ? $arr['imgurl'] :$image ; //判断有没有上传照片
        $modify = M('index_info');
        $change = $modify->where("id =$change_id")->getField('flag');//根据修改前ID 拿到原来的flag
//        $new_flag = $change -($change %10) +$arr['flag'];  //取原来的标识符，十位上的数所为行数标志
//        $new_flag = ($change >20)?$arr['flag'] +20:$arr['flag'] +10;
        $temp =$arr['sorts'].$arr['flag'];
        $new_flag = (int)$temp;
        $data['flag'] =$new_flag;

        if ($new_flag != $change){
            $change_data['flag']=$change;
            $modify->where("flag =$new_flag")->save($change_data);  //找到与更改冲突的交换flag
            $modify->where("id =$change_id")->save($data);          //把更改数据更新
            $msg['code'] = 1;
            $msg['msg'] = "更新成功";

        }else{
            $modify->where("id =$change_id")->save($data);
            $msg['code'] = 1;
            $msg['msg'] = "更新成功";
        }
        $this->ajaxReturn($msg);
    }


}